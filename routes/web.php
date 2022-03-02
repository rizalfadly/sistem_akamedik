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
    Route::get('/siswa/status_aktif', 'C_datasiswa@aktif');
    Route::get('/siswa/status_nonaktif', 'C_datasiswa@nonaktif');
    Route::get('/siswa/add', 'C_datasiswa@add');
    Route::post('/siswa/add', 'C_datasiswa@datasiswa');
    Route::get('/siswa/{id}', 'C_datasiswa@edit_siswa');
    Route::put('/siswa/{id}', 'C_datasiswa@update_siswa');
    Route::delete('/siswa/{id}', 'C_datasiswa@delete');

});

Route::group(['prefix'=>'guru'],function(){
    Route::get('dash_guru', 'C_guru@index')->name('guru.index');
    Route::get('add', 'C_guru@add')->name('guru.add');
    Route::post('create', 'C_guru@add_guru')->name('guru.create');
    Route::get('guru_aktif','C_guru@aktif')->name('guru.aktif');
    Route::get('guru_non_aktif','C_guru@nonaktif')->name('guru.nonaktif');
    Route::get('status_guru/{id}', 'C_guru@guru_status')->name('guru.status');
    Route::get('edit/{id}', 'C_guru@edit_guru')->name('guru.edit');
    Route::post('edit/{id}', 'C_guru@update_guru')->name('guru.update');
    Route::delete('delete_data_guru/{id}', 'C_guru@delete')->name('guru.delete');

});

Route::group(['prefix'=>'kelas'],function(){
    Route::get('dash_kelas', 'C_kelas@index')->name('kelas.index');
    Route::get('add_kelas', 'C_kelas@add')->name('kelas.add');
    Route::get('detail_kelas/{id}', 'C_kelas@detail_kelas')->name('kelas.detail');
    Route::post('create_kelas', 'C_kelas@create_kelas')->name('kelas.create');
    Route::get('edit_kelas/{id}', 'C_kelas@edit_kelas')->name('kelas.edit');
    Route::post('edit_kelas/{id}', 'C_kelas@update_kelas')->name('kelas.update');
    Route::post('detail_kelas_add_siswa/{id_kelas}', 'C_kelas@detail_add')->name('kelas.detailkelas');
    Route::delete('hapus_kelas/{id}', 'C_kelas@delete_kelas')->name('kelas.delete');
});

Route::group(['prefix'=> 'mapel'], function(){
    Route::get('dash_mapel', 'C_mapel@index')->name('mapel.index');
    Route::get('add_mapel', 'C_mapel@add')->name('mapel.add');
    Route::get('edit_mapel/{id}', 'C_mapel@edit_mapel')->name('mapel.edit');
    Route::post('edit_mapel/{id}', 'C_mapel@mapel_update')->name('mapel.update');
    Route::post('add_mapel', 'C_mapel@add_mapel')->name('mapel.create');
    Route::delete('hapus_matapelajaran/{id}', 'C_mapel@delete_mapel')->name('kelas.delete');
});
    Route::delete('detail_kelas_delete_siswa/{id_kelas}/{id_siswa}', 'C_kelas@delete_dtkelas');

Route::group(['prefix'=>'jadwal_pelajaran'], function(){
    Route::get('dash_jadwal_pelajaran', 'C_jadwalpelajaran@index')->name('jadwal.index');
    Route::get('add_jadwal','C_jadwalpelajaran@add_jadwal')->name('jadwal.add');
    Route::post('add_jadwal','C_jadwalpelajaran@store_jadwal')->name('jadwal.create');

});

Route::get('/keluar', function () {
    Auth::logout();

    return redirect('login');
});

 Auth::routes();

 Route::get('/home', function () {
     return redirect('/dashboard');
 });
