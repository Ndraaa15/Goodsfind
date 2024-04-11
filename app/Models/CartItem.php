<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'total_price_product',
    ];

    protected $primaryKey = ['cart_id', 'product_id'];
    public $incrementing = false;

    public function cart()
    {
        return CartItem::belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function product()
    {
        return CartItem::belongsTo(Product::class, 'product_id', 'id');
    }

    public function addCartItem(array $cart_item): CartItem
    {
        return CartItem::create($cart_item);
    }

    public function getCartItem($cart_id, $product_id): CartItem|null
    {
        return CartItem::where('cart_id', $cart_id)
        ->where('product_id', $product_id)
        ->first();
    }

    public function updateCartItem(array $cart_item): bool
    {
        return CartItem::where('product_id', $cart_item['product_id'])
        ->where('cart_id', $cart_item['cart_id'])
        ->update($cart_item);
    }

    public function deleteCartItem(int $product_id, int $cart_id): bool
    {
        return CartItem::where('product_id', $product_id)
        ->where('cart_id', $cart_id)
        ->delete();
    }

    public function deleteAllCartItem(int $cart_id): bool
    {
        return CartItem::where('cart_id', $cart_id)
        ->delete();
    }
}
