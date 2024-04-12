<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/product/{id}', [ProductController::class, 'getProductByID'])->name('get-product-by-id');
Route::get('/product', [ProductController::class, 'getAllProduct'])->name('get-all-product');
Route::post('/product', [ProductController::class, 'createProduct'])->name('create-product');
Route::patch('/product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
