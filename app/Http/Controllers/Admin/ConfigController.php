<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\CouvertureHome;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Texte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::first();
        return view('admin.config.index',compact('config'));
    }

    
    public function createadmin(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'language' => 'fr',
            'email_verified_at' => now(),
            'role_id' => $request->role_id
        ]);
        return redirect()->back();
    }
    
    function roles(){
        $roles = Role::with('menus')->get();
        $menus = Menu::with('sub')->whereNull('parent_id')->get();
        return view('admin.config.roles',compact('roles','menus'));
    }

    public function store(Request $request)
    {
        $config = Config::first();
        $config->update($request->all());
        return redirect()->back();
    }

    function updateRole(Request $request,Role $role) {
       $role->menus()->sync($request->menus);
       return redirect()->back();
    }

    public function reset()
    {
        $config = Config::first();
        $config->bg_color_menu = '#ff00ff';
        $config->save();
        return redirect()->back();
    }

    // public function couverture()
    // {
    //     $couverture = CouvertureHome::first();
    //     return view('admin.config.couverture',compact('couverture'));
    // }

    // public function setCouverture()
    // {
        
    // }

    public function texte()
    {
        $texte = Texte::first();
        return view('admin.config.texte',compact('texte'));
    }

    public function update(Request $request)
    {
        $texte = Texte::first();
        $texte->update($request->all());
        return response()->json([
            'message' => 'succesfully'
        ],201);
    }
}
