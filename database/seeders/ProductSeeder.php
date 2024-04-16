<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Product 1',
                'merchant_id' => 1,
                'description' => 'Description for Product 1',
                'price' => 100,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Very Good',
                'stock' => 10,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => true,
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'merchant_id' => 1,
                'description' => 'Description for Product 2',
                'price' => 200,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Very Good',
                'stock' => 20,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => false,
            ],
            [
                'id' => 3,
                'name' => 'Product 3',
                'merchant_id' => 1,
                'description' => 'Description for Product 3',
                'price' => 300,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Good',
                'stock' => 30,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => false,
            ],
            [
                'id' => 4,
                'name' => 'Product 3',
                'merchant_id' => 1,
                'description' => 'Description for Product 3',
                'price' => 300,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Good',
                'stock' => 30,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => false,
            ],
            [
                'id' => 5,
                'name' => 'Product 3',
                'merchant_id' => 1,
                'description' => 'Description for Product 3',
                'price' => 300,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Good',
                'stock' => 30,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => false,
            ],
            [
                'id' => 6,
                'name' => 'Product 3',
                'merchant_id' => 1,
                'description' => 'Description for Product 3',
                'price' => 300,
                'image' => '',
                'category_id' => 1,
                'condition' => 'Good',
                'stock' => 30,
                'discount' => 0,
                'time_usage' => 0,
                'is_promotion' => false,
            ],
        ];


        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
