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

Route::get('/', 'MainController@index')->name('index');
Route::post('/search', 'MainController@search')->name('search');
Route::get('/edit/{id}', 'MainController@edit')->name('edit');
Route::post('/update/{id}/{eacode}', 'MainController@update')->name('update');
Route::post('/bulk-update', 'MainController@bulkUpdate')->name('bulk.update');
Route::get('/eacode/{eacode}', 'MainController@eacodeView')->name('eacode');
Route::get('/transmit', 'MainController@transmit')->name('transmit');
Route::post('/trans', 'MainController@trans')->name('trans');
Route::get('/add', 'MainController@add')->name('add');
Route::post('/insert', 'MainController@insert')->name('insert');

Route::get('/remarks', 'MainController@remarks')->name('remarks');
Route::get('/update/remarks', 'MainController@updateRemarks')->name('update.remarks');

Route::get('/export', 'MainController@export')->name('export');
Route::post('/import', 'MainController@import')->name('import');
Route::get('/delete', 'MainController@delete')->name('delete');
Route::post('/data/export', 'MainController@exportData')->name('data.export');

Route::get('/trans', 'MainController@transmission')->name('transmission');