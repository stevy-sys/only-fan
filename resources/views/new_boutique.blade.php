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
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-1.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-1.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-1.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-1.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-1.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-2.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-3.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-4.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-5.jpg'"></x-one-product-component>
        </div>
        <div class="col-md-4">
            <x-one-product-component :image="'assets/img/work-6.jpg'"></x-one-product-component>
        </div>

        </div>
    </div>
    </section>
<!-- End Portfolio Section -->
@endsection