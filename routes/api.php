<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('usuario', 'App\Http\Controllers\ApiController@getAllUsuario');
Route::get('usuario/{id}', 'App\Http\Controllers\ApiController@getUsuario');
Route::post('usuario', 'App\Http\Controllers\ApiController@createUsuario');
Route::put('usuario/{id}', 'App\Http\Controllers\ApiController@updateUsuario');
Route::delete('usuario/{id}','App\Http\Controllers\ApiController@deleteUsuario');