<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_items = [
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'price' => 100,
                'status_order' => 'Pending',
                'total_price_product' => 100,
            ],
            [
                'id' => 2,
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 2,
                'price' => 200,
                'status_order' => 'Pending',
                'total_price_product' => 400,
            ],
            [
                'id' => 3,
                'order_id' => 1,
                'product_id' => 3,
                'quantity' => 3,
                'price' => 300,
                'status_order' => 'Pending',
                'total_price_product' => 900,
            ],
        ];

        foreach ($order_items as $order_item) {
            OrderItem::create($order_item);
        }
    }
}
