<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- Styles -->
    @yield('style')
    <style>
    .text-primary {
        font-weight: bold;
    }



    /*gallery*/
    #demo {
        height:100%;
        position:relative;
        overflow:hidden;
    }


    .green{
    background-color:#6fb936;
    }
    .thumb{
        margin-bottom: 30px;
    }
    
    .page-top{
        margin-top:85px;
    }

   
    img.zoom {
        width: 100%;
        height: 200px;
        border-radius:5px;
        object-fit:cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
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
        color:#000;
    }
    .modal-footer{
      display:none;  
    }
    </style>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <a class="navbar-brand" href="#">Only-fan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">

                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a class="btn btn-outline-success mr-3" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="btn btn-outline-success mr-3" href="{{ route('login') }}">login</a>

                            @if (Route::has('register'))
                                <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                        <select class="form-control mr-3">
                            <option>Français</option>
                            <option>English</option>
                          </select>
                    </div>
                @endif
              </form>
            </div>
          </nav>

        <div class="container">
            <div class="mb-5">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 150px;" alt="Avatar" />
            </div>



            <div class="mb-5">
                <div class="d-flex">
                    <div>
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 50px;" alt="Avatar" />
                    </div>
                    <div class="ml-5">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dignissimos officiis quis?</p>
                        <p><b>Lorem ipsum dolor sit amet.</b></p>
                    </div>
                </div>
            </div>

            <div class="container page-top">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"  class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid"  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/62307/air-bubbles-diving-underwater-blow-62307.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"  class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/38238/maldives-ile-beach-sun-38238.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid"  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/158827/field-corn-air-frisch-158827.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/302804/pexels-photo-302804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="fancybox" rel="ligthbox">
                            <img  src="https://images.pexels.com/photos/1038002/pexels-photo-1038002.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="zoom img-fluid "  alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-5 p-5 mb-5" style="background-color: #E0E0E0;">
                <div class="row text-center">
                    <div class="col-sm-4">
                        <h1 class="text-primary">Photos</h1>
                        <h2 class="display-4 text-primary">100</h2>
                    </div>
                    <div class="col-sm-4">
                        <h1 class="text-primary">Vidéos</h1>
                        <h2 class="display-4 text-primary">50</h2>
                    </div>
                    <div class="col-sm-4">
                        <h1 class="text-primary">Galeries</h1>
                        <h2 class="display-4 text-primary">25</h2>
                    </div>
                </div>
            </div>


            <div class="mb-5">
                <div class="row">
                <div class="col-md-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae
                        . Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, 
                        felis enim ornare nisi, vitae mattis nulla ante id dui.
                    </p>
                    <br><br><br>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nesciunt aut debitis consequatur quia voluptate rerum sunt
                         rem eum corporis delectus molestiae maxime necessitatibus dolore tempore. Autem placeat neque molestiae voluptatibus, 
                         laboriosam corrupti rerum cupiditate id recusandae iure ratione, ea eum vero magni tenetur deserunt commodi.
                          Reiciendis voluptates repudiandae atque consequatur necessitatibus dolorum, facere laborum! Voluptates architecto 
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="https://images.pexels.com/photos/414645/pexels-photo-414645.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid" alt="Image Description">
                </div>
                </div>
            </div>
              
        </div>
        <footer class="bg-light py-3">
            <div class="container">
                <p class="text-center">&copy; 2023 - Only Fan</p>
                <p class="text-center">Tous droits réservés</p>
                <div class="d-flex justify-content-center">
                <a class="nav-link" href="#">Accueil</a>
                <a class="nav-link" href="#">À propos</a>
                <a class="nav-link" href="#">Services</a>
                <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </footer>

        @yield('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".fancybox").fancybox({
                        openEffect: "none",
                        closeEffect: "none"
                    });
                    
                    $(".zoom").hover(function(){
                        
                        $(this).addClass('transition');
                    }, function(){
                        
                        $(this).removeClass('transition');
                    });
                });
        </script>
    </body>
</html>
