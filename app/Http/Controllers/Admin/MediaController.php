<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\MediaHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index()
    {
       return view('admin.media');
    }

    public function store(Request $request)
    {
        $files = $request->file('video');
        // Stockage de la vidéo dans le système de stockage de Laravel
        foreach ($files as $file) {
            $filename = $file->hashName();
            $path = $file->store('public/media');
            $type = null ;
    
            switch ($file->getMimeType()) {
                case 'video/mp4':
                    $type = 'video';
                    break;
                case 'image/png':
                    $type = 'image';
                    break;
                case 'image/jpeg':
                    $type = 'image';
                    break;
                default:
                $type = null;
                    break;
            }
            if (isset($type)) {
                $media = Media::create([
                    'type' => $type,
                    'name' => $filename,
                    'path' => $path,
                    'enctype' => $file->getMimeType()
                ]);
            }
        }

    
        return redirect()->back()->withSuccess('La vidéo a été uploadée avec succès !');
    }

    public function setActiveMediaHome(Request $request)
    {
        $existe = MediaHome::where('media_id' , $request->id)->first() ;
        if (!isset($exist)) {
            $media = MediaHome::create(['media_id' => $request->id]);
        }

        return redirect()->back();
    }


    public function allGalleryHome()
    {
        $mediaHome = MediaHome::with('media')->get();
        return view('admin.home_gallerie',compact('mediaHome'));
    }
}
