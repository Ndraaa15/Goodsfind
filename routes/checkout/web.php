<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;


Route::get('/checkout', [PaymentController::class, 'checkoutPage'])->name('checkout');
