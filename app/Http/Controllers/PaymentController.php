<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        $payment = new Payment();
        $payment->createPayment([
            'user_id' => auth()->user()->id,
            'order_id' => $request->input('order_id'),
            'payment_method' => $request->input('payment_method'),
            'total' => $request->input('total'),
        ]);

        return redirect()->route('order', ['id' => $request->input('order_id')]);
    }
}
