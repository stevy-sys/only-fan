<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Storie;
use Illuminate\Http\Request;
use App\Models\CouvertureHome;
use App\Jobs\Storie as JobsStorie;
use App\Http\Controllers\Controller;

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
        $stories = Storie::with('media')->where('is_active',true)->get();
        return view('admin.stories',compact('stories'));
    }

    public function postStorie(Media $media)
    {
        $storie = Storie::create([
            'media_id' => $media->id,
            'is_active' => true
        ]);

        JobsStorie::dispatch($storie)->delay(now()->addMinutes(5));
        return view('admin.stories');
    }

    public function activeMedia(Media $media)
    {
        if ($media->active == 0) {
            $media->update(['active' => 1]);
        }else{
            $media->update(['active' => 0]);
        }

        return redirect()->back();
    }

    public function addCouverture(Media $media)
    {
        $couverture = CouvertureHome::create([
            'media_id' => $media->id
        ]);

        return redirect()->route('admin.home.view.couverture',['couvertureHome' => $couverture->id]);
    }

    public function getAllCouverture()
    {
        $couvertures = CouvertureHome::with('media')->get();
        return view('admin.couverture',compact('couvertures'));
    }

    public function viewCouverture(CouvertureHome $couvertureHome)
    {
        $couverture = $couvertureHome->load('media');
        return view('admin.couverture_active',compact('couverture'));
    }

    public function setCouverture(Request $request)
    {
        $couverture = CouvertureHome::find($request->id);
        $couverture->update([
            'description' => $request->description
        ]);

        return redirect()->route('admin.home.couverture');
    }

    public function setCouvertureActive(CouvertureHome $couverture)
    {
        if ($couverture->active == true) {
            $couverture->update(['active' => false]);
        }else{
            $couverture->update(['active' => true]);
        }
        return redirect()->back();
    }
}
