<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
