@extends('layouts.layout_front')

@section('style')
<style>
    .slick-carousel img {
        padding: 8px;
        transition: transform 0.3s ease-out;
    }
    
    .slick-carousel img:hover {
        transform: scale(1.1);
    }
</style>
@endsection

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
        <div class="d-flex">
            <x-about-component></x-about-component>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    {{-- <section id="work" class="portfolio-mf sect-pt4 route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Storie
                        </h3>
                        <p class="subtitle-a">
                            {!! $text->storie_title !!}
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div style=" display: flex; justify-content: space-evenly;">
                        @foreach ($stories as $storie)
                            <div class="">
                                <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $storie->id }}">
                                    <img src="{{asset('storage/media').'/'.$storie->collectionStorie[0]->mediable->name}}" class="one-storie img-fluid rounded-circle d-block text-center" alt="">
                                    <h3>{{ $storie->name }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Portfolio Section -->


    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog-mf sect-pt4 route mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Galleries
                        </h3>
                        <p class="subtitle-a">
                            {!! $text->gallerie_title !!}
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($mediaHomes as $gallerie)
                    <div class="col-md-3 img-block">
                        <div class="work-box">
                            @if ($gallerie->media->active)
                                <a href="{{ asset('storage/media') . '/' . $gallerie->media->name }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                    <div class="work-img">
                                        @if ($gallerie->media->type == 'video')
                                            <video controls src="{{ asset('storage/media') . '/' . $gallerie->media->name }}" alt="" class="img-fluid gall-img"></video>
                                        @else
                                            <img src="{{ asset('storage/media') . '/' . $gallerie->media->name }}" alt=""  class="img-fluid gall-img">
                                        @endif
                                    </div>
                                </a>
                            @else
                                <a href="assets/img/cadena.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                    <div class="work-img">
                                        {{-- @if ($gallerie->media->type == 'video')
                                            <video src="{{ asset('storage/media') . '/' . $gallerie->media->name }}" alt="" class="img-fluid"></video>
                                        @else --}}
                                            <img src="assets/img/cadena.png" alt=""  class="img-fluid gall-img">
                                        {{-- @endif --}}
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- @foreach ($mediaHomes as $gallerie)
                    <div class="col-md-3 img-block">
                        <div class="work-box">
                            <a href="assets/img/work-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox">
                            <div class="work-img">
                                @if ($gallerie->media->type == 'video')
                                    <video src="{{ asset('storage/media') . '/' . $gallerie->media->name }}" alt="" style="
                                    height: 230px;
                                " class="img-fluid"></video>
                                @else
                                    <img src="{{ asset('storage/media') . '/' . $gallerie->media->name }}" alt="" style="
                                    height: 230px;
                                " class="img-fluid">
                                @endif
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach --}}
                {{-- @foreach ($mediaHomes as $gallerie)
                    <div class="col-md-3 img-block">
                        <x-one-gallery-component 
                            enctype="{{ $gallerie->media->enctype }}" id="{{ $gallerie->media->id }}"
                            type="{{ $gallerie->media->type }}"
                            file="{{ asset('storage/media') . '/' . $gallerie->media->name }}" 
                            :description="'descript 1 '"
                            active="{{ $gallerie->media->active }}"
                            >
                        </x-one-gallery-component>
                    </div>
                @endforeach --}}
                
            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- ======= ChatSection ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        Chat
                    </h3>
                    <p class="subtitle-a">
                        {!! $text->chat_title !!}
                    </p>
                    <div class="line-mf"></div>
                </div>
            </div>
            <div class="row gy-4">
                {{-- <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="data:image/jpeg;base64,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"
                                    alt="" srcset="">
                            </div>
                            <div class="swiper-slide">
                                <img src="data:image/jpeg;base64,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"
                                    alt="" srcset="">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRs4MkFCer6K2cc87iYWESj_mypook_d-ycMvfEUN5LDerBTd2eGqarJB18g4M_ymWfX2g&usqp=CAU"
                                    alt="" srcset="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div> --}}

                <div class="col-lg-12">
                    <div class="portfolio-description text-center">
                        <h2>Discussion chat direct</h2>
                        <p>
                            <a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}">
                                <p><button class="btn btn-danger"> Abonnee</button></p>
                            </a>
                        </p>
                        <p>
                            {!! $text->chat_description !!}
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chat Section -->

    <!-- ======= Live Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        Live
                    </h3>
                    <p class="subtitle-a">
                        {!! $text->live_title !!}
                    </p>
                    <div class="line-mf"></div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-description text-center">
                        <h2>Regarder de live en direct</h2>
                        <p>
                            {!! $text->live1_description !!}
                        </p>
                        <br>
                        <p>
                            <a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}">
                                <p><button class="btn btn-danger"> Abonnee</button></p>
                            </a>
                        </p>
                        <p>
                            {!! $text->live2_description !!}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="data:image/jpeg;base64,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"
                                    alt="" srcset="">
                                {{-- <img src="assets/img/portfolio-details-1.jpg" alt=""> --}}
                            </div>

                            <div class="swiper-slide">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR14eMlWSFHx9OP585_Um5v8cb27IgBolH14w&usqp=CAU"
                                    alt="" srcset="">
                            </div>
                            <div class="swiper-slide">
                                <img src="data:image/jpeg;base64,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"
                                    alt="" srcset="">
                                {{-- <img src="assets/img/portfolio-details-3.jpg" alt=""> --}}
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Live Section -->

    <!-- ======= Boutique Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        Boutique
                    </h3>
                    <p class="subtitle-a">
                        {!! $text->boutique_title !!}
                    </p>
                    <div class="line-mf"></div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="portfolio-description text-center">
                        <h2>Acceder au boutique</h2>
                        <p>
                            {!! $text->boutique1_description !!}
                        </p>
                        <br>

                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <div class="portfolio-details-slider">
                        <div class="swiper-wrapper align-items-center">
                            <div>
                                <img src="assets/img/portfolio-details-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <p>
                            <a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}">
                                <p><button class="btn btn-danger"> Abonnee</button></p>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-description text-center">
                        <h2>Meilleur gallerie</h2>
                        <p>
                            {!! $text->boutique2_description !!}
                        </p>
                        <br>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @foreach ($stories as $storie)
    <div class="modal fade modal-storie" id="exampleModal-{{ $storie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style=" color: black;">{{$storie->name}}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="" style="
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-evenly;
                        align-items: center;
                    ">
                            @foreach ($storie->collectionStorie as $collect)
                                {{-- <div><img src="{{asset('storage/media').'/'.$storie->collectionStorie[0]->mediable->name}}" style=" width: 200px; height: 200px; object-fit: cover;" class="img-fluid rounded-circle d-block" alt=""></div> --}}
                                <div>
                                    <img src="{{asset('storage/media').'/'.$collect->mediable->name}}" style=" width: 200px; height: 200px; object-fit: cover;margin:2px" class="img-fluid d-block text-center" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Boutique Section -->
@endsection