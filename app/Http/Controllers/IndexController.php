<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Media;
use App\Models\Storie;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\MediaHome;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\DetailPayment;
use App\Models\CouvertureHome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    public function testBoutique()
    {
        $products = Product::all();
        return view('new_boutique',compact('products'));
    }


    public function index()
    {
        $mediaHomes = MediaHome::with('media')->get();
        // $stories = Storie::with(['media','collectionStorie.mediable'])->get();
        
        $couvertures = CouvertureHome::with('media')->get();
        return view('index',compact('mediaHomes','couvertures'));
    }


    public function boutique()
    {
        $products = Product::all();
        return view('new_boutique',compact('products'));
    }

    public function addToCart(Product $product)
    {
        $detail = DetailPayment::where('user_id',Auth::id())->first();
        if (!isset($detail)) {
            $detail = DetailPayment::create([
                'total' =>  0,
                'user_id' => Auth::id()
            ]);
        }

        $exist = $detail->commands()->where('product_id',$product->id)->first();
        if (!isset($exist)) {
            $detail->commands()->create([
                'product_id' => $product->id
            ]);
        }
        else{
            $exist->delete();
        }
        $detail->load('commands');
        $total = 0 ;
        foreach ($detail->commands as $command) {
            $total += $command->product->price;
        }
        $detail->update(compact('total'));

        return redirect()->back();
    }

    public function getDetailPaiment()
    {
        $detail = DetailPayment::with('commands.product')->where('user_id',Auth::id())->whereNull('status')->first();
        $total = 0 ;
        if (isset($detail)) {
            foreach ($detail->commands as $command) {
                $total = $total + $command->product->price ;
            }
        }

        return view('cart',compact('total','detail'));
    }

    public function process(Request $request)
    {
        Stripe ::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create([
            'amount' => $request->total,
            'currency' => 'usd',
            'description' => 'Payment',
            'source' => $request->stripeToken,
        ]);

        $detaile = DetailPayment::whereId((int)$request->detail)->first();
        $invoice = Invoice::create([
            'user_id' => Auth::id(),
            'numero' => $charge->id,
            'detail_id' => $detaile->id,
            'paiment' => 'Stripe',
        ]);
        $detaile->update(['status' => 'payer']);  

        // Traiter le paiement réussi
        return view('home');
    }
}
