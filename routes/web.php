<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Models\Payment;

Route::view('/', 'homepage')->name('homepage');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');
Route::view('/404', '404')->name('404');
Route::view('/blog', 'blog')->name('blog');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
// Route::get('/cart', [UserController::class, 'cart'])->name('cart');

Route::get('/product/{id}', [ProductController::class, 'getProductByID'])->name('get-product-by-id');
Route::get('/product', [ProductController::class, 'getAllProduct'])->name('get-all-product');
Route::post('/product', [ProductController::class, 'createProduct'])->name('create-product');
Route::patch('/product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

Route::post('/review/{product_id}', [ReviewController::class, 'addReview'])->name('add-review');
Route::get('/review/{product_id}', [ReviewController::class, 'getReview'])->name('get-review');
Route::delete('/review/{review_id}', [ReviewController::class, 'deleteReview'])->name('delete-review');

Route::post('/cart/{product_id}', [CartController::class, 'addCartItem'])->name('add-cart-item');
Route::get('/cart', [CartController::class, 'getCart'])->name('get-cart');
Route::delete('/cart/{product_id}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('/login', [AuthController::class, 'auth'])->name('login');
Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/register', [AuthController::class, 'userRegister']);
Route::post('/auth/signin', [AuthController::class, 'userSignin']);
Route::get('/auth/signout', [AuthController::class, 'userSignout'])->name('signout');

Route::get('/testing', function(){
    return view('testing');
})->name('testing');
