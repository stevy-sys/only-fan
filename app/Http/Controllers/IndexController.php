<?php

namespace App\Http\Controllers;

use App\Models\Storie;
use App\Models\MediaHome;
use Illuminate\Http\Request;
use App\Models\CouvertureHome;

class IndexController extends Controller
{
    public function index()
    {
        $mediaHomes = MediaHome::with('media')->get();
        $stories = Storie::with('media')->get();
        $couvertures = CouvertureHome::with('media')->get();
       return view('welcome',compact('mediaHomes','stories','couvertures'));
    }
}
