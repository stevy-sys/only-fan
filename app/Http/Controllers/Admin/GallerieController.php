<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Storie as JobsStorie;
use App\Models\Media;
use App\Models\Storie;
use Illuminate\Http\Request;

class GallerieController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return view('admin.gallerie',compact('medias'));
    }

    public function show()
    {
        return view('admin.media_show');
    }

    public function allStorie()
    {
        $storie = Storie::with('media')->where('is_active',true)->get();

        return view('admin.stories',compact('storie'));
    }

    public function postStorie(Request $request)
    {
        $storie = Storie::create([
            'media_id' => (int) $request->storie,
            'is_active' => true
        ]);

        JobsStorie::dispatch($storie)->delay(now()->addMinutes(5));
        return view('admin.stories');
    }
}
