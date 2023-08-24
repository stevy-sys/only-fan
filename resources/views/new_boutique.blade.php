@extends('layouts.layout_front')


@section('content')
      <!-- ======= Portfolio Section ======= -->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="title-box text-center">
            <h3 class="title-a">
                {{__('messages.Nos_produit')}}
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
                    <div class="card card-blog" style="height: 90%;">
                      <div class="card-img">
                        <a href="#"><img src="{{asset('storage/media/'.$product->media)}}" alt="" class="img-fluid img-product" ></a>
                      </div>
                      <div class="card-body">
                        <div class="card-category-box">
                          <div class="card-category">
                            <h6 class="category">{{$product->price}} €</h6>
                          </div>
                        </div>
                        <h3 class="card-title"><a href="#">{{$product->name}}</a></h3>
                        <p class="card-description">
                        {{-- @if (strlen($product->description) > 25 )
                            {{substr($product->description, 0, 25)}}
                            <a href="#">...</a>
                        @else --}}
                         {{ $product->description }}
                        {{-- @endif --}}
                        </p>
                      </div>
                      <div class="card-footer">
                        <div class="post-author">
                            @if ($product->inCart)
                            <button class="btn btn-danger"> <a href="{{route('boutique.add',['product' => $product->id])}}">
                              {{ __('messages.enlever') }}
                            </a> </button>
                          @else
                          <button class="btn btn-success"> <a href="{{route('boutique.add',['product' => $product->id])}}">
                            {{ __('messages.ajouter') }}
                          </a> </button>
                          @endif
                        </div>
                        <div class="post-date">
                          {{-- <span class="bi bi-plus"></span> {{$product->wallet}} --}}
                          <img class="ruby-icon" src="{{asset('assets/img/ruby.png')}}" alt="" srcset="">
                          ( - {{$product->wallet}} token)
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
 
        </div>
    </div>
    </section>
<!-- End Portfolio Section -->
@endsection