@extends('layouts.layout_front')

@section('sub_title')
    {{__('messages.Souscription')}}
@endsection

@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card-deck d-flex justify-content-center" style=" margin-top: 100px;">
            @foreach ($subscribes as $subscribe)
            <div class="service-box">
                <div class="service-ico">
                    <span class="ico-circle"><i class="bi bi-briefcase"></i></span>
                </div>
                <div class="service-content">
                    <h2 class="s-title"> {{$subscribe->amount}} €</h2>
                    <h2 class="s-title"> {{$subscribe->name}} €</h2>
                    {{-- <p class="s-description text-center">
                        <ul>
                            <li>Lorem ipsum dolor sit amet.</li>
                            <li>Lorem, ipsum.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                    </p> --}}
                    <form action="{{ route('payment.process',['locale' => session('locale')]) }}" method="POST">
                        <input type="hidden" value="{{$subscribe->id}}" name="subscribe">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="{{intval($subscribe->amount) * 100 }}"
                            data-currency="eur"
                            data-name="Aphrodite"
                            data-description="{{$subscribe->name}}"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-label="{{__('messages.payer_avec_Stripe_par_CB')}}">
                            >
                        </script>
                    </form>
                    <form class="mt-2" action="{{ url('/paypal/handle-payment-subscription') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$subscribe->id}}" name="subscribe">
                        <button style="padding-left: 24px;padding-right: 24px;padding-top: 4px;font-size: 14px;font-weight: bold;" class="btn btn-primary" type="submit">Paypal <i class="bi bi-paypal"></i> </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
