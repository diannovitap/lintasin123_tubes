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

Route::get('/', 'userController@index')->name('login');
Route::post('login', 'userController@login')->name('login-validation');
Route::get('register', 'userController@register')->name('register');
Route::post('register-proses', 'userController@registerProses')->name('register-proses');
Route::get('logout', 'userController@logout')->name('logout');
Route::get('profile', 'userController@profile')->name('profile');
Route::post('profileUpdate', 'userController@profileUpdate')->name('profile-update');
Route::get('shuttle', 'userController@shuttle')->name('shuttle');
Route::get('bus', 'userController@bus')->name('bus');
Route::post('schedule', 'userController@schedule')->name('search-schedule');
Route::post('order', 'userController@order')->name('do-order');
Route::post('pay', 'userController@pay')->name('do-pay');
Route::get('list-order/{id}', 'userController@listOrder')->name('list-order');
Route::get('confirmation', 'userController@confirmation')->name('confirmation');
Route::get('process-payment', 'userController@processPayment')->name('process-payment');
Route::post('upload-process', 'userController@uploadProcess')->name('upload-process');

// ADMIN
Route::get('admin', 'adminController@login')->name('login-admin');
Route::post('login-admin-proses', 'adminController@loginProses')->name('login-admin-proses');
Route::get('register-admin', 'adminController@register');
Route::post('register-admin-proses', 'adminController@registerProses');
Route::get('index-admin', 'adminController@index')->name('index-admin');

Route::get('shuttle-admin', 'adminController@shuttle')->name('shuttle-admin');
Route::post('shuttle-insert', 'adminController@shuttleInsert')->name('shuttle-insert');
Route::post('shuttle-update', 'adminController@shuttleUpdate')->name('shuttle-update');
Route::get('shuttle-delete/{id}', 'adminController@shuttleDelete')->name('shuttle-delete');

Route::get('bus-admin', 'adminController@bus')->name('bus-admin');
Route::post('bus-insert', 'adminController@busInsert')->name('bus-insert');
Route::post('bus-update', 'adminController@busUpdate')->name('bus-update');
Route::get('bus-delete/{id}', 'adminController@busDelete')->name('bus-delete');

Route::get('order-admin', 'adminController@order')->name('order-admin');
Route::post('set-confrim', 'adminController@setConfrim')->name('set-confrim');



