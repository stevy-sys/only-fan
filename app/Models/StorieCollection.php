<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorieCollection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mediable()
    {
        return $this->belongsTo(Media::class,'media');
    }
}
