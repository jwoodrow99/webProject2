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
Route::get('/', function () {
    return view('aboutus');
});

Route::resource('customer', 'CustomerController');

Route::post('order/{id}/reorder', 'OrderController@reorder')->name('order.reorder');
Route::resource('order', 'OrderController');

Route::resource('product', 'ProductController');

Route::resource('cart', 'CartController');

Route::get('admin', 'AdminController@index');
Route::get('admin/orders', 'AdminController@orders');
Route::get('admin/user', 'AdminController@user');
Route::patch('admin/addstock/{id}', 'AdminController@addStock');
Route::patch('admin/removestock/{id}', 'AdminController@removeStock');
Route::patch('admin/pickup/{id}', 'AdminController@pickedUp');
Route::post('admin/roles/add/{id}', 'AdminController@addRole');
Route::post('admin/roles/remove/{id}', 'AdminController@removeRole');

