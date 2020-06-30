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
Route::post('expediente/store', 'ExpedienteController@addExpediente');


Route::get('escritos/index', 'EscritosController@index');
Route::get('escritos/create', 'EscritosController@create');
Route::get('escritos/store', 'EscritosController@store');


Route::post('escritos/addParte', 'EscritosController@addParte');


Route::post('/subir', 'ExpedienteController@subirArchivo')->name('upfile');
Route::get('/out', 'ExpedienteController@singOut')->name('salir');


Route::post('/addDocument', 'ExpedienteController@addDocument');

Route::post('/allPartes', 'ExpedienteController@partesByExpediente');
Route::post('/search', 'ExpedienteController@getExpediente');


//Route::resources('Expediente','ExpedienteController' );
//Route::resource('users', 'AdminUserController')->parameters([
//    'users' => 'admin_user'
//]);
