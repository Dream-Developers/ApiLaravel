<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 Route::Post('api/Contenido','servicioController@store');
Route::get('api/todo','servicioController@index');
Route::get('api/v1/todo','Mostrar_Usuario@todo');
