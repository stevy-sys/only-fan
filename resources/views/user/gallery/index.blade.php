@extends('layouts.layout_front')

@section('style')
<style>
    .galle {
        width: 100% !important;
        height: 250px !important;
        object-fit: cover !important;
    }

</style>
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
            <div class="row mt-3">
                @foreach ($medias as $media)
                    <div class="col-md-3 img-block">
                        <div class="work-box">
                            <a href="{{ asset('storage/media') . '/' . $media->name }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                <div class="work-img">
                                    @if ($media->type == 'video')
                                        <video controls src="{{ asset('storage/media') . '/' . $media->name }}" alt="" class="img-fluid gall-img"></video>
                                    @else
                                        <img src="{{ asset('storage/media') . '/' . $media->name }}" alt=""  class="img-fluid gall-img">
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
@endsection

@section('script')
@endsection
