<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

Route::post('/wishlist', [WishlistController::class, 'addWishlist'])->name('add-wishlist');
