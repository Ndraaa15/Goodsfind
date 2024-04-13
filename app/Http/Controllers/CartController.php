<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function cart_page()
    {
        return view('cart');
    }

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

            if($request->input('quantity') > $product->stock){
                throw new \Exception('Stock is not enough!');
            }

            if ($cartItem instanceof CartItem) {
                $updateCartItem = [
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->input('quantity'),
                    'price' => $product->price,
                    'total_price_product' => $product->price * $request->input('quantity'),
                ];
                $cartItemModel->update_cart_item($updateCartItem);
            } else {
                $cartItemModel->add_cart_item([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->input('quantity'),
                    'price' => $product->price,
                    'total_price_product' => $product->price * $request->input('quantity'),
                ]);
            }

            $cart->update_total_price();
            DB::commit();
            dd([
                'cart' => $cart,
                'cart_items' => $cart->cart_items()->with('product')->get(),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_cart_item(int $product_id)
    {
        try{
            DB::beginTransaction();
            $cartModel = new Cart();
            $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);

            $cartItemModel = new CartItem();
            $cartItemModel->delete_cart_item($product_id, $cart->id);

            $cart->update_total_price();
            DB::commit();
            dd([
                'cart' => $cart,
                'cart_items' => $cart->cart_items()->with('product')->get(),
            ]);
        }
        catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_cart()
    {
        $cartModel = new Cart();
        $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);

        $cartItems = $cart->cart_items()->with('product')->get();
        dd([
            'cart' => $cart,
            'cart_items' => $cartItems,
        ]);
    }
}
