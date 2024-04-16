<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'review',
        'rating',
    ];

    protected $primaryKey = ['user_id'];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function create_review(array $review)
    {
        return Review::create($review);
    }

    public function delete_product(int $product_id, int $user_id)
    {
        return Review::where('product_id', $product_id)->where('user_id', $user_id)->delete();
    }

    public function get_all_review()
    {
        return Review::all();
    }

    public function get_review_by_user_id(int $user_id)
    {
        return Review::where('user_id', $user_id)->first();
    }

    public function update_review(array $review, int $user_id)
    {
        return Review::where('user_id', $user_id)->update($review);
    }
}
