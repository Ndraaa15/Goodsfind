<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart_items = [[
            'cart_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'price' => 100,
            'total_price_product' => 200,
        ], [
            'cart_id' => 1,
            'product_id' => 2,
            'quantity' => 3,
            'price' => 200,
            'total_price_product' => 600,
        ],];

        foreach ($cart_items as $cart_item) {
            \App\Models\CartItem::create($cart_item);
        }
    }
}
