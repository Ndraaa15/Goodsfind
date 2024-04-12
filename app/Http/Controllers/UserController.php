<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'user' => auth()->user(),
        ]);
    }

    public function updateUser(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('auth')->with('error', 'You must be logged in to update your profile.');
        }

        $userModel = new User();
        $user = $userModel->getUserByID(auth()->user()->id);

        if(!empty($request->input(('name')))){
            $user->name = $request->input('name');
        }

        if(!empty($request->input(('display-name')))){
            $user->display_name = $request->input('display-name');
        }

        if(!empty($request->input(('email')))){
            $user->email = $request->input('email');
        }

        if($request->input('new-password') === $request->input('confirm-password') && !empty($request->input('new-password')) && !empty($request->input('confirm-password'))){
            $user->password = Hash::make($request->input('new-password'));
        }

        $userModel->updateUser($user);

        return view('dashboard', [
            'user' => $user,
        ]);
    }
}
