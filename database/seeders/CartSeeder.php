<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart = [
            'id' => 1,
            'user_id' => 1,
            'total_price' => 800,
        ];

        \App\Models\Cart::create($cart);
    }
}
