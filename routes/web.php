<?php

use Illuminate\Support\Facades\Route;

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
    return view('login.login');
});
Route::get('login', function () {
    return view('login.login');
});


Route::post('validate', 'UsuarioController@validateUser');
Route::resource('abogado', 'AbogadoController');
//Route::get('abogado','AbogadoController@store');

//Route::resource('expediente', 'ExpedienteController');
//Route::resource('expediente', 'ExpedienteController');

Route::get('expediente/index', 'ExpedienteController@index');
Route::get('expediente/create', 'ExpedienteController@create');
Route::get('expediente/store', 'ExpedienteController@store');


Route::get('escritos/index', 'EscritosController@index');
Route::get('escritos/create', 'EscritosController@create');
Route::get('escritos/store', 'EscritosController@store');


Route::post('subir','EscritosController@subirArchivo')->name('subir');

//Route::resources('Expediente','ExpedienteController' );
//Route::resource('users', 'AdminUserController')->parameters([
//    'users' => 'admin_user'
//]);
