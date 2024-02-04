<?php

namespace App\Http\Controllers\User;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\WalletShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        return view('user.wallet.index');
    }

    public function activeWallet(Request $request)
    {
        // dd($request->all());
        $conf = Config::first();
        $wallet = WalletShop::where('user_id',Auth::id())->first();
        if (!isset($wallet)) {
            WalletShop::create([
                'user_id' => Auth::user()->id,
                'wallet' => $request->wallet,
                'ballance' => $request->wallet * $conf->ballance,
            ]);
        }else{
            $wallet->update([
                'wallet' => $request->wallet,
                'ballance' => $request->wallet * $conf->ballance,
            ]);
        }
        return redirect()->route('wallet.payment',['locale' => session('locale')]);
    }

    public function getPayment(Request $request)
    {
        $myWallet = WalletShop::where('user_id',Auth::id())->first();
        return view('user.wallet.getPayment',compact('myWallet'));
    }


    public function createPaiment(Request $request)
    {
        Stripe ::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create([
            'amount' => (float) $request->total,
            'currency' => 'usd',
            'description' => 'Payment',
            'source' => $request->stripeToken,
        ]);

        if ($charge) {
            $user = Auth::user() ;
            $user->update([
                'wallet' => $request->wallet + $user->wallet
            ]);
        }
        // $detaile = DetailPayment::whereId((int)$request->detail)->first();
        // $invoice = Invoice::create([
        //     'user_id' => Auth::id(),
        //     'numero' => $charge->id,
        //     'detail_id' => $detaile->id,
        //     'paiment' => 'Stripe',
        // ]);
        // $detaile->update(['status' => 'payer']);

        // Traiter le paiement réussi
        return view('home');
    }
}
