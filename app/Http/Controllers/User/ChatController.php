<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Customers;
use App\Events\ChatChannel;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ConversationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class ChatController extends Controller
{

    public function __construct() {
       
    }

    public function index(ConversationService $conversationService,Request $request)
    {
        $customers = User::whereHas('roles',function ($q){
            $q->where('name','super-admin');
        })->first();
        
        $user = Auth::user();
        $conversation = $conversationService->getMyChatUser($customers,$user);
        
        if (!isset($conversation)) {
            
            $conversation = $conversationService->createConversation($request);
            $conversationService->createMembreConversation($conversation,$customers,$user);
            $conversation = $conversationService->getMyChatUser($customers,$user);
        }
        return view('user.chat.index',compact('conversation','user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $conversation = Conversation::find($request->conversation_id);
        $message = null ;
        if (isset($conversation)) {
            $message = $conversation->messages()->create([
                'message' => $request->message,
                'user_id' => $user->id,
            ]);
        }
        $message->load('user');
        $conversation->load('talked.user');
        Broadcast::event(new ChatChannel($conversation->talked->user->id,$message));
        return response()->json([
            'message' => $message
        ],201);
    }
}
