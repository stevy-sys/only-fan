@extends('layouts.layout')

@section('sub_title')
    Boutique
@endsection

@section('body')
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            @foreach ($products as $product)
                <div class="card m-3" style="width: 18rem">
                    <img src="{{$product->media}}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>{{ __('messages.prix') }}: {{ $product->price }}</strong></p>
                        <a href="{{route('boutique.add',['product' => $product->id])}}" class="btn {{ $product->in_cart ? 'btn-danger' : 'btn-primary'}} ">
                            @if ($product->in_cart)
                                {{ __('messages.enlever_dans_panier') }}
                            @else
                                {{ __('messages.ajouter_dans_panier') }}
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection