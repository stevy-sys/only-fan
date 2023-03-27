<?php

namespace App\Http\Controllers\User;

use Stripe\Charge;
use Stripe\Stripe;
use App\Jobs\Subscribe;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SubscribeController extends Controller
{
    public function index()
    {
        $currentRoute = Route::currentRouteName();
        $subscribes = Subscription::all();
        
        return view('user.subscribe.index',compact('subscribes','currentRoute'));
    }

    public function show()
    {
        return view('user.subscribe.show');
    }

    public function process(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $subscribe = Subscription::find((int) $request->subscribe);
        $charge = Charge::create([
            'amount' => $subscribe->amount,
            'currency' => 'usd',
            'description' => 'Payment',
            'source' => $request->stripeToken,
        ]);
        if (isset($charge->id)) {
            $user = Auth::user();
            
            $user->update([
                'premium' => true,
                'premium_type' => $subscribe->name
            ]);
            
            // if ($subscribe->name == '1 mois') {
            //     Subscribe::dispatch($user->id)->delay(now()->addMinutes(5));
            // }

            // if ($subscribe->name == '6 mois') {
            //     Subscribe::dispatch($user->id)->delay(now()->addMinutes(15));
            // }

            // if ($subscribe->name == '1 an') {
            //     Subscribe::dispatch($user->id)->delay(now()->addMinutes(60));
            // }
        }
       

        // Traiter le paiement réussi
        return view('home');
    }
}
