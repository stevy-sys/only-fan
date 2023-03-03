@extends('layouts.layout')

@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />
    <!-- Styles -->
    <style>
        .text-primary {
            font-weight: bold;
        }

        /*gallery*/
        #demo {
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .green {
            background-color: #6fb936;
        }

        .thumb {
            margin-bottom: 30px;
        }

        .page-top {
            margin-top: 85px;
        }

        img.zoom {
            width: 100%;
            height: 200px;
            border-radius: 5px;
            object-fit: cover;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
        }

        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            color: #000;
        }

        .modal-footer {
            display: none;
        }
    </style>
@endsection

@section('body')
    

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($couvertures as $couverture)
            @if ($loop->iteration == 1 )
                <div class="carousel-item active" data-bs-interval="2000">
            @else
                <div class="carousel-item" data-bs-interval="2000">
            @endif
                {{-- <div class="carousel-item {{  'active' : '' @endif }}" data-bs-interval="2000"> --}}
                    <img src="{{ asset('') . 'storage/media/' . $couverture->media->name }}" class="d-block w-125 h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5> {{ __('messages.bienvenue') }} </h5>
                        <p>{{$couverture->description}}</p>
                    </div> 
                </div>
            @endforeach
            {{-- <div class="carousel-item active" data-bs-interval="2000">
                <img src="https://via.placeholder.com/755x300" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> {{ __('messages.welcome') }} </h5>
                    <p>Some representative placeholder content for the first slide 1.</p>
                </div> 
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="https://via.placeholder.com/755x300" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide 2.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="https://via.placeholder.com/755x300" class="d-block h-100 w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide 3.</p>
                </div>
            </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-5">


        <div class="mb-5">
            <div class="d-flex">
                <div>
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 50px"
                        alt="Avatar" />
                </div>
                <div class="ml-5">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Commodi dignissimos officiis quis?
                    </p>
                    <p><b>Lorem ipsum dolor sit amet.</b></p>
                </div>
            </div>
        </div>

        <h3>Storie</h3>
        <div class="mb-5 d-flex">
            @foreach ($stories as $storie)
                @if ($storie->media->type == 'image')
                    <div class="p-5">
                        <img src="{{ asset('') . 'storage/media/' . $storie->media->name }}" 
                            style="width: 150px" alt="Avatar" />
                    </div>
                @else
                    <div class="p-5">
                        <video width="70" src="{{ asset('') . 'storage/media/' . $storie->media->name }}">

                        </video>
                    </div>
                @endif
            @endforeach
            {{-- <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        />
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        />
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        />
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        />
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        />
        <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            style="width: 150px"
            alt="Avatar"
        /> --}}
        </div>


        <h3>A la une</h3>
        <div class="container page-top">
            <div class="row">
                @foreach ($mediaHomes as $media)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="{{ asset('') . 'storage/media/' . $media->media->name }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('') . 'storage/media/' . $media->media->name }}" class="zoom img-fluid"
                                alt="" />
                        </a>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a
                    href="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    class="fancybox"
                    rel="ligthbox"
                >
                    <img
                        src="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        class="zoom img-fluid"
                        alt=""
                    />
                </a>
            </div> --}}
            </div>
        </div>

        <div class="mt-5 p-5 mb-5" style="background-color: #e0e0e0">
            <div class="row text-center">
                <div class="col-sm-6">
                    <h1 class="text-primary">Photos</h1>
                    <h2 class="display-4 text-primary">{{$countImage}}</h2>
                </div>
                <div class="col-sm-6">
                    <h1 class="text-primary">Vidéos</h1>
                    <h2 class="display-4 text-primary">{{$countVideo}}</h2>
                </div>
                {{-- <div class="col-sm-4">
                    <h1 class="text-primary">Galeries</h1>
                    <h2 class="display-4 text-primary">25</h2>
                </div> --}}
            </div>
        </div>

        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                        viverra euismod odio, gravida pellentesque urna varius vitae
                        . Sed dui lorem, adipiscing in adipiscing et, interdum nec
                        metus. Mauris ultricies, justo eu convallis placerat, felis
                        enim ornare nisi, vitae mattis nulla ante id dui.
                    </p>
                    <br /><br /><br />
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Atque, nesciunt aut debitis consequatur quia voluptate rerum
                        sunt rem eum corporis delectus molestiae maxime
                        necessitatibus dolore tempore. Autem placeat neque molestiae
                        voluptatibus, laboriosam corrupti rerum cupiditate id
                        recusandae iure ratione, ea eum vero magni tenetur deserunt
                        commodi. Reiciendis voluptates repudiandae atque consequatur
                        necessitatibus dolorum, facere laborum! Voluptates
                        architecto
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                        class="img-fluid" alt="Image Description" />
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none",
            });

            $(".zoom").hover(
                function() {
                    $(this).addClass("transition");
                },
                function() {
                    $(this).removeClass("transition");
                }
            );
        });
    </script>
@endsection
