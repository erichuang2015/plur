<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view($user)
    {
        $user = User::where('name', $user)->first();

        return view('backend.user.profile', [
            'name'  => $user->name,
            'email' => $user->email,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $user->email = $request->get('email');

        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
