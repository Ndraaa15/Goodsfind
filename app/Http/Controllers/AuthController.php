<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth_page()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'register-email' => ['required', 'email'],
                'register-password' => ['required', 'min:8'],
            ]);

            $userModel = new User();
            $merchantModel = new Merchant();
            $cartModel = new Cart();

            $user = $userModel->create_user([
                'name' => $request->input('register-name'),
                'display_name' => $request->input('register-display-name'),
                'email' => $request->input('register-email'),
                'password' => Hash::make($request->input('register-password')),
            ]);

            $merchantModel->create_merchant([
                'user_id' => $user->id,
            ]);

            $cartModel->create_cart([
                'user_id' => $user->id,
            ]);
            $user->makeHidden(['password', 'remember_token']);
            DB::commit();
            return redirect()->route('auth', [
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function signin(Request $request)
    {
        try {

            $request->validate([
                'signin-email' => ['required', 'email'],
                'signin-password' => ['required'],
            ]);

            $credentials = [
                'email' => $request->input('signin-email'),
                'password' => $request->input('signin-password'),
            ];

            if (!auth()->attempt($credentials)) {
                return redirect()->route('auth')->with('error', 'Invalid email or password');
            }

            return redirect()->route('homepage', [
                'user' => auth()->user(),
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function signout()
    {
        auth()->logout();
        return redirect()->route('homepage');
    }
}
