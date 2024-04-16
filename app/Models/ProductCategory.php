<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function get_all_product_category()
    {
        return ProductCategory::all();
    }
}
