<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function updateMerchant(Request $request){
        if (!auth()->check()) {
            return redirect()->route('auth')->with('error', 'You must be logged in to update your profile.');
        }

        $merchantModel = new Merchant();
        $merchant = $merchantModel->getMerchantByID(auth()->user()->id);

        if(!empty($request->input(('name')))){
            $merchant->name = $request->input('name');
        }

        if(!empty($request->input(('display-name')))){
            $merchant->display_name = $request->input('display-name');
        }

        if(!empty($request->input(('email')))){
            $merchant->email = $request->input('email');
        }

        if($request->input('new-password') === $request->input('confirm-password') && !empty($request->input('new-password')) && !empty($request->input('confirm-password'))){
            $merchant->password = Hash::make($request->input('new-password'));
        }
    }
}
