<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'category' => 'Electronics'],
            ['id' => 2, 'category' => 'Clothing'],
            ['id' => 3, 'category' => 'Books'],
            ['id' => 4, 'category' => 'Home & Garden'],
            ['id' => 5, 'category' => 'Health & Beauty'],
            ['id' => 6, 'category' => 'Toys & Games'],
            ['id' => 7, 'category' => 'Sports & Outdoors'],
            ['id' => 8, 'category' => 'Automotive'],
            ['id' => 9, 'category' => 'Music'],
            ['id' => 10, 'category' => 'Movies & TV'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
