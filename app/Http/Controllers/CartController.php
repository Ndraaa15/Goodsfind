<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addCartItem(Request $request, int $product_id)
    {
        $cartModel = new Cart();
        $productModel = new Product();
        $cartItemModel = new CartItem();

        $product = $productModel->getProductByID($product_id);
        $cart = $cartModel->getCartByUserID(auth()->user()->id);
        $cartItem = $cartItemModel->getCartItem($cart->id, $product_id);

        if ($cartItem instanceof CartItem) {
            $updateCartItem = [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
                'price' => $product->price,
                'total_price_product' => $product->price * $request->input('quantity'),
            ];
            $cartItemModel->updateCartItem($updateCartItem);
        } else {
            $cartItemModel->addCartItem([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
                'price' => $product->price,
                'total_price_product' => $product->price * $request->input('quantity'),
            ]);
        }

        $cart->updateTotalPrice();

        return redirect()->route('product', ['id' => $request->input('product_id')]);
    }

    public function deleteCartItem(int $product_id)
    {
        $cartModel = new Cart();
        $cart = $cartModel->getCartByUserID(auth()->user()->id);

        $cartItemModel = new CartItem();
        $cartItemModel->deleteCartItem($product_id, $cart->id);

        $cart->updateTotalPrice();

        return redirect()->route('cart');
    }

    public function getCart()
    {
        $cartModel = new Cart();
        $Cart = $cartModel->getCartByUserID(auth()->user()->id);

        $cartItems = $Cart->cart_items()->with('product')->get();
        dd($cartItems);
        return view('cart');
    }
}
