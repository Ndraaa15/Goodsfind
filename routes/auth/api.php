<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/auth/register', [AuthController::class, 'userRegister']);
Route::post('/auth/signin', [AuthController::class, 'userSignin']);
Route::get('/auth/signout', [AuthController::class, 'userSignout'])->name('signout');
