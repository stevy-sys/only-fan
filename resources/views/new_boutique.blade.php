@extends('layouts.layout_front')


@section('content')
      <!-- ======= Portfolio Section ======= -->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="title-box text-center">
            <h3 class="title-a">
                Nos produit
            </h3>
            <p class="subtitle-a">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
            </div>
        </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <x-one-product-component inCart="{{$product->in_cart}}" nameproduct="{{$product->name}}" id="{{$product->id}}" image="{{asset('storage/media/'.$product->media)}}"></x-one-product-component>
                </div>
            @endforeach
 
        </div>
    </div>
    </section>
<!-- End Portfolio Section -->
@endsection