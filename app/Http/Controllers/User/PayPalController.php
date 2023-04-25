<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\DetailPayment;
use App\Models\InvoiceSubscibe;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function handlePayment(Request $request)
    {
        $provider = new PayPalClient;
        $detail = DetailPayment::find($request->detail) ;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment',[
                    'detail_id' => $detail->id
                ]),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $detail->total
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function handlePaymentSubscription(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $subscription = Subscription::find($request->subscribe);
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment.subscription',[
                    'subscription_id' => $subscription->id
                ]),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $subscription->amount
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->back()
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $detail = DetailPayment::where('user_id',Auth::id())->where('status',null)->first();

            $detail->invoice()->create([
                'numero' => $response['id'],
                'user_id' => Auth::id(),
                'paiment' => 'Paypal'
            ]);

            $detail->update([
                'status' => 'payer'
            ]);
            return redirect()
                ->back()
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentSuccessSubscription(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $subscriptionId = $request->input('subscription_id');
            $subscribe = Subscription::find($subscriptionId);
            $invoiceSubscribe = InvoiceSubscibe::create([
                'user_id' => Auth::id(),
                'numero' => $response['id'],
                'subscription_id' => $subscriptionId,
                'paiment' => 'Paypal',
            ]);
            $user = Auth::user();
            
            $user->update([
                'premium' => true,
                'premium_type' => $subscribe->name
            ]);

            return redirect()
                ->back()
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
