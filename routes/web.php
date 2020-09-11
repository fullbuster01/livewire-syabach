<?php

use Illuminate\Support\Facades\Auth;
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
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', function () {
//     return view('home');
// });

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/category/{category:slug}', 'product-category')->name('products.category');
Route::livewire('/products/{product:slug}', 'product-detail')->name('products.detail');
Route::livewire('/checkout', 'product-checkout')->name('checkout');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/history', 'history')->name('history');
Route::livewire('/history/{id}', 'history-show')->name('history.show');