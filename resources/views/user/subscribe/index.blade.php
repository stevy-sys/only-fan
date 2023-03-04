@extends('layouts.layout')

@section('sub_title')
    Souscription
@endsection

@section('style')
    <style>

    </style>
@endsection
@section('body')
    <div class="container mt-3">
        <div class="card-deck">
            @foreach ($subscribes as $subscribe)
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Image de l'article 1">
                    <div class="card-body">
                        <h5 class="card-title">Article 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tellus a
                            ipsum malesuada, a blandit leo condimentum. </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lorem ipsum dolor sit amet</li>
                            <li class="list-group-item">Consectetur adipiscing elit</li>
                            <li class="list-group-item">Nunc pellentesque tellus</li>
                        </ul>
                        <p class="card-text">
                            <small class="text-muted">
                                {{-- <i class="fas fa-euro-sign"></i> --}}
                                {{$subscribe->name }} : {{ $subscribe->amount }} {{ $subscribe->devise}}
                            </small>
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
                                    data-name="Only-fan"
                                    data-description="{{$subscribe->name}}"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto">
                                </script>
                            </form>
                        </div>
                        {{-- <a href="{{route('subscribe.payment.show', ['locale' => session('locale') , 'type' => 'subscribe1'])}}" class="btn btn-primary">Souscrire</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
