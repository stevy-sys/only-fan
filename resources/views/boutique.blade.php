@extends('layouts.layout')

@section('body')
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            @foreach ($products as $product)
                <div class="card m-3" style="width: 18rem">
                    <img src="{{$product->media}}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price: {{ $product->price }}</strong></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection