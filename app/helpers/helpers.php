<?php

use App\Models\Menu;
use App\Models\Role;
use App\Models\MediaHome;
use Illuminate\Support\Facades\Auth;

function isExistInMediaHome($media_id) {
    $exist = MediaHome::where('media_id',$media_id)->first();
    if (isset($exist)) 
        return true;
    return false;
}

function test(){
   $admin = Auth::user();
    $role = $admin->roles ;
    if  ($role->name == 'super-admin') {
        return Menu::with('sub')->whereNull('parent_id')->get();
    }
    return Menu::with(['sub' => function ($query) use ($role) {
        $query->whereHas('roles', function ($subQuery) use ($role) {
            $subQuery->where('roles.id', $role->id);
        });
    }])->whereNull('parent_id')->get();
}

function getRole() {
    $admin = Auth::user();
    $role = $admin->roles ;
    return $role ;
}

function isMenuSelected($menu_id,$role) {
    $role = Role::find($role->id);
    $menuexist = $role->menus->toArray();
    $menus = [] ;
    foreach ($menuexist as $menu) {
        $menus[] = $menu['id'];
    }
    if (in_array($menu_id,$menus)) 
        return true;
    else
        return false ;
}