<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function cart()
    {
        return view('cart');
    }
}
