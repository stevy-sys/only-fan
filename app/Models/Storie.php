<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{
    protected $guarded = [];
    public function media()
    {
        return $this->belongsTo(Media::class,'media_id');
    }
}
