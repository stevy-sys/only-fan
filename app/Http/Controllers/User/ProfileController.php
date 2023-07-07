<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profile');
        if (!isset($user->profile)) {
           $user->profile()->create();
        }
        $user = Auth::user()->load('profile');
        return view('user.profile.index',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        $user->profile()->update([
            'phone' => $request->phone ,
            'adress' => $request->adress
        ]);
        
        return redirect()->back();
    }
}
