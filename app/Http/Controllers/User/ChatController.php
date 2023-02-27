<?php

namespace App\Http\Controllers\User;

use App\Models\Customers;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ConversationService;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function __construct() {
       
    }

    public function index(ConversationService $conversationService,Request $request)
    {
        $customers = Customers::first();
        $user = Auth::user();
        $conversation = $conversationService->getMyChatUser($customers,$user);
        
        if (!isset($conversation)) {
            
            $conversation = $conversationService->createConversation($request);
            $conversationService->createMembreConversation($conversation,$customers,$user);
            $conversation = $conversationService->getMyChatUser($customers,$user);
        }
        
        return view('user.chat.index',compact('conversation'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $conversation = Conversation::find($request->conversation_id);
        if (isset($conversation)) {
            $user->messagable()->create([
                'conversation_id' => $conversation->id,
                'message' => $request->message
            ]);
        }
        return redirect()->back();
        
    }
}
