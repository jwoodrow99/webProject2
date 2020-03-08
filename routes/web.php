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

Route::get('/', 'HomeController@index');

Auth::routes();

// Test route to test auth!
// Route::get('/test', 'test@index')->middleware('auth');
Route::get('/test', 'test@index');

Route::get('/home', 'HomeController@index');

Route::resource('customer', 'CustomerController')->middleware('auth');
