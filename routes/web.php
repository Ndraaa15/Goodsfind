<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;



Route::view('/', 'homepage')->name('homepage');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');
Route::view('/404', '404')->name('404');
Route::view('/blog', 'blog')->name('blog');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/cart', [UserController::class, 'cart'])->name('cart');

Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/products', [ProductController::class, 'products'])->name('products');

Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/register', [AuthController::class, 'user_register']);
Route::post('/auth/signin', [AuthController::class, 'user_signin']);

