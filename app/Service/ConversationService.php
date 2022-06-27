<?php

namespace App\Service ;

use App\Models\User;
use App\Models\Message;
use App\Models\Customers;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Builder;

class ConversationService 
{
    public function createConversation($request)
    {
        $conversation = Conversation::create([
            'name' => $request->name ? $request->name : 'conversation'  
        ]);

        return $conversation ;
    }

    public function createMembreConversation($conversation,$customer,$user)
    {

        $conversation->membres()->createMany([
            ['user_id' => $customer->id],
            ['user_id' => $user->id],
        ]);

        // $customer->membrable()->create([
        //     'conversation_id' => $conversation->id
        // ]);

        // $user->membrable()->create([
        //     'conversation_id' => $conversation->id
        // ]);
    }

    public function createMessage($request,$sender,$conversation)
    {
        $message = $sender->messagable()->create([
            'convesration_id' => $conversation->id,
            'message' => $request->message
        ]);

        return $message ;
    }

    public function getAllMessageAdmin()
    {
        $conversation = Conversation::with('lastMessage')->get();
        return $conversation ;
    }


    public function getMyChatUser($customer,$user)
    {
       
        $messages = Conversation::whereHas('membres',function ($q) use($user) {
            $q->where('user_id',$user->id);
        })->whereHas('membres',function ($q) use($customer) {
            $q->where('user_id',$customer->id);
        })->with('messages.user')->first();

        return $messages ;
    }

}
