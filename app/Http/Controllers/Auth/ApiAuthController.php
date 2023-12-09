<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\user\UserSendCodeMail;
use App\Mail\user\UserSendMail;
use App\Models\Code;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{

    /**
     * randomuser.me (comprehensive random user data)
     * fakestoreapi.com(all the data ou need to create an ecommerce project)
     * mapbox.com(Maps and navigation data for location-based apps)
     * shutterstock.com/developers(free to use images,videos and audio from shutterstock's api)
     * serpapi.com (data from google and many other popular search engines)
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $request['password'] = Hash::make(request('password'));
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response(['access_token' => $response, 'user' => $user], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response(['access_token' => $response, 'user' => $user], 200);
            } else {
                $response = ["message" => ["Password mismatch"]];
                return response($response, 422);
            }
        } else {
            $response = ["errors" => ['User does not exist']];
            return response($response, 422);
        }
    }

    public function sendmail(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        $code = rand(265701, 999999);
        if ($user) {
            try {
                Mail::to($request->email)->send(new UserSendMail($user, $code));
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'erreur survenu lors de l\'envoi du mail',
                ], 422);
            }

            $codelink = Code::whereEmail($request->email)->first();
            if ($codelink) {
                Code::whereEmail($request->email)->update(['code' => $code]);
            } else {
                $codelink = new Code();
                $codelink->email = $request->email;
                $codelink->code = $code;
                $codelink->save();
            }
            return response()->json([
                'message' => true,
                'user' => $user,
                'code' => $code,
            ]);
        } else {
            return response()->json([
                "message" => "cette adresse ne possede pas de compte"
            ], 422);
        }
    }

    public function sendCode(Request $request)
    {
        $code = rand(265701, 999999);
        try {
            Mail::to($request->email)->send(new UserSendCodeMail($request->email, $code));
            $preuv = Code::where("email", $request->email)->first();
            if ($preuv) {
                Code::whereEmail($request->email)->update(['code' => $code]);
            } else {
                $codelink = new Code();
                $codelink->email = $request->email;
                $codelink->code = $code;
                $codelink->save();
            }

            return response()->json([
                'message' => true,
                'code' => $code
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => false,
                'code' => null
            ]);
        }
    }

    public function valitated(Request $request)
    {
        $line = Code::where("code", $request->code)->where("email", $request->email)->first();

        if ($line) {
            return response()->json(['message' => true]);
        }
        return response()->json(['message' => false]);
    }
    public function resetpassword(Request $request, $id)
    {
        User::find($id)->update(['code' => Hash::make(request('password'))]);
        return response(['user' => User::find($id)]);
    }

    public function user()
    {
        return response()->json(Auth::user());
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
