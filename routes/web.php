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

Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});

Auth::routes();

Route::get('/test', 'test@index');

Route::resource('customer', 'CustomerController');

Route::post('order/{id}/reorder', 'OrderController@reorder')->name('order.reorder');
Route::resource('order', 'OrderController');

Route::resource('product', 'ProductController');

Route::resource('cart', 'CartController');

