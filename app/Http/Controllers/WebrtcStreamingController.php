<?php

namespace App\Http\Controllers;

use App\Models\Live;
use App\Events\StreamOffer;
use App\Events\StreamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WebrtcStreamingController extends Controller
{

    public function index()
    {
        DB::table('lives')->delete();
        $live = Live::create([
            'url' => uniqid(),
            'status' => 0
        ]);
        //  The view for the broadcaster.
        return view('admin.live.index', [
            'type' => 'broadcaster', 
            'id' => Auth::guard('web')->user()->id,
            'url' => $live->url
        ]); 
    }

    public function startStream()
    {
        $live = Live::get()->last();
        $live->update(['status' => 1]);
        return response()->json([
            "message" => "live create"
        ]);
    }

    public function consumer($locale,$streamId)
    {
        $live = Live::where('status',1)->first();
        // The view for the consumer(viewer). They join with a link that bears the streamId
        // initiated by a specific broadcaster.
        return view('user.live.index', [
            'type' => 'consumer', 
            'streamId' => isset($live->url) ? $live->url : null, 
            'id' => Auth::guard('web')->user()->id
        ]);
    }

    public function makeStreamOffer(Request $request)
    {
        // Broadcasts an offer signal sent by broadcaster to a specific user who just joined
        $data['broadcaster'] = $request->broadcaster;
        $data['receiver'] = $request->receiver;
        $data['offer'] = $request->offer;

        event(new StreamOffer($data));
    }

    public function makeStreamAnswer(Request $request)
    {
        // Sends an answer signal to broadcaster to fully establish the peer connection.
        $data['broadcaster'] = $request->broadcaster;
        $data['answer'] = $request->answer;
        event(new StreamAnswer($data));
    }
}
