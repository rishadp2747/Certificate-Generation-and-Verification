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


Route::get('/', function(){
    return view('index');
});

Route::get('/certificate', 'App\Http\Controllers\CertificateController@index');
Route::post('/certificate', 'App\Http\Controllers\CertificateController@create');

Route::get('/event', 'App\Http\Controllers\EventController@index');
Route::post('/event', 'App\Http\Controllers\EventController@store');

Route::get('/verify', 'App\Http\Controllers\VerificationController@index');
Route::post('/verify', 'App\Http\Controllers\VerificationController@show');

Route::get('text', 'App\Http\Controllers\ImageController@textOnImage');

Route::get('import', 'App\Http\Controllers\ImportExcel\ImportExcelController@index');
Route::post('import', 'App\Http\Controllers\ImportExcel\ImportExcelController@import');