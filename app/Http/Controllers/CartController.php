<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $cart = new Cart();
        $cart->addCart([
            'product_id' => $request->input('product_id'),
            'user_id' => auth()->user()->id,
            'quantity' => $request->input('quantity'),
            'total' => $request->input('total'),
        ]);

        return redirect()->route('product', ['id' => $request->input('product_id')]);
    }
}
