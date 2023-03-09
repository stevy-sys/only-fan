<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Storie;
use App\Models\Product;
use App\Models\MediaHome;
use Illuminate\Http\Request;
use App\Models\DetailPayment;
use App\Models\CouvertureHome;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $mediaHomes = MediaHome::with('media')->get();
        $stories = Storie::with('media')->get();
        $couvertures = CouvertureHome::with('media')->get();
        $countImage = Media::where('type','image')->get()->count();
        $countVideo = Media::where('type','video')->get()->count();
        return view('welcome',compact('mediaHomes','stories','couvertures','countImage','countVideo'));
    }


    public function testBoutique()
    {
        $products = Product::all();
        return view('new_boutique',compact('products'));
    }

    public function test()
    {
        $mediaHomes = MediaHome::with('media')->get();
        $stories = Storie::with('media')->get();
        $couvertures = CouvertureHome::with('media')->get();
        $countImage = Media::where('type','image')->get()->count();
        $countVideo = Media::where('type','video')->get()->count();
        
        return view('index',compact('mediaHomes','stories','couvertures','countImage','countVideo'));
    }


    public function boutique()
    {
        $products = Product::all();
        return view('boutique',compact('products'));
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
        $detail = DetailPayment::with('commands.product')->where('user_id',Auth::id())->first();
        $total = 0 ;

        foreach ($detail->commands as $command) {
            $total = $total + $command->product->price ;
        }

        return view('cart',compact('total','detail'));
    }
}
