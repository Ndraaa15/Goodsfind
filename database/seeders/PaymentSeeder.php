<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [[
            'id' => 1,
            'user_id' => 1,
            'order_id' => 1,
            'shipping_price' => 10000,
            'shipping_type' => 'Standart',
            'service_price' => 20000,
            'total_payment' => 30000,
            'status_payment' => 'Pending',
        ]];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }

    }
}
