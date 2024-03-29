<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $config->app_name }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link sizes="196x196" href="/assets/img/logo.png" rel="icon" type="image/png">
    <link href="/assets/img/logo.png" rel="apple-touch-icon" sizes="64x64">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


    @yield('style')
    {{-- style dynamique --}}
    @include('partials._style')

    <!-- =======================================================
  * Template Name: DevFolio - v4.10.0
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('partials._new_menu')
    <!-- ======= Testimonials Section ======= -->
    {{-- <div class="testimonials paralax-mf bg-image" style="background-image: url(assets/img/couverture.png) ; padding: 10rem 0;"> --}}
    {{-- <div class="overlay-mf"></div> --}}

    @if (Illuminate\Support\Facades\Route::currentRouteName() == 'accueil')
        <div class="row">
            <div class="col-md-12">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper couverture-swipper">
                        @if ($couverturesHome->count() > 0)
                            @foreach ($couverturesHome as $couverture)
                                <div class="swiper-slide">
                                    <div class="testimonial-box">
                                        <div class="author-test">
                                            <img src="{{ asset('').'storage/media/' . $couverture->media->name }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <div class="testimonial-box">
                                    <div class="author-test">
                                        <img src="/assets/img/couverture.png" alt="">
                                </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    @endif
    {{-- </div> --}}
    <!-- End Testimonials Section -->

    <main class="container mt-5" id="main" style="margin-top: 140px !important;">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>

            @if (!isset($currentRoute))
                @if (!auth()->check())
                    <div class="col-lg-12">
                        <!-- ======= Services Section ======= -->
                        <section id="services" class="services-mf pt-5 route">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box text-center">
                                            <h3 class="title-a">
                                                {{__('messages.Abonnement')}}
                                            </h3>
                                            <p class="subtitle-a">
                                                {!! $text->abonnee_title !!}
                                            </p>
                                            <div class="line-mf"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($subscriptions as $subscription)
                                        <div class="col-md-4">
                                            <x-card-payment-component icon="bi bi-cart-plus" id="{{ $subscription->id }}"
                                                devise="{{ $subscription->devise }}"
                                                description="{{ $subscription->name }}"
                                                amount="{{ $subscription->amount }}"></x-card-payment-component>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                        <!-- End Services Section -->

                        <!-- ======= Counter Section ======= -->
                        <div class="section-counter paralax-mf bg-image mb-5">
                            <div class="overlay-mf"
                                style="
                        background-color: black;
                    ">
                    </div>
                            <div class="container position-relative">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <x-counter-component counter="{{ $countImage }}" type="image">
                                        </x-counter-component>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <x-counter-component type="video" counter="{{ $countVideo }}">
                                        </x-counter-component>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Counter Section -->
                    </div>
                @else
                    @if (!auth()->user()->premium)
                        <div class="col-lg-12">
                        <!-- ======= Services Section ======= -->
                        <section id="services" class="services-mf pt-5 route">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box text-center">
                                            <h3 class="title-a">
                                                {{__('messages.Abonnement')}}
                                            </h3>
                                            <p class="subtitle-a">
                                                {!! $text->abonnee_title !!}
                                            </p>
                                            <div class="line-mf"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($subscriptions as $subscription)
                                        <div class="col-md-4">
                                            <x-card-payment-component icon="bi bi-cart-plus" id="{{ $subscription->id }}"
                                                devise="{{ $subscription->devise }}"
                                                description="{{ $subscription->name }}"
                                                amount="{{ $subscription->amount }}"></x-card-payment-component>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                        <!-- End Services Section -->

                        <!-- ======= Counter Section ======= -->
                        <div class="section-counter paralax-mf bg-image mb-5">
                            <div class="overlay-mf"
                                style="
                        background-color: black;
                    ">
                    </div>
                            <div class="container position-relative">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <x-counter-component counter="{{ $countImage }}" type="image">
                                        </x-counter-component>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <x-counter-component type="video" counter="{{ $countVideo }}">
                                        </x-counter-component>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Counter Section -->
                    </div>
                    @endif
                @endif
            @else
                <div class="col-lg-12 mt-5">
                    <div class="section-counter paralax-mf bg-image mb-5">
                        <div class="overlay-mf" style="
              background-color: black;
          "></div>
                        <div class="container position-relative">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <x-counter-component :counter="50" :type="'image'"></x-counter-component>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <x-counter-component :type="'video'" :counter="150"></x-counter-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>


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

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer style="
    width: 103% !important;
    margin-top:50px;
">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-5">
                    <h1 class="follow-me"> {{__('messages.TROUVER_NOUS_SUR')}} </h1>
                    <div class="reseau-socio">
                        @foreach ( $reseauSocios as $reseau )
                            <a target="_blank" href="{{$reseau->lien}}" class="icon-reseau" > {!! $reseau->icon !!} </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; Copyright <strong>rubycorp</strong>. All Rights Reserved</p>
                        <div class="credits">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src=" {{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#chat-icon").click(function() {
                $("#chat-bubble").toggle();
            });
            $("#close-chat").click(function() {
                $("#chat-bubble").hide();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#logout').click(function(e) {
                e.preventDefault();
                $.post("{{ route('logout', ['locale' => session('locale')]) }}", function(data) {
                    window.location.href = "/";
                });
            });
        });
    </script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    </script>
    <script defer type="text/javascript">
        $(document).ready(function() {
            $('.slick-carousel-2').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                centerMode: true,

                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                            centerPadding: '10%'
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerPadding: '20%'
                        }
                    }
                ]
            });

            $('.slick-carousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: '20%',
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            centerPadding: '10%'
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerPadding: '20%'
                        }
                    }
                ]
            });
        });
    </script>
    @yield('scripts')

</body>

</html>
