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

// Route::get('/', function () {
//     return view('admin.dashboard');
//     });

/*Route::get('/', function () {
    return view('admin.admin');
});*/

// Route::get('/', 'AdminController@index');
// Route::get('/admin', 'AdminController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::resource('user', 'UserController');


Route::resource('relawan', 'RelawanController');
Route::resource('perawat', 'PerawatController');
Route::get('/hapus/{id}', 'PerawatController@destroy')->name('perawat.hapus');

Route::resource('layout', 'AdminController');
Route::resource('jadwal', 'JadwalController');
Route::resource('jadwal_kerja', 'JadwalKerjaController');
Route::resource('jadwal_shift', 'JadwalShiftController');
Route::resource('absensi', 'AbsensiRelawanController');
Route::resource('rating', 'RatingController');

// Route::get('/{id}', 'JadwalKerja@create')->name('jadwal_kerja.create');
// Route::post('/{id}', 'JadwalKerja@store')->name('jadwal_kerja.simpan');

// Route::resource('alternatif', 'AlternatifController');
Route::prefix('/alternatif')->group(function ()
{
    Route::get('/', 'AlternatifController@index')->name('alternatif');
    Route::get('/create', 'AlternatifController@create')->name('alternatif.create');
    Route::post('/create', 'AlternatifController@store')->name('alternatif.simpan');
    Route::get('/{id}', 'AlternatifController@show')->name('alternatif.nilai.tambah');
    Route::get('/edit/{id}', 'AlternatifController@edit')->name('alternatif.edit');
    Route::post('/edit/{id}', 'AlternatifController@update')->name('alternatif.update');
    Route::post('/hapus/{id}', 'AlternatifController@destroy')->name('alternatif.hapus');
});

Route::prefix('/kriteria')->group(function ()
{
    Route::get('/', 'KriteriaController@index')->name('kriteria');
    Route::get('/create', 'KriteriaController@create')->name('kriteria.create');
    Route::post('/create', 'KriteriaController@store')->name('kriteria.simpan');
    Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::post('/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
});

Route::prefix('/crip')->group(function ()
{
    Route::get('/', 'CripController@index')->name('crip');
    Route::get('/create', 'CripController@create')->name('crip.create');
    Route::post('/create', 'CripController@store')->name('crip.simpan');
    Route::get('/edit/{id}', 'CripController@edit')->name('crip.edit');
    Route::post('/edit/{id}', 'CripController@update')->name('crip.update');
    Route::post('/hapus/{id}', 'CripController@destroy')->name('crip.hapus');
});

//Route module for nilai
Route::prefix('/nilai')->group(function ()
{
    Route::get('/', 'NilaiController@index')->name('nilai');
    Route::get('/{id}', 'NilaiController@create')->name('nilai.create');
    Route::post('/{id}', 'NilaiController@store')->name('nilai.simpan');
    Route::get('/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
    Route::post('/edit/{id}', 'NilaiController@update')->name('nilai.update');
    Route::post('/hapus/{id}', 'NilaiController@destroy')->name('nilai.hapus');
});
Route::get('/perhitungan','PerhitunganController@index')->name('perhitungan');

//Route::get('/', 'RelawanController@index');
// Route::get('/admin/timyayasan', 'AdminController@timyaysan');

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('user/login', 'Auth\UserAuthController@getLogin')->name('user.login');
// Route::post('user/login', 'Auth\UserAuthController@postLogin');

// Route::middleware('auth:user')->group(function(){
// });