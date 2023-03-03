<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivestreamController extends Controller
{

   public function customer(Request $request)
   {
     if (isset($request->username)) {
          return redirect()->route('livestream.user',['username' => $request->username]);
     }
     return view('live.livestream');
   }

   public function user(Request $request)
   {
     return view('live.watch',compact('request'));
   }


}
