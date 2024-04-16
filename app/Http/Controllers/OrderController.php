<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\StatusOrder;
use App\Models\Merchant;


class OrderController extends Controller
{
    public function update_status_order(Request $request, int $order_item_id)
    {
        // $order_item_id = $request->input('order_item_id');
        $orderItemModel = new OrderItem();
        $orderItem = $orderItemModel->get_order_item_by_order_item_id($order_item_id);

        $request->validate([
            'status_order' => StatusOrder::class,
        ]);

        if ($request->input('status-order') == StatusOrder::ACCEPTED) {
            $merchantModel = new Merchant();
            $orderItemWithProductWithMerchant = $orderItem->load('product.merchant');
            $merchant = $merchantModel->get_merchant_by_id($orderItemWithProductWithMerchant->product->merchant->id);
            $merchant->balance = $merchant->balance + $orderItemWithProductWithMerchant->total_price_product + $merchant->service_price;
            $merchantModel->update_merchant($merchant);
        }

        $orderItem->status_order = $request->input('status-order');

        $orderItemModel->update_order_item($orderItem);

        return view('user.merchant.index');
    }
}
