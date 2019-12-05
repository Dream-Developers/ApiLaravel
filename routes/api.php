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

Route::post('peticioncita', 'PeticionCitaController@store');
Route::get('recuperar/{id}/peticionesCitas','PeticionCitaController@index')->middleware("verificar:api");
Route::put('peticionesCitas/{id}/update','PeticionCitaController@update')->middleware("verificar:api");
Route::post('factura','FacturasController@store')->middleware("verificar:api");
Route::post('peticioncita', 'PeticionCitaController@store')->middleware("verificar:api");
Route::post('cita', 'CitasController@store')->middleware("verificar:api");
Route::get('recuperar/factura', 'FacturasController@index')->middleware("verificar:api");


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
              });
});

        Route::group([
            'namespace' => 'Auth',
            'middleware' => 'api',
            'prefix' => 'password'
        ], function () {
            Route::post('create', 'ResetPasswordController@create');
            Route::get('find/{token}', 'ResetPasswordController@find');
            Route::post('reset', 'ResetPasswordController@reset');
        });

        Route::put("/token_firebase","UserController@actualizarTokenFirebase");
Route::post('/prueba' ,'PruebaController@prueba');

Route::post('api/Contenido','servicioController@store');
Route::post('servicio','ServiciosController@servicio');

Route::get('recuperar','ServiciosController@Recuperar')->middleware("verificar:api");
Route::get('recuperar/{id}/peticionesCitas','PeticionCitaController@index');




Route::get('clientes','ClientesController@index');
Route::get("cliente/{id}/mostrar","ClientesController@show");
Route::get('citas','CitasController@index');
Route::get('peticion/recuperar','PeticionCitaController@show');
Route::get('peticion/{id}/mostrar', 'PeticionCitaController@mostrar');


Route::put('clientes/{id}/update','UserController@update')->middleware("verificar:api");
Route::put('servicios/{id}/update','ServiciosController@update')->middleware("verificar:api");
Route::get("imagen/{id}/mostrar","ServiciosController@show")->middleware("verificar:api");
Route::delete('imagen/{id}/borrar', 'ServiciosController@destroy')->middleware("verificar:api");
Route::delete('citas/{id}/borrar', 'CitasController@destroy');
Route::delete('registro/{id}/delete','ClientesController@destroy');

Route::get('citas/{id}/mostrar','CitasController@show');


