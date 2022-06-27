<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return view('admin.config.index',compact('config'));
    }

    public function store(Request $request)
    {
        $config = Config::first();
        $config->update($request->all());
        return redirect()->back();
    }

    public function reset()
    {
        $config = Config::first();
        $config->bg_color_menu = '#ff00ff';
        $config->save();
        return redirect()->back();
    }
}
