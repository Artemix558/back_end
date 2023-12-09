<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [\App\Http\Controllers\Auth\ApiAuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Auth\ApiAuthController::class, 'register']);
Route::post('/send-mail', [\App\Http\Controllers\Auth\ApiAuthController::class, 'sendmail']);
Route::post('/send-code', [\App\Http\Controllers\Auth\ApiAuthController::class, 'sendCode']);
Route::post('/valitated', [\App\Http\Controllers\Auth\ApiAuthController::class, 'valitated']);
Route::put('/resetpassword/{id}', [\App\Http\Controllers\Auth\ApiAuthController::class, 'resetpassword']);


// demenagements
Route::get('/MyDem', [\App\Http\Controllers\DemenagementController::class, 'index']);
Route::post('/MyDem', [\App\Http\Controllers\DemenagementController::class, 'store']);
Route::put('/MyDem', [\App\Http\Controllers\DemenagementController::class, 'update']);
Route::delete('/MyDem', [\App\Http\Controllers\DemenagementController::class, 'delete']);


// objects non fragile
Route::get('/objet-non-fragile', [\App\Http\Controllers\ObjetController::class, 'index']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\ApiAuthController::class, 'logout']);
    Route::get('/user', [\App\Http\Controllers\Auth\ApiAuthController::class, 'user']);
});
