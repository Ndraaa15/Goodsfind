<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
    public function update_merchant(Request $request){
        $merchantModel = new Merchant();
        $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);

        if(!empty($request->input(('service-price')))){
            $merchant->service_price = $request->input('service-price');
        }

        if(!empty($request->input(('shipping-price')))){
            $merchant->shipping_price = $request->input('shipping-price');
        }

        if(!empty($request->input(('account-number')))){
            $merchant->account_number = $request->input('account-number');
        }

        if(!empty($request->input(('bank_name')))){
            $merchant->bank_name = $request->input('bank-name');
        }

        if(!empty($request->input(('location')))){
            $merchant->location = $request->input('location');
        }

        $merchantModel->update_merchant($merchant);

        dd($merchant);
    }

    public function withdraw(Request $request){
        $merchantModel = new Merchant();
        $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);

        $merchant->balance = $merchant->balance - $request->input('amount');
        $merchantModel->update_merchant($merchant);

        dd($merchant);
    }
}
