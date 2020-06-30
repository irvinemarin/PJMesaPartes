<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


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


Route::get('pdf/{filename}', function ($filename) {

    $path = storage_path("app/public/pdfs/" . $filename);

    return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
});
