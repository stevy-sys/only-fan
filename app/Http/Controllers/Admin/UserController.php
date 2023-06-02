<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvoiceSubscibe;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view("admin.user.index",compact('users'));
    }

    public function updateWallet(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update([
            'wallet' => $request->wallet
        ]);
        return redirect()->back();
    }
}
