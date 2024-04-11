<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    public function cart_items()
    {
        return Cart::hasMany(CartItem::class, 'cart_id', 'id');
    }

    public function user()
    {
        return Cart::belongsTo(User::class, 'user_id', 'id');
    }

    public function createCart(array $cart): Cart
    {
        return Cart::create($cart);
    }

    public function getCartByUserID(int $user_id): Cart
    {
        return Cart::where('user_id', $user_id)->first();
    }

    public function updateTotalPrice()
    {
        $cartItems = $this->cart_items;
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->total_price_product;
        });

        $this->total_price = $totalPrice;
        $this->save();
    }
}
