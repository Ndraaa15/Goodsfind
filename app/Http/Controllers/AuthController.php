<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'register-email' => ['required', 'email', 'unique:users,email'],
            'register-password' => ['required', 'min:8'],
        ]);

        $userModel = new User();
        $merchantModel = new Merchant();
        $request->input('register-name');

        $createdUser = $userModel->createUser([
            'name' => $request->input('register-name'),
            'display_name' => $request->input('register-display-name'),
            'email' => $request->input('register-email'),
            'password' => Hash::make($request->input('register-password')),
        ]);

        $merchantModel->createMerchant([
            'user_id' => $createdUser->id,
        ]);

        return redirect()->route('auth')->with('success', 'Account created successfully. Please sign in.');
    }

    public function userSignin(Request $request)
    {
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
    }

    public function userSignout()
    {
        auth()->logout();
        return redirect()->route('homepage');
    }
}
