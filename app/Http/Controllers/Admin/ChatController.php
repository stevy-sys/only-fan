<?php

namespace App\Http\Controllers\Admin;

use App\Events\ChatChannel;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $conversations = Conversation::with('talked.user')->get();
        if (isset($request->conversation)) {
            $conversationActive = Conversation::with(['talked.user','messages.user'])->find($request->conversation);
            return response()->json([
                'conversationActive'=> $conversationActive
            ],200);
        }
        $auth = Auth::id();
        return view('admin.chat.conversation',compact('conversations','auth'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $conversation = Conversation::find($request->conversation_id);
        $message = $conversation->messages()->create([
            'message' => $request->message,
            'user_id' => $user->id
        ]);
        $conversation->load('talked.user');
        $message->load('user');
        Broadcast::event(new ChatChannel($conversation->talked->user->id,$message));
        return response()->json([
            "message" => $message->load('user')
        ]);
    }
}
