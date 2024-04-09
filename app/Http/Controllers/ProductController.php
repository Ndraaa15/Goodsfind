<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        return view('shop');
    }
    public function product()
    {
        return view('product');
    }
}
