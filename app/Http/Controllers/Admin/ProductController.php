<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    public function active(Product $product)
    {
        $product->update(['active' => !$product->active]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        
        $file = $request->file('image');
        $filename = $file->hashName();
        $file->store('public/media');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'media' => $filename
        ]);
        return redirect()->route('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $filename = null ;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->store('public/media');
        }
        if (isset($filename)) {
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'media' => $filename
            ]);
        }else{
            $product->name = $request->name ;
            $product->description = $request->description ;
            $product->price = $request->price ;
            $product->save();
        }
        return redirect()->route('admin.product.index');
    }

    public function beforeUpdate(Product $product)
    {
        return view('admin.product.update',compact('product'));
    }
}
