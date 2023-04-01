<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$config->app_name}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link sizes="196x196" href="assets/img/logo.png" rel="icon" type="image/png">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  
      
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
  <div class="testimonials paralax-mf bg-image" style="background-image: url(assets/img/couverture.png) ; padding: 10rem 0;">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-box">
                  {{-- <div class="author-test">
                    <img src="assets/img/testimonial-2.jpg" alt="" class="rounded-circle b-shadow-a">
                    <span class="author">Xavi Alonso</span>
                  </div> --}}
                  <div class="content-test">
                    <p class="description lead">
                      Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit.
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-box">
                  {{-- <div class="author-test">
                    <img src="assets/img/testimonial-4.jpg" alt="" class="rounded-circle b-shadow-a">
                    <span class="author">Marta Socrate</span>
                  </div> --}}
                  <div class="content-test">
                    <p class="description lead">
                      Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit.
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>

          <!-- <div id="testimonial-mf" class="owl-carousel owl-theme">
        
      </div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials Section -->

  <main class="container" id="main">
    <div class="row">
        <div class="col-lg-12">

            @yield('content')

            {{-- <!-- ======= About Section ======= -->
            <section id="about" class="about-mf sect-pt4 route">
                <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="box-shadow-full">
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
         --}}
            
        </div>
        
        @if (!isset($currentRoute))
          <div class="col-lg-12">
              <!-- ======= Services Section ======= -->
              <section id="services" class="services-mf pt-5 route">
                  <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                      <div class="title-box text-center">
                          <h3 class="title-a">
                          Abonnee
                          </h3>
                          <p class="subtitle-a">
                          {{$text->abonnee_title}}
                          </p>
                          <div class="line-mf"></div>
                      </div>
                      </div>
                  </div>
                  <div class="row">
                    @foreach ($subscriptions as $subscription)
                      <div class="col-md-4">
                          <x-card-payment-component icon="bi bi-cart-plus" id="{{$subscription->id}}" devise="{{$subscription->devise}}" description="{{$subscription->name}}" amount="{{$subscription->amount}}"></x-card-payment-component>
                      </div>
                    @endforeach
                    
                      </div>
                  </div>
              </section>
              <!-- End Services Section -->
              
              <!-- ======= Counter Section ======= -->
                <div class="section-counter paralax-mf bg-image mb-5">
                      <div class="overlay-mf" style="
                      background-color: black;
                  "></div>
                      <div class="container position-relative">
                      <div class="row">
                          <div class="col-sm-12 col-lg-6">
                          <x-counter-component counter="{{$countImage}}" type="image"></x-counter-component>
                          
                          </div>
                          <div class="col-sm-12 col-lg-6">
                          <x-counter-component type="video" counter="{{$countVideo}}" ></x-counter-component>
                          </div>
                          
                      </div>
                      </div>
                  </div>
              <!-- End Counter Section -->
          </div>
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
                  <x-counter-component :type="'video'" :counter="150" ></x-counter-component>
                  </div>
              </div>
              </div>
            </div>
        </div>
        @endif
    </div>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>rubycorp</strong>. All Rights Reserved</p>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            -->
              {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src=" {{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
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
                $.post("{{ route('logout',['locale' => session('locale')]) }}", function(data) {
                    window.location.href = "/";
                });
            });
        });
    </script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
      
</body>

</html>