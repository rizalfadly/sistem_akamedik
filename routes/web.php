<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'C_dashboard@index');

    //route Siswa
    Route::get('/siswa', 'C_datasiswa@siswa');
    Route::get('/siswa/status-update/{id}', 'C_datasiswa@update_status');
    Route::get('/siswa/add', 'C_datasiswa@add');
    Route::post('/siswa/add', 'C_datasiswa@datasiswa');
    Route::get('/siswa/{id}', 'C_datasiswa@edit_siswa');
    Route::put('/siswa/{id}', 'C_datasiswa@update_siswa');
    Route::delete('/siswa/{id}', 'C_datasiswa@delete');
});

Route::get('/keluar', function () {
    Auth::logout();

    return redirect('login');
});

 Auth::routes();

 Route::get('/home', function () {
     return redirect('/dashboard');
 });
