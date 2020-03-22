<?php

use App\Notifications\FirebaseNotification;
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

Route::get('prueba',function(){
    $user = User::where("rol_id",1)->first();

    $data = array(
        "body" => "Tienes una cita pendiente a llevar a cabo dentro de 1 hora del usuario con nombre: ' ".  "''"
    , "click_action"=>"Detalle_Cita"

    );

    $user->notify(new FirebaseNotification($data,
        "Citas Pendientes", $data));
    return "si funciona";
});
Route::get('recuperar/{id}/peticionesCitas','PeticionCitaController@index')->middleware("verificar:api");
Route::put('peticionesCitas/{id}/update','PeticionCitaController@update')->middleware("verificar:api");
Route::post('factura','FacturasController@store')->middleware("verificar:api");
Route::post('peticioncita', 'PeticionCitaController@store')->middleware("verificar:api");
Route::post('cita', 'CitasController@store')->middleware("verificar:api");
Route::get('recuperar/factura', 'FacturasController@index')->middleware("verificar:api");
Route::put('actualizarFactura/{id}/update','FacturasController@update');
Route::get("factura/{id}/mostrar","FacturasController@show")->middleware("verificar:api");

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
Route::post('/prueba' ,'PruebaController@prueba')->middleware("verificar:api");

Route::post('api/Contenido','servicioController@store')->middleware("verificar:api");
Route::post('servicio','ServiciosController@servicio');

Route::get('recuperar','ServiciosController@Recuperar')->middleware("verificar:api");
Route::get('recuperar/{id}/peticionesCitas','PeticionCitaController@index');




Route::get('clientes','ClientesController@index')->middleware("verificar:api");
Route::get("cliente/{id}/mostrar","ClientesController@show")->middleware("verificar:api");
Route::get('citas','CitasController@index')->middleware("verificar:api");
Route::get('peticion/recuperar','PeticionCitaController@show')->middleware("verificar:api");
Route::get('peticion/{id}/mostrar', 'PeticionCitaController@mostrar')->middleware("verificar:api");


Route::put('clientes/{id}/update','UserController@update')->middleware("verificar:api");
Route::put('servicios/{id}/update','ServiciosController@update')->middleware("verificar:api");
Route::get("imagen/{id}/mostrar","ServiciosController@show")->middleware("verificar:api");
Route::delete('imagen/{id}/borrar', 'ServiciosController@destroy')->middleware("verificar:api");
Route::delete('citas/{id}/borrar', 'CitasController@destroy')->middleware("verificar:api");
Route::delete('registro/{id}/delete','ClientesController@destroy')->middleware("verificar:api");

Route::get('citas/{id}/mostrar','CitasController@show')->middleware("verificar:api")->middleware("verificar:api");


