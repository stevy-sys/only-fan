<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];

    public function likes()
    {
        return $this->hasMany(Like::class,'media_id');
    }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'media_id');
    }
}
