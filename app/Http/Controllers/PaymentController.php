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
use App\ThirdParty\Midtrans;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    public function checkoutPage()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        $paymentModel = new Payment();
        $shippingAddressModel = new ShippingAddress();
        $cartModel = new Cart();
        $cartItemModel = new CartItem();
        $orderModel = new Order();
        $orderItemModel = new OrderItem();
        $merchantModel = new Merchant();

        $merchant = $merchantModel->getMerchantByUserID(auth()->user()->id);
        $cart = $cartModel->getCartByUserID(auth()->user()->id);


        $orderID = Str::random(10);
        $order = $orderModel->addOrder([
            'order_code' => 'GOODSVIND-' . $orderID,
            'user_id' => auth()->user()->id,
            'total_price' => $cart->total_price,
        ]);

        $cartItems = $cart->cart_items;
        foreach ($cartItems as $cartItem) {
            $orderItemModel->addOrderItem([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'total_price_product' => $cartItem->total_price_product,
            ]);
        }
        $cartItemModel->deleteAllCartItem($cart->id);
        $cart->updateTotalPrice();

        $shippingAddressModel->createShippingAddress([
            'order_id' => $order->id,
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'country' => $request->input('country'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'detail_address' => $request->input('detail_address'),
        ]);

        $midtans = new Midtrans();
        $payment = $paymentModel->createPayment([
            'user_id' => auth()->user()->id,
            'order_id' => $order->id,
            'shipping_price' => $merchant->shipping_price,
            'shipping_type' => $request->input('shipping_type'),
            'service_price' => $merchant->service_price,
            'total_payment' => $order->total_price + $merchant->shipping_price + $merchant->service_price,
            'payment_type' => $request->input('payment_type'),
        ]);

        $response = $midtans->chargeCoreApi($payment);
        dd($response);
        return redirect()->route('order', ['id' => $request->input('order_id')]);
    }
}
