<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\StatusOrder;
use App\Models\Merchant;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class OrderController extends Controller
{
    public function update_status_order(Request $request, int $order_item_id)
    {
        try {
            DB::beginTransaction();
            $orderItemModel = new OrderItem();
            $orderItem = $orderItemModel->get_order_item_by_order_item_id($order_item_id);

            $request->validate([
                'status-order' => [new Enum(StatusOrder::class)],
            ]);

            if ($request->input('status-order') == "Accepted") {
                $merchantModel = new Merchant();
                $orderItemWithProductWithMerchant = $orderItem->load('product.merchant');
                $merchant = $merchantModel->get_merchant_by_id($orderItemWithProductWithMerchant->product->merchant->id);
                $merchant->balance = $merchant->balance + $orderItemWithProductWithMerchant->total_price_product + $merchant->service_price;
                $merchantModel->update_merchant($merchant);
            }

            $orderItem->status_order = $request->input('status-order');

            $orderItemModel->update_order_item($orderItem);
            DB::commit();
            return redirect()->route('merchant');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
