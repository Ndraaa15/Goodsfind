<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::patch('/user', [UserController::class, 'updateUser'])->name('update-user');
