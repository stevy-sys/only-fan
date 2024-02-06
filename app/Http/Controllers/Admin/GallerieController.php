<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Storie;
use Illuminate\Http\Request;
use App\Models\CouvertureHome;
use App\Models\StorieCollection;
use App\Jobs\Storie as JobsStorie;
use App\Http\Controllers\Controller;
use App\Models\MediaHome;

class GallerieController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return view('admin.gallerie',compact('medias'));
    }

    public function delete( int $media)
    {
        Media::find($media)->delete();
        StorieCollection::where('media',$media)->delete();
        MediaHome::where('media_id',$media)->delete();
        CouvertureHome::where('media_id',$media)->delete();
        return redirect()->back();
    }

    public function show()
    {
        return view('admin.media_show');
    }

    public function updateStorie(Request $request)
    {
        try {
            $storie = Storie::find($request->storieId);
            $storie->update([
                'name' => $request->name
            ]);
            StorieCollection::where('storie_id',$storie->id)->delete();
            foreach ($request->data as $media) {
                $storie->collectionStorie()->create(['media' => $media]);
            }
            return response()->json([
                'message' => 'update success'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ],200);
        }



    }

    public function showStorie(Storie $storie)
    {
        $stories = $storie->load('collectionStorie.mediable');
        $temp = [] ;
        foreach ($stories->collectionStorie as $collection) {
            $mediable = $collection->mediable ;
            $mediable->exist = true ;
            $temp[] = $mediable ;
        }
        $galleries = Media::where('show',true)->where('type','image')->get();
        $temp = collect($temp);
        $temp = $temp->concat($galleries)->unique('id');


        return view('admin.storieShow',compact('stories','galleries','temp'));
    }

    public function deleteElementStorie(StorieCollection $storieCollection)
    {
        $storieCollection->delete();
        return redirect()->back();
    }

    public function allStorie()
    {
        $stories = Storie::with('collectionStorie.mediable')->get();
        $galleries = Media::where('active',true)->where('type','image')->get();
        return view('admin.stories',compact('stories','galleries'));
    }

    public function postStorie(Request $request)
    {
        $storie = Storie::create([
            'name' => $request->name
        ]);
        foreach ($request->data as $media) {
            $storie->collectionStorie()->create(['media' => $media]);
        }
        return response()->json([
            'message' => 'storie created'
        ],200);
        //JobsStorie::dispatch($storie)->delay(now()->addMinutes(1));
        //$stories = Storie::with('media')->get();
    }

    public function deleteStorie(Storie $storie)
    {
        $storie->delete();
        return redirect()->back();
    }

    public function activeShowMedia(Media $media)
    {
        if ($media->show == 0) {
            $media->update(['show' => 1]);
        }else{
            $media->update(['show' => 0]);
        }

        return redirect()->back();
    }

    public function addCouverture(Media $media)
    {
        $exist = CouvertureHome::where('media_id',$media->id)->first();
        if (!isset($exist)) {
            $couverture = CouvertureHome::create([
                'media_id' => $media->id
            ]);
            return redirect()->route('admin.home.view.couverture',['couvertureHome' => $couverture->id]);
        }
        return redirect()->back();
    }

    public function getAllCouverture()
    {
        $couvertures = CouvertureHome::with('media')->get();
        return view('admin.couverture',compact('couvertures'));
    }

    public function deletecouverture(Request $request)
    {
        CouvertureHome::where('id',(int) $request->couvertureHome)->delete();
        // $couvertures->delete();
        return redirect()->route('admin.home.couverture');
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
