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

    public function update_user(Request $request)
    {
        $userModel = new User();
        $user = $userModel->get_user_by_id(auth()->user()->id);

        if (!empty($request->input(('name')))) {
            $user->name = $request->input('name');
        }

        if (!empty($request->input(('display-name')))) {
            $user->display_name = $request->input('display-name');
        }

        if (!empty($request->input(('email')))) {
            $user->email = $request->input('email');
        }

        if ($request->input('new-password') === $request->input('confirm-password') && !empty($request->input('new-password')) && !empty($request->input('confirm-password'))) {
            $user->password = Hash::make($request->input('new-password'));
        }

        $userModel->update_user($user);
        $user->makeHidden(['password', 'remember_token']);
        dd($user);
    }
}
