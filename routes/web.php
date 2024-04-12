<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;


Route::view('/', 'homepage')->name('homepage');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');
Route::view('/404', '404')->name('404');
Route::view('/blog', 'blog')->name('blog');

Route::get('/testing', function(){
    return view('testing');
})->name('testing');
