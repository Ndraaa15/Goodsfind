<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthMiddleware;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');

Route::fallback(function () {
    return response()->view('404', [], 404);
});

// Authentication
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
});

// Merchant
Route::prefix('merchant')->middleware('auth')->group(function () {
    Route::patch('/', [MerchantController::class, 'update_merchant'])->name('update-merchant');
    Route::post('/withdraw', [MerchantController::class, 'withdraw'])->name('withdraw');
    Route::get('/', [MerchantController::class, 'get_merchant'])->name('merchant');
});

// Product
Route::prefix('product')->group(function () {
    Route::get('/search', [ProductController::class, 'search_product'])->name('search-product');
    Route::get('/{id}', [ProductController::class, 'get_product_by_id'])->name('get-product-by-id');
    Route::get('/', [ProductController::class, 'get_all_product'])->name('get-all-product');
    Route::post('/', [ProductController::class, 'create_product'])->name('create-product')->middleware('auth');
    Route::patch('/{id}', [ProductController::class, 'update_product'])->name('update-product')->middleware('auth');
    Route::delete('/{id}', [ProductController::class, 'delete_product'])->name('delete-product')->middleware('auth');
});

// Cart
Route::prefix('cart')->middleware('auth')->group(function () {
    Route::post('/{product_id}', [CartController::class, 'add_cart_item'])->name('add-cart-item');
    Route::get('/', [CartController::class, 'get_cart'])->name('get-cart');
    Route::delete('/{product_id}', [CartController::class, 'delete_cart_item'])->name('delete-cart-item');
});

Route::prefix('order')->middleware('auth')->group(function () {
    Route::patch('/{order_item_id}', [OrderController::class, 'update_status_order'])->name('update-status-order');
});


// Checkout
Route::prefix('checkout')->middleware('auth')->group(function () {
    Route::post('/', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/', [PaymentController::class, 'checkout_page'])->name('get-checkout');
});

// Review
Route::prefix('review')->middleware('auth')->group(function () {
    Route::post('/', [ReviewController::class, 'add_review'])->name('add-review');
    Route::get('/', [ReviewController::class, 'get_all_review'])->name('get-review');
});

// User
Route::prefix('user')->middleware('auth')->group(function () {
    Route::patch('/', [UserController::class, 'update_user'])->name('update-user');
});
Route::get('/profile', [UserController::class, 'user_profile'])->name('profile')->middleware('auth');

// Wishlist
Route::prefix('wishlist')->middleware('auth')->group(function () {
    Route::post('/{product_id}', [WishlistController::class, 'add_wishlist'])->name('add-wishlist');
    Route::delete('/{product_id}', [WishlistController::class, 'delete_wishlist'])->name('delete-wishlist');
    Route::get('/', [WishlistController::class, 'get_wishlist'])->name('wishlist');
});

// Testing
Route::group(['prefix' => 'testing'], function () {
    Route::view('signin', 'testing.auth.signin-auth')->name('testing-login');
    Route::view('register', 'testing.auth.register-auth')->name('testing-register');
    Route::view('logout', 'testing.auth.logout-auth')->name('testing-logout');

    Route::view('create-product', 'testing.product.create-product')->name('testing-create-product');
    Route::view('update-product', 'testing.product.update-product')->name('testing-update-product');
    Route::view('delete-product', 'testing.product.delete-product')->name('testing-delete-product');

    Route::view('add-cart-item', 'testing.cart.add-cart-item')->name('testing-add-cart-item');
    Route::view('delete-cart-item', 'testing.cart.delete-cart-item')->name('testing-delete-cart-item');

    Route::view('add-wishlist', 'testing.wishlist.add-wishlist')->name('testing-add-wishlist');
    Route::view('delete-wishlist', 'testing.wishlist.delete-wishlist')->name('testing-delete-wishlist');

    Route::view('add-review', 'testing.review.add-review')->name('testing-add-review');
    Route::view('delete-review', 'testing.review.delete-review')->name('testing-delete-review');
    Route::view('update-review', 'testing.review.update-review')->name('testing-update-review');

    Route::view('update-user', 'testing.user.update-user')->name('testing-update-user');

    Route::view('update-merchant', 'testing.merchant.update-merchant')->name('testing-update-merchant');

    Route::view('checkout', 'testing.checkout.checkout')->name('testing-checkout');

    Route::view('first-time-message', 'testing.message.first-time-message')->name('testing-first-time-message');

    Route::view('update-status-order', 'testing.order.update-status-order')->name('testing-update-status-order');
});
