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

Route::get('/', function () {
    return view('shop');
});

Auth::routes();
Route::post('/cart', 'CartController@addToCart');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductsController@listAllProduct')->name('all_product');
Route::get('/cart', 'CartController@listCart')->name('all_cart');

Route::delete('/cart/{productId}', 'CartController@deleteProductFromCart');
Route::delete('/cart', 'CartController@deleteAllCart');

Route::post('/coupon', 'CouponController@applyCoupon');


