<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    public function get_merchant()
    {
        $merchantModel = new Merchant();
        $orderItemModel = new OrderItem();
        $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);
        $products = $merchant->products;
        $orderItems = $orderItemModel->get_order_item_by_merchant_id($merchant->id);


        return view('user.merchant.index', [
            'merchant' => $merchant,
            'products' => $products,
            'orderItems' => $orderItems,
        ]);
    }
    public function update_merchant(Request $request)
    {
        try{
            DB::beginTransaction();
            $merchantModel = new Merchant();
            $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);

            if (!empty($request->input(('service-price')))) {
                $merchant->service_price = $request->input('service-price');
            }

            if (!empty($request->input(('account-number')))) {
                $merchant->account_number = $request->input('account-number');
            }

            if (!empty($request->input(('bank_name')))) {
                $merchant->bank_name = $request->input('bank-name');
            }

            if (!empty($request->input(('location')))) {
                $merchant->location = $request->input('location');
            }

            $merchantModel->update_merchant($merchant);
            DB::commit();
            return redirect()->route('merchant');
        }
        catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

    }

    public function withdraw(Request $request)
    {
        try{
            DB::beginTransaction();
            $merchantModel = new Merchant();
            $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);

            if ($merchant->balance < $request->input('amount')) {
                return response()->json([
                    'message' => 'Balance is not enough',
                ], 400);
            }
            $merchant->balance = $merchant->balance - $request->input('amount');
            $merchantModel->update_merchant($merchant);
            DB::commit();
            return redirect()->route('merchant');
        }
        catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
