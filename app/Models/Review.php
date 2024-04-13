<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'review',
        'sub_review',
        'rating',
    ];

    protected $primaryKey = ['product_id', 'user_id'];
    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function create_review(array $review)
    {
        return Review::create($review);
    }

    public function get_review_by_product_id(int $product_id)
    {
        return Review::where('product_id', $product_id)->get();
    }

    public function get_review_by_user_product_id(int $product_id, int $user_id)
    {
        return Review::where('product_id', $product_id)->where('user_id', $user_id)->first();
    }


    public function delete_product(int $product_id, int $user_id){
        return Review::where('product_id', $product_id)->where('user_id', $user_id)->delete();
    }


    public function update_review(array $review, int $product_id, int $user_id)
    {
        return Review::where('product_id', $product_id)->where('user_id', $user_id)->update($review);
    }
}
