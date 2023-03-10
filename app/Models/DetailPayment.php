<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPayment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function commands()
    {
        return $this->hasMany(Commands::class,'detail_id');
    }
}
