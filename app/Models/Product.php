<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['in_cart'];

    public function getInCartAttribute()
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $detail = DetailPayment::where('user_id',$user->id)->first();
            if (!isset($detail)) {
                $detail = DetailPayment::create([
                    'user_id' => $user->id,
                    'total' => 0
                ]);
            }
            $exist = $detail->commands()->where('product_id',$this->id)->first();
            if (isset($exist)) {
                return true ;
            }else{
                return false ;
            }
        }
        return false ;
    }
}
