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

  <!-- ======= ChatSection ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="col-sm-12">
            <div class="title-box text-center">
            <h3 class="title-a">
                Chat
            </h3>
            <p class="subtitle-a">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
            </div>
        </div>
      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="assets/img/portfolio-details-1.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio-details-2.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio-details-3.jpg" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
            
          </div>
        </div>

        <div class="col-lg-4">
          {{-- <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: Web design</li>
              <li><strong>Client</strong>: ASU Company</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>
          </div> --}}
          <div class="portfolio-description">
            <h2>Discussion chat direct</h2>
            <p>
                <a href="{{route('subscribe.index',['locale' => session('locale')])}}"><p><button class="btn btn-danger"> Abonnee</button></p> </a>
              </p>
            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
            </p>
            <br>
            <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
              
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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
            </div>
            </div>
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-description">
                    <h2>Regarder de live en direct</h2>
                    <p>
                    Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                    <br>
                    <p>
                        <a href="{{route('subscribe.index',['locale' => session('locale')])}}"><p><button class="btn btn-danger"> Abonnee</button></p> </a>
                    </p>
                    <p>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                   
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                    <div class="swiper-slide">
                        <img src="assets/img/portfolio-details-1.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="assets/img/portfolio-details-2.jpg" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="assets/img/portfolio-details-3.jpg" alt="">
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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
            </div>
            </div>
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="portfolio-description">
                    <h2>Acceder au boutique</h2>
                    <p>
                    Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                    <br>
                    <p>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </p>
                    
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-details-slider">
                    <div class="swiper-wrapper align-items-center">
                    <div>
                        <img src="assets/img/portfolio-details-1.jpg" alt="">
                    </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <p>
                        <a href="{{route('subscribe.index',['locale' => session('locale')])}}"><p><button class="btn btn-danger"> Abonnee</button></p> </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-description">
                    <h2>Meilleur gallerie</h2>
                    <h5>
                        Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                    </h5>
                    <br>
                </div>
            </div>

        </div>

    </div>
  </section>
  <!-- End Boutique Section -->

@endsection