<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'id' => 1,
                'order_code' => 'ORD001',
                'user_id' => 1,
                'total_price' => 100,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
