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
    return redirect('licitaciones');
});

Route::get('documentos/create_document/{id}', 'DocumentoController@createDocument')->name('documentos.createDocument');

Route::post('documentos/store_document/{id}', 'DocumentoController@storeDocument')->name('documentos.storeDocument');

Route::get('documentos/download/{id}', 'DocumentoController@download')->name('documentos.download');

Route::resource('licitaciones', 'LicitacionController');

Route::resource('areas', 'AreaController', ['except' => ['show']]);

Route::resource('documentos', 'DocumentoController', ['except' => ['store', 'create', 'show']]);
