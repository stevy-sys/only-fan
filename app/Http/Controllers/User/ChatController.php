<?php

namespace App\Http\Controllers\User;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ConversationService;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function __construct() {
       
    }

    public function index(ConversationService $conversation)
    {
        $customers = Customers::first();
        $user = Auth::user();
        $message = $conversation->getMyChatUser($customers,$user);
        
        return view('user.chat.index');
    }
}
