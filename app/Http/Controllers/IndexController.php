<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Storie;
use App\Models\Product;
use App\Models\MediaHome;
use Illuminate\Http\Request;
use App\Models\DetailPayment;
use App\Models\CouvertureHome;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

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
        $stories = Storie::with('media')->get();
        $couvertures = CouvertureHome::with('media')->get();

        return view('index',compact('mediaHomes','stories','couvertures'));
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
        DetailPayment::whereId((int)$request->detail)->update(['status' => 'payer']);     

        // Traiter le paiement réussi
        return view('home');
    }
}
