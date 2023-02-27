<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function membres()
    {
        return $this->hasMany(MembreConversation::class,'conversation_id');
    }


    public function messages()
    {
        return $this->hasMany(Message::class,'conversation_id');
    }
    
    public function lastMessage()
    {
        return $this->hasOne(Message::class,'conversation_id');
    }

    public function talked()
    {
        return $this->hasOne(MembreConversation::class,'conversation_id')->where('membrable_type','App\Models\User');
    }
}
