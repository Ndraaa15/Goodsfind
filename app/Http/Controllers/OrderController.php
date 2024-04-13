<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\StatusOrder;

class OrderController extends Controller
{
    public function update_status_order(Request $request, int $order_id)
    {
        $orderModel = new Order();
        $order = $orderModel->get_order_by_id($order_id);

        $request->validate([
            'status_order' => StatusOrder::class,
        ]);

        $order->status_order = $request->input('status-order');
        $orderModel->update_order($order);
        dd('Order deleted!');
    }
}
