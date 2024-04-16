<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\ShippingAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Merchant;
use App\Models\Product;
use App\ThirdParty\Midtrans;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            DB::beginTransaction();
            $paymentModel = new Payment();
            $shippingAddressModel = new ShippingAddress();
            $productModel = new Product();
            $cartModel = new Cart();
            $cartItemModel = new CartItem();
            $orderModel = new Order();
            $orderItemModel = new OrderItem();

            $cart = $cartModel->get_cart_by_user_id(auth()->user()->id);


            $orderID = Str::random(10);
            $order = $orderModel->create_order([
                'order_code' => 'GOODSVIND-' . $orderID,
                'user_id' => auth()->user()->id,
                'total_price' => $cart->total_price,
            ]);

            $cartItems = $cart->cart_items;
            foreach ($cartItems as $cartItem) {
                $orderItemModel->create_order_item([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'total_price_product' => $cartItem->total_price_product,
                ]);

                $product = $productModel->get_product_by_id($cartItem->product_id);
                $product->stock = $product->stock - $cartItem->quantity;
                $productModel->update_product($product);
            }
            $cartItemModel->delete_all_cart_item($cart->id);
            $cart->update_total_price();

            $shippingAddressModel->create_shipping_address([
                'order_id' => $order->id,
                'name' => $request->input('name'),
                'company_name' => $request->input('company-name'),
                'country' => $request->input('country'),
                'province' => $request->input('province'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal-code'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'detail_address' => $request->input('detail-address'),
            ]);

            $midtans = new Midtrans();
            $payment = $paymentModel->create_payment([
                'user_id' => auth()->user()->id,
                'order_id' => $order->id,
                'shipping_price' => $request->input('shipping-price'),
                'shipping_type' => $request->input('shipping-type'),
                'service_price' => $request->input('service-price'),
                'total_payment' => $order->total_price + $request->input('shipping-price') + $request->input('service-price'),
            ]);

            $response = $midtans->chargeSnap($payment, $order, auth()->user());
            DB::commit();
            return redirect()->to('https://app.sandbox.midtrans.com/snap/v4/redirection/' . $response);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function update_status_payment(int $id)
    {
        try {
            DB::beginTransaction();
            $paymentModel = new Payment();
            $payment = $paymentModel->get_payment_by_order_id($id);
            $payment->status_payment = 'success';
            $paymentModel->update_payment($payment);

            dd($payment);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
