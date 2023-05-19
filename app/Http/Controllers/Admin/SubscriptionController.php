<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscription.index',compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscription.create');
    }

    public function createSubscription(Request $request)
    {
        Subscription::create($request->all());
        return redirect()->route('admin.subscription.index');
    }

    public function viewSubscription(Subscription $subscription)
    {
        return view('admin.subscription.update',compact('subscription'));
    }

    public function delete(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back();
    }

    public function update(Subscription $subscription,Request $request)
    {
        $subscription->update($request->all());
        return redirect()->route('admin.subscription.index');
    }
}
