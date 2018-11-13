<?php

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

Route::get('/', 'UserController@index')->middleware('auth');

Route::get('/register', 'UserController@showRegistration');
Route::get('/register2', 'UserController@showRegistrationPlain');
Route::post('/register', 'UserController@register');

Route::get('/login', 'UserController@showLogin')->name('login');
Route::get('/login2', 'UserController@showLoginPlain');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::resource('report', 'ReportController')->middleware('auth');

Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::get('/admin/report/{id}', 'AdminController@show')->middleware('admin');
Route::put('/admin/report/{id}', 'AdminController@update')->middleware('admin');

Route::get('/admin/reward/add', 'RewardController@add')->middleware('admin');
Route::post('/admin/reward/store', 'RewardController@store')->middleware('admin');
