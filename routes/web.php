<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('CerImport', 'certificateImport');

Route::view('CerImport_wo', 'certificateImport_wo');

Route::get('config/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return response()->json([
        'success' => true,
        'payload' => 'Cache cleared'
    ]);
});

Route::get('/CerExport', 'CertificateController@export');