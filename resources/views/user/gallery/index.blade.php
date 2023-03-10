@extends('layouts.layout_front')

@section('sub_title')
    Gallery
@endsection

@section('content')
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
            <x-one-gallery-component image="{{asset('assets/img/post-1.jpg')}}" :description="'descript 1'"></x-one-gallery-component>
        </div>
        <div class="col-md-4">
            <x-one-gallery-component image="{{asset('assets/img/post-2.jpg')}}" :description="'descript 2 '"></x-one-gallery-component>
        </div>
        <div class="col-md-4">
            <x-one-gallery-component image="{{asset('assets/img/post-3.jpg')}}" :description="'descript 3'"></x-one-gallery-component>
        </div>
        <div class="col-md-4">
            <x-one-gallery-component image="{{asset('assets/img/post-3.jpg')}}" :description="'descript 3'"></x-one-gallery-component>
        </div>
        <div class="col-md-4">
            <x-one-gallery-component image="{{asset('assets/img/post-3.jpg')}}" :description="'descript 3'"></x-one-gallery-component>
        </div>
        <div class="col-md-4">
            <x-one-gallery-component image="{{asset('assets/img/post-3.jpg')}}" :description="'descript 3'"></x-one-gallery-component>
        </div>
        </div>
    </div>
    </section>
<!-- End Blog Section -->
@endsection

@section('script')

@endsection