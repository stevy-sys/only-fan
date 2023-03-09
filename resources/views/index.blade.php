@extends('layouts.layout_front')


@section('content')
    <!-- ======= About Section ======= -->
    {{-- <section id="about" class="about-mf sect-pt4 route">
      <div class="container">
      <div class="row">
          <div class="col-sm-12">
          <div class="box-shadow-full">
              <x-about-component></x-about-component>
          </div>
          </div>
      </div>
      </div>
  </section> --}}
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
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-1.jpg'"></x-one-storie-component>
          </div>
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-2.jpg'"></x-one-storie-component>
          </div>
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-3.jpg'"></x-one-storie-component>
          </div>
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-4.jpg'"></x-one-storie-component>
          </div>
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-5.jpg'"></x-one-storie-component>
          </div>
          <div class="col-md-4">
              <x-one-storie-component :image="'assets/img/work-6.jpg'"></x-one-storie-component>
          </div>
  
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
          <div class="col-md-4">
              <x-one-gallery-component :image="'assets/img/post-1.jpg'" :description="'descript 1 '"></x-one-gallery-component>
          </div>
          <div class="col-md-4">
              <x-one-gallery-component :image="'assets/img/post-2.jpg'" :description="'descript 2 '"></x-one-gallery-component>
              
          </div>
          <div class="col-md-4">
              <x-one-gallery-component :image="'assets/img/post-3.jpg'" :description="'descript 3'"></x-one-gallery-component>
          </div>
          </div>
      </div>
      </section>
  <!-- End Blog Section -->

@endsection