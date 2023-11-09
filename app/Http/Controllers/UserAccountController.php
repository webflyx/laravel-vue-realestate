<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::make($request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]));

        $user->password = Hash::make($user->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('listing.index')->with('success','Account was created!');
    }
}
