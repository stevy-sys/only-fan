<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
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
        $file = $request->file('video');

        // Vérification que le fichier est une vidéo
        // if ($file->getMimeType() !== 'image/jpeg' || $file->getMimeType() !== 'image/png' || $file->getMimeType() !== 'video/mp4') {
        //     return redirect()->back()->withErrors(['Le fichier doit être une vidéo au format MP4 ou JPG.']);
        // }

        // Stockage de la vidéo dans le système de stockage de Laravel
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
                'path' => $path
            ]);
        }

        // if ($file->getMimeType() === 'image/jpeg' || $file->getMimeType() === 'image/png') {
        //     // C'est une image
        //     // Code pour stocker l'image
        // } elseif ($file->getMimeType() === 'video/mp4') {
        //     // C'est une vidéo
        //     // Code pour stocker la vidéo
        // } else {
        //     // Le fichier n'est ni une image ni une vidéo
        //     // Code pour gérer cette situation
        // }

        return redirect()->back()->withSuccess('La vidéo a été uploadée avec succès !');
    }
}
