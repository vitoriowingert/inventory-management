<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

Route::get('product', function () {
    return view('newProduct');
})->name('product.create');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('checkout', 'ProductController@checkout')->name('product.checkout');
Route::get('dailyreport', 'ProductController@dailyreport')->name('product.dailyreport');

Route::post('newproduct', 'ProductController@create')->name('create');
Route::post('product', 'ProductController@edit')->name('product.edit');
Route::post('checkoutItem', 'ProductController@checkoutAmount')->name('checkoutItem');

Route::delete('deleteItem', 'ProductController@destroy')->name('deleteItem');
