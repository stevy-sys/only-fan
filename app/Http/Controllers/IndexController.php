<?php

namespace App\Http\Controllers;

use App\Models\Media;
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
        $countImage = Media::where('type','image')->get()->count();
        $countVideo = Media::where('type','video')->get()->count();
       return view('welcome',compact('mediaHomes','stories','couvertures','countImage','countVideo'));
    }
}
