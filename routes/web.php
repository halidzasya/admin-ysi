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


Route::get('/', function () {
    return view('admin.admin');
    });
// // Route::get('/admin', 'AdminController@index');

Route::resource('relawan', 'RelawanController');
Route::get('/', 'RelawanController@index'); 

// Route::get('/admin/timyayasan', 'AdminController@timyaysan');

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('user/login', 'Auth\UserAuthController@getLogin')->name('user.login');
// Route::post('user/login', 'Auth\UserAuthController@postLogin');

// Route::middleware('auth:user')->group(function(){
// });