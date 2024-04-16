<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_cart_item(Request $request, int $product_id)
    {
        try {
            DB::beginTransaction();
            $cartModel = new Cart();
            $productModel = new Product();
            $cartItemModel = new CartItem();

            $product = $productModel->get_product_by_id($product_id);
            $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);
            $cartItem = $cartItemModel->get_cart_item($cart->id, $product_id);

            if ($request->input('quantity') > $product->stock) {
                throw new \Exception('Stock is not enough!');
            }

            $quantity = 1;
            if (!empty($request->input('quantity'))) {
                $quantity = $request->input('quantity');
            }

            if ($cartItem instanceof CartItem) {
                $updateCartItem = [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total_price_product' => $product->price * $quantity,
                ];
                $cartItemModel->update_cart_item($updateCartItem);
            } else {
                $cartItemModel->add_cart_item([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total_price_product' => $product->price * $quantity,
                ]);
            }

            $cart->update_total_price();
            DB::commit();
            return redirect()->route('get-cart');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_cart_item(int $product_id)
    {
        try {
            DB::beginTransaction();
            $cartModel = new Cart();
            $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);

            $cartItemModel = new CartItem();
            $cartItemModel->delete_cart_item($product_id, $cart->id);

            $cart->update_total_price();
            DB::commit();
            return redirect()->route('get-cart');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_cart()
    {
        $cartModel = new Cart();
        $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);

        $cartItems = $cart->cart_items()->get();
        return view('user.cart', [
            'cart' => $cart,
            'cartItems' => $cartItems->load('product')->load('product.merchant'),
        ]);
    }

    public static function count_cart()
    {
        $cartModel = new Cart();
        return $cartModel->count_cart(auth()->user()->id);
    }
}
