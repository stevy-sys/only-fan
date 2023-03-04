@extends('layouts.layout')

@section('sub_title')
    Payment
@endsection

@section('style')
    <style>

    </style>
@endsection
@section('body')
    <div class="container mt-3">
        <form action="{{ route('payment.process',['locale' => session('locale')]) }}" method="POST">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="999"
                data-name="My Shop"
                data-description="Payment"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
        </form>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
