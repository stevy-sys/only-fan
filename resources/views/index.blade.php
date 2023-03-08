<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DevFolio Bootstrap Portfolio Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: DevFolio - v4.10.0
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Aphrodite</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#work">Work</a></li>
          <li><a class="nav-link scrollto " href="#blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
          <li class="dropdown"><a href="#"><span>Stevy</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Abonnee</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Gallery</a></li>
              <li><a href="#">Chat</a></li>
              <li><a href="#">Live</a></li>
              <li><a href="#">Deconnexion</a></li>
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Testimonials Section ======= -->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-box">
                  <div class="author-test">
                    <img src="assets/img/testimonial-2.jpg" alt="" class="rounded-circle b-shadow-a">
                    <span class="author">Xavi Alonso</span>
                  </div>
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
                  <div class="author-test">
                    <img src="assets/img/testimonial-4.jpg" alt="" class="rounded-circle b-shadow-a">
                    <span class="author">Marta Socrate</span>
                  </div>
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

  <!-- ======= Hero Section ======= -->
  {{-- <div id="hero" class="hero route bg-image" style="background-image: url(assets/img/hero-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="hero-title mb-4">I am Morgan Freeman</h1>
          <p class="hero-subtitle"><span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div> --}}
  <!-- End Hero Section -->

  <main class="container" id="main">
    <div class="row">
        <div class="col-lg-8">
            <!-- ======= About Section ======= -->
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
        
            
        </div>
        <div class="col-lg-4">
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
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        </p>
                        <div class="line-mf"></div>
                    </div>
                    </div>
                </div>
                <div class="col">
                        <div class="row-md-4">
                            <x-card-payment-component :icon="'bi bi-briefcase'" :description="'blabla 1'"></x-card-payment-component>
                        </div>
                        <div class="row-md-4">
                            <x-card-payment-component :icon="'bi bi-card-checklist'" :description="'blabla 2'"></x-card-payment-component>
                        </div>
                        <div class="row-md-4">
                            <x-card-payment-component :icon="'bi bi-bar-chart'" :description="'blabla 3'"></x-card-payment-component>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Services Section -->

            <!-- ======= Counter Section ======= -->
                <div class="section-counter paralax-mf bg-image mb-5" style="background-image: url(assets/img/counters-bg.jpg)">
                    <div class="overlay-mf"></div>
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
            <!-- End Counter Section -->
        </div>
    </div>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>