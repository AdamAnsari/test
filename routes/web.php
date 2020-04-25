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

Route::get('/', 'UsersController@index');

Route::resource('/users', 'UsersController');

Route::get('users/export', 'UsersController@csv_export')->name('export');
Route::post('users/import', 'UsersController@csv_import')->name('import');

// Route::get('/pdf', 'PdfController@index')->name('pdf');

Route::get('/dynamic_pdf', 'PdfController@index');

Route::get('/dynamic_pdf/pdf', 'PdfController@pdf');
