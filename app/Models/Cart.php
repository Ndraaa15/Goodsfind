<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

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

    public function create_cart(array $cart): Cart
    {
        return Cart::create($cart);
    }

    public function get_cart_by_user_id(int $user_id): Cart
    {
        return Cart::where('user_id', $user_id)
            ->first();
    }

    public function update_total_price(array $cart)
    {
        $cartItems = $this->cart_items;
        if ($cartItems == null || empty($cartItems) || $cartItems->count() == 0 || !empty($cart['total_price'])){
            $this->where('id', $cart['cart_id'])->update(['total_price' => $cart['total_price']]);
        } else {
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->total_price_product;
            });

            $this->total_price = $totalPrice;
            $this->save();
        }
    }

    public function count_cart(int $user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();

        if ($cart) {
            return $cart->cart_items()->count();
        }
        return 0;
    }
}
