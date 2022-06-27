<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $conversations = Conversation::with('talked.user')->get();
        if (isset($request->conversation)) {
            $conversationActive = Conversation::with('messages.user')->find($request->conversation);
            return view('admin.chat.conversation',compact('conversations','conversationActive'));
        }
        // dd($conversations);
        return view('admin.chat.conversation',compact('conversations'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $conversation = Conversation::find($request->conversation_id);
        if (isset($conversation)) {
            $conversation->messages()->create([
                'message' => $request->message,
                'user_id' => $user->id
            ]);
        }

        return redirect()->back();

        // return view('admin.chat.conversation',compact('conversations'));
    }
}
