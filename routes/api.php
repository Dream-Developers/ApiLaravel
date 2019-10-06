<?php

use App\User;
use Illuminate\Http\Request;

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

Route::get("/usuarios",function (){

    $usuarios = User::all();
    return response()->json(["usuarios"=>$usuarios]);
})->middleware("verificar:api");


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    
    
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
              });
});

Route::post('/prueba' ,'PruebaController@prueba');

Route::post('api/Contenido','servicioController@store');
Route::post('servicio','ServiciosController@servicio');


