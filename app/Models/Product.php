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

    protected function casts(): array
    {
        return [
            'condition' => ProductCondition::class,
        ];
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    public function create_product(array $product): Product
    {
        return Product::create($product);
    }

    public function update_product(Product $product): bool
    {
        return $product->save();
    }

    public function delete_product(int $id): bool
    {
        return Product::where('id', $id)->delete();
    }

    public function get_all_product(array $filter)
    {
        $products = Product::query()->with('merchant');

        if (!empty($filter['category'])) {
            $products->where('category', $filter['category']);
        }

        if (!empty($filter['condition'])) {
            $products->where('condition', $filter['condition']);
        }

        if (!empty($filter['min_price']) && !empty($filter['max_price'])) {
            $products->whereBetween('price', [$filter['min_price'], $filter['max_price']]);
        }

        if (!empty($filter['time_usage'])) {
            $products->where('time_usage', '<=', $filter['time_usage']);
        }

        if (!empty($filter['location'])) {
            $products->whereHas('merchant', function ($query) use ($filter) {
                $query->where('location', $filter['location']);
            });
        }
        return $products->get();
    }

    public function get_product_by_id(int $id): Product
    {
        return Product::where('id', $id)->first();
    }

    public function search_product(string $name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
