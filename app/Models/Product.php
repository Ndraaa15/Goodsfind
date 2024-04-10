<?php

namespace App\Models;

use App\ProductCondition;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'name',
        'description',
        'price',
        'image',
        'category',
        'condition',
        'stock',
        'discount',
        'time_usage',
        'is_promotion',
    ];

    protected $casts = [
        'condition' => ProductCondition::class,
    ];

    public function createProduct(array $product): Product
    {
        return Product::create($product);
    }

    public function updateProduct(Product $product): bool
    {
        return $product->save();
    }

    public function deleteProduct(int $id): bool
    {
        return Product::where('id', $id)->delete();
    }

    public function getAllProduct(): array
    {
        return Product::all()->toArray();
    }

    public function getProductByID(int $id): Product
    {
        return Product::where('id', $id)->first();
    }
}
