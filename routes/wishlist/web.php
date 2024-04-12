<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
