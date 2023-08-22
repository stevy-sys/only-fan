<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReseauSocio;
use Illuminate\Http\Request;

class ReseauSocioController extends Controller
{
    public function index() {
        $reseauSocios = ReseauSocio::orderBy('order','asc')->get();
        return view('admin.reseau.index',compact('reseauSocios'));
    }

    public function update(ReseauSocio $reseau,Request $request) {
        $countAll = ReseauSocio::get() ;
        $curretOrder = intval($reseau->order);
        $idReseau = $reseau->id ;
        $reseau->update($request->all());

        $newReseau = ReseauSocio::find($idReseau);
        if ($curretOrder != $newReseau->order) {
           
            ReseauSocio::where('order', '>=', $newReseau->order)
            ->where('id', '<>', $newReseau->id) // Évitez de décrémenter l'enregistrement lui-même
            ->increment('order');

            // ReseauSocio::where('order', '<=', $newReseau->order)
            // ->where('id', '<>', $newReseau->id) // Évitez de décrémenter l'enregistrement lui-même
            // ->decrement('order');
        }
        return redirect()->route('admin.reseau.index');
    }

    public function delete(ReseauSocio $reseau) {
        $curretOrder = $reseau->order ;
        $reseau->delete();
        ReseauSocio::where('order', '>=', $curretOrder)->decrement('order');
        return redirect()->route('admin.reseau.index');
    }

    public function create(Request $request) {
        $resau = ReseauSocio::create($request->all());
        $exist = ReseauSocio::where('order',$resau->order)->get();
        if (count($exist) > 1) {
            ReseauSocio::where('order', '>=', $resau->order)
            ->where('id', '<>', $resau->id) // Évitez de décrémenter l'enregistrement lui-même
            ->increment('order');
        }
        return redirect()->route('admin.reseau.index');
    }

    public function reorganisate(Request $request) {

    }

}
