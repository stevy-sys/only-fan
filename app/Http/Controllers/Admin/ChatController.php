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
        $conversations = Conversation::with('talked.membrable')->get();
        if (isset($request->conversation)) {
            $conversationActive = Conversation::with('messages.messagable')->find($request->conversation);
            return view('admin.chat.conversation',compact('conversations','conversationActive'));
        }
        // dd($conversations);
        return view('admin.chat.conversation',compact('conversations'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('customer')->user();
        $conversation = Conversation::find($request->conversation_id);
        if (isset($conversation)) {
            $user->messagable()->create([
                'conversation_id' => $conversation->id,
                'message' => $request->message
            ]);
        }

        return redirect()->back();

        // return view('admin.chat.conversation',compact('conversations'));
    }
}
