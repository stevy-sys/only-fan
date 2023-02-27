<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profile.index',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);
        
        return redirect()->back();
    }
}
