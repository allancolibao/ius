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

// Landing page
Route::get('/', 'MainController@index')->name('index');

// Search function 
Route::post('/search', 'MainController@search')->name('search');

// Updating record 
Route::get('/edit/{id}', 'MainController@edit')->name('edit');
Route::post('/update/{id}/{eacode}', 'MainController@update')->name('update');
Route::post('/bulk-update', 'MainController@bulkUpdate')->name('bulk.update');
Route::get('/eacode/{eacode}', 'MainController@eacodeView')->name('eacode');

// Transmission page
Route::get('/transmit', 'MainController@transmit')->name('transmit');
Route::post('/trans', 'MainController@trans')->name('trans');

// Insert IYCF record
Route::get('/add', 'MainController@add')->name('add');
Route::post('/insert', 'MainController@insert')->name('insert');

// Updating remark pages
Route::get('/remarks', 'MainController@remarks')->name('remarks');
Route::get('/update/remarks', 'MainController@updateRemarks')->name('update.remarks');

// Export and import
Route::get('/export', 'MainController@export')->name('export');
Route::post('/import', 'MainController@import')->name('import');
Route::post('/data/export', 'MainController@exportData')->name('data.export');

// Delete the uploaded csv data
Route::get('/delete', 'MainController@delete')->name('delete');

// Transmission page
Route::get('/trans', 'MainController@transmission')->name('transmission');
Route::get('/diff/{ea}', 'MainController@diff')->name('diff');