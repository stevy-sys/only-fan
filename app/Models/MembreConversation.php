<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembreConversation extends Model
{
    protected $guarded = [];

    public function membrable()
    {
        return $this->morphTo();
    }
}
