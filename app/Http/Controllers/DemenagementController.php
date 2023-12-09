<?php

namespace App\Http\Controllers;

use App\Mail\InfoUserInDemMail;
use App\Models\Demenagement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DemenagementController extends Controller
{
    public function index()
    {
        $demenagement = User::with("demangements")->find(Auth::user()->id);
        return response()->json($demenagement);
    }

    public function store(Request $request)
    {
        $dems = new Demenagement();
        $dems->name = $request->name;
        $dems->email = $request->email;
        $dems->phone = $request->phone;
        $dems->pays_depart = $request->pays_depart;
        $dems->pays_arrivee = $request->pays_arrivee;
        $dems->ville_depart = $request->ville_depart;
        $dems->ville_arrivee = $request->ville_destination;
        $dems->quartier_depart = $request->quartier_depart;
        $dems->quartier_arrivee = $request->quartier_destination;
        $dems->distance_route_depart = $request->distance_route;
        $dems->distance_route_arrivee = $request->distance_route_destination;
        $dems->date_demenagement = $request->date_demenagement;
        $dems->objects = json_encode($request->objects);
        $dems->object_fragiles = json_encode($request->object_fragiles);
        $dems->autres = json_encode($request->others);
        $dems->situation_local_depart = $request->situation_local_depart;
        $dems->situation_local_arrivee = $request->situation_local_arrivee;
        $dems->liaison_local_depart = $request->liaison_local_depart;
        $dems->liaison_local_arrivee = $request->liaison_local_arrivee;
        $dems->date_demenagement = $request->date_demenagement;
        $dems->heure_demenagement = $request->heure_demenagement;
        $dems->etat = 'en traitement';
        if ($request->pays_depart == $request->pays_arrivee) {
            if ($request->ville_arrivee == $request->ville_depart) {
                $dems->type = 'regional';
            } else {
                $dems->type = 'national';
            }
        } else {
            $dems->type = 'international';
        }
        $dems->save();

        Mail::to($request->email)->send(new InfoUserInDemMail($request->email));
        return response()->json(['message' => 'demangement initialise']);
    }

    public function update(Request $request, $id)
    {
        Demenagement::find($id)->update(['etat' => $request->etat]);

        return response()->json(['message' => 'demangement mis a jour']);
    }

    public function delete($id)
    {
        Demenagement::find($id)->delete();

        return response()->json(['message' => 'demangement supprimme']);
    }
}
