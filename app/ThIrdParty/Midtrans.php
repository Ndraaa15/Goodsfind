<?php

namespace App\ThirdParty;

use App\Models\Payment;
use App\Models\ShippingAddress;

class Midtrans
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LUvH6eRemVIRmJnXiq5kHeJ6';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    public function chargeCoreApi(Payment $payment)
    {
        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $payment->id,
                'gross_amount' => $payment->total_payment,
            ],
            'bank_transfer' => [
                'bank' => $payment->payment_type,
            ],
        ];

        return \Midtrans\CoreApi::charge($params);
    }
}
