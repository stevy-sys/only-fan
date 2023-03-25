@extends('layouts.layout_front')


@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
      <div class="container">
      <div class="row">
          <div class="col-sm-12">
          <div class="">
              <x-about-component></x-about-component>
          </div>
          </div>
      </div>
      </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="work" class="portfolio-mf sect-pt4 route">
      <div class="container">
          <div class="row">
          <div class="col-sm-12">
              <div class="title-box text-center">
              <h3 class="title-a">
                  Storie
              </h3>
              <p class="subtitle-a">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              </p>
              <div class="line-mf"></div>
              </div>
          </div>
          </div>
          <div class="row">
            @foreach ($stories as $storie)
                <div class="col-md-2 col-lg-2" style="
                width: 12.666667%;
            ">
                    <x-one-storie-component image="{{asset('storage/media').'/'.$storie->media->name}}"></x-one-storie-component>
                </div>
            @endforeach
          </div>
      </div>
      </section>
  <!-- End Portfolio Section -->


  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog-mf sect-pt4 route">
      <div class="container">
          <div class="row">
          <div class="col-sm-12">
              <div class="title-box text-center">
              <h3 class="title-a">
                  Gallerie
              </h3>
              <p class="subtitle-a">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              </p>
              <div class="line-mf"></div>
              </div>
          </div>
          </div>
          <div class="row">
            @foreach ($mediaHomes as $gallerie)
                <div class="col-md-2">
                    <x-one-gallery-component enctype="{{$gallerie->media->enctype}}" id="{{$gallerie->media->id}}" type="{{$gallerie->media->type}}" file="{{asset('storage/media').'/'.$gallerie->media->name}}" :description="'descript 1 '"></x-one-gallery-component>
                </div>
            @endforeach
          </div>
      </div>
      </section>
  <!-- End Blog Section -->

@endsection