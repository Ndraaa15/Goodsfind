<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'auth'])->name('login');
Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
