<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Media;
use App\Models\Storie;
use App\Models\MediaHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $premium = false ;
        $medias = [];
        $mediaHomes = [] ;
        if (auth()->guard('web')->user()->premium == 1) {
            $premium = true  ;
            $medias = MediaHome::whereHas('media',function ($q) {
                $q->where('show',1);
            })->with('media')->get()->pluck('media')->all();
        }else{
            $mediaHomes = MediaHome::whereHas('media',function ($q) {
                $q->where('show',1);
            })->with('media')->get();
        }
        return view('user.gallery.index',compact('medias','mediaHomes','premium'));
    }

    public function show($locale,Media $media)
    {
        $media = Media::with(['comments.user','likes'])->whereId($media->id)->first();
        // if (isset($media->comment)) {
        //     $media->comments()->create([
        //         'user_id' => Auth::guard('web')->user()->id,
        //         'comment' => $request->comment,
        //     ]);
        //     return redirect()->back();
        // }
        return view('user.gallery.show',compact('media'));
    }

    public function like(Request $request)
    {
        $media = Media::find($request->media);
        $like = Like::where([
            'user_id'=> Auth::guard('web')->user()->id,
            'media_id'=> (int) $request->media,
        ])->first();
        if (isset($like)) {
            $like->delete();
        }else{
            $media->likes()->create([
                'user_id'=> Auth::guard('web')->user()->id,
            ]);
        }
        return view('user.gallery.show',compact('media'));
    }

}
