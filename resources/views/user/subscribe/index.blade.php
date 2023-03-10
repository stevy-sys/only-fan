@extends('layouts.layout_front')

@section('sub_title')
    Souscription
@endsection

@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container mt-3">
        <div class="card-deck">
            @foreach ($subscribes as $subscribe)

            <div class="service-box">
                <div class="service-ico">
                    <span class="ico-circle"><i class="bi bi-briefcase"></i></span>
                </div>
                <div class="service-content">
                    <h2 class="s-title">100€</h2>
                    <p class="s-description text-center">
                        <ul>
                            <li>Lorem ipsum dolor sit amet.</li>
                            <li>Lorem, ipsum.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
                        {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia,
                        provident vitae! Magni
                        tempora perferendis eum non provident. --}}
                    </p>
                    <form action="{{ route('payment.process',['locale' => session('locale')]) }}" method="POST">
                        <input type="hidden" value="{{$subscribe->id}}" name="subscribe">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="{{$subscribe->amount}}"
                            data-name="Aphrodite"
                            data-description="{{$subscribe->name}}"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto">
                        </script>
                    </form>
                </div>
            </div>


                {{-- <div class="card mb-4">
                    <div class="card-body">
                        <div class="service-ico">
                            <span class="ico-circle"><i class="bi bi-briefcase"></i></span>
                        </div>
                        <div class="service-content">
                            <h2 class="s-title">100€</h2>
                            <p class="s-description text-center">
                                <ul>
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Lorem, ipsum.</li>
                                    <li>Lorem ipsum dolor sit.</li>
                                </ul>
                                
                            </p>
                            <div class="container mt-3">
                                <form action="{{ route('payment.process',['locale' => session('locale')]) }}" method="POST">
                                    <input type="hidden" value="{{$subscribe->id}}" name="subscribe">
                                    @csrf
                                    <script
                                        src="https://checkout.stripe.com/checkout.js"
                                        class="stripe-button"
                                        data-key="{{ env('STRIPE_KEY') }}"
                                        data-amount="{{$subscribe->amount}}"
                                        data-name="Aphrodite"
                                        data-description="{{$subscribe->name}}"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
