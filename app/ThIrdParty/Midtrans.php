<?php

namespace App\ThirdParty;

use App\Models\Payment;
use App\Models\Order;
use App\Models\User;


class Midtrans
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LUvH6eRemVIRmJnXiq5kHeJ6';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function chargeSnap(Payment $payment, Order $order,  $user)
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->order_code,
                'gross_amount' => $payment->total_payment,
            ),
            'customer_details' => array(
                'first_name' => $user->first_name,
                'email' => $user->email,
            ),
        );

        return \Midtrans\Snap::getSnapToken($params);
    }
}
