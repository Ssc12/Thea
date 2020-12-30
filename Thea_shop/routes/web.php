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

Route::get('/', function () {
    return view('template');
})->name('home');

Route::get('/login','UserController@loginForm')->name('login');
Route::post('/login', 'UserController@login');

Route::get('/register','UserController@registerForm')->name('register');
Route::post('/register', 'UserController@register');

Route::get('/logout','UserController@logout')->name('logout');

Route::get('/profile','UserController@profile')->name('profile');
Route::get('/profile/edit','UserController@editProfile')->name('edit_profile');
Route::post('/profile/save','UserController@saveProfile');

Route::get('/history','TransactionController@history')->name('user_history');
Route::get('/history/{id}','TransactionController@details')->name('transaction_detail');

// nanti ganti apabila sudah pake Auth
Route::get('/cart/user/{id}','CartController@cartView')->name('cart');
Route::post('/cart/add/tea/{id}','CartController@addToCart');
Route::post('/cart/update/tea/{id}','CartController@updateCart');
Route::post('/cart/delete/tea/{id}','CartController@deleteCart');
Route::post('/cart/deleteAll/','CartController@deleteAllFromCart');
Route::post('/cart/checkout/','CartController@checkoutCart');