<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        $order = new Order();
        $order->addOrder([
            'product_id' => $request->input('product_id'),
            'user_id' => auth()->user()->id,
            'quantity' => $request->input('quantity'),
            'total' => $request->input('total'),
        ]);

        return redirect()->route('product', ['id' => $request->input('product_id')]);
    }
}
