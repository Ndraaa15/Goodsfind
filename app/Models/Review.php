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

    public function createReview(array $review)
    {
        return Review::create($review);
    }

    public function getReviewByProductId($product_id)
    {
        return Review::where('product_id', $product_id)->get()->toArray();
    }

    public function getReviewByReviewID($review_id)
    {
        return Review::where('id', $review_id)->first();
    }

    public function deleteReview($review_id)
    {
        return Review::where('id', $review_id)->delete();
    }
}
