<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;


Route::post('/review/{product_id}', [ReviewController::class, 'addReview'])->name('add-review');
Route::get('/review/{product_id}', [ReviewController::class, 'getReview'])->name('get-review');
Route::delete('/review/{review_id}', [ReviewController::class, 'deleteReview'])->name('delete-review');
