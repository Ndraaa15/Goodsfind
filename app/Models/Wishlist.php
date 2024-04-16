<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    protected $primaryKey = ['product_id', 'user_id'];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function create_wishlist(array $wishlist): Wishlist
    {
        return Wishlist::create($wishlist);
    }

    public function delete_wishlist(int $product_id, int $user_id): bool
    {
        return Wishlist::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->delete();
    }

    public function get_wishlist(int $user_id)
    {
        return Wishlist::where('user_id', $user_id)->get();
    }

    public function count_wishlist(int $user_id)
    {
        return Wishlist::where('user_id', $user_id)->count();
    }
}
