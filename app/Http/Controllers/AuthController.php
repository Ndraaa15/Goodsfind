<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }

    public function user_register(Request $request)
    {
        $request->validate([
            'register-email' => ['required', 'email', 'unique:users,email'],
            'register-password' => ['required', 'min:8'],
        ]);

        $user = new Users();
        $user->name = $request->input('register-name');
        $user->email = $request->input('register-email');
        $user->password = Hash::make($request->input('register-password'));
        $user->save();

        return redirect()->route('homepage');
    }

    public function user_signin(Request $request)
    {
        $request->validate([
            'signin-email' => ['required', 'email'],
            'signin-password' => ['required'],
        ]);

        $user = Users::where('email', $request->input('signin-email'))->first();
        if(empty($user)){
            return redirect()->route('auth')->with('error', 'Invalid email or password');
        }

        if (!$user || !Hash::check($request->input('signin-password'), $user->password)) {
            return redirect()->route('auth')->with('error', 'Invalid email or password');
        }

        return redirect()->route('homepage');
    }
}
