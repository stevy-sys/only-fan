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
                            {{__('messages.Galleries')}}
                        </h3>
                        <p class="subtitle-a">
                            {!! $text->gallerie_title !!}
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @if ($premium == true)
                    @foreach ($medias as $media)
                        <div class="col-md-3 img-block">
                            <div class="work-box">
                                <a href="{{ asset('storage/media') . '/' . $media->name }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox">
                                    <div class="work-img">
                                        @if ($media->type == 'video')
                                            <video controls src="{{ asset('storage/media') . '/' . $media->name }}"
                                                alt="" class="img-fluid gall-img"></video>
                                        @else
                                            <img src="{{ asset('storage/media') . '/' . $media->name }}" alt=""
                                                class="img-fluid gall-img">
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($mediaHomes as $gallerie)
                        <div class="col-md-3 img-block">
                            <div class="work-box">
                                @if ($gallerie->media->blur == false)
                                    <a href="{{ asset('storage/media') . '/' . $gallerie->media->name }}"
                                        data-gallery="portfolioGallery"
                                        class="portfolio-lightbox {{ $gallerie->media->blur == false ? '' : 'blurred-image' }}">
                                        <div class="work-img">
                                            @if ($gallerie->media->type == 'video')
                                                <video {{ $gallerie->media->blur ? 'controls' : '' }}
                                                    src="{{ asset('storage/media') . '/' . $gallerie->media->name }}"
                                                    alt=""
                                                    class="{{ $gallerie->media->blur == false ? '' : 'blurred-image' }} img-fluid gall-img"></video>
                                            @else
                                                <img src="{{ asset('storage/media') . '/' . $gallerie->media->name }}"
                                                    alt=""
                                                    class=" {{ $gallerie->media->blur == false ? '' : 'blurred-image' }} img-fluid gall-img">
                                            @endif
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}"
                                        class="">
                                        <div class="work-img premium">
                                            <img src="/assets/img/cadena.png" alt=""
                                                class="img-fluid gall-img cadena-lock">
                                            @if ($gallerie->media->type == 'video')
                                                <video {{ $gallerie->media->blur ? 'controls' : '' }}
                                                    src="{{ asset('storage/media') . '/' . $gallerie->media->name }}"
                                                    alt=""
                                                    class="{{ $gallerie->media->blur == false ? '' : 'blurred-image' }} img-fluid gall-img"></video>
                                            @else
                                                <img src="{{ asset('storage/media') . '/' . $gallerie->media->name }}"
                                                    alt=""
                                                    class=" {{ $gallerie->media->blur == false ? '' : 'blurred-image' }} img-fluid gall-img">
                                            @endif
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
@endsection

@section('script')
@endsection
