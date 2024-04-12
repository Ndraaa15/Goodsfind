<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::post('/cart/{product_id}', [CartController::class, 'addCartItem'])->name('add-cart-item');
Route::get('/cart', [CartController::class, 'getCart'])->name('get-cart');
Route::delete('/cart/{product_id}', [CartController::class, 'deleteCartItem'])->name('delete-cart-item');
