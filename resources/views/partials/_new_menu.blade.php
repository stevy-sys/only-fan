<!-- ======= Header ======= -->
<header id="header" class="" >
  {{-- <header id="header" class="fixed-top" > --}}
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <img src="assets/img/logo.png" alt="" class="img-fluid">
        <a class="apps-name" href="{{ route('accueil', ['locale' => session('locale')]) }}">{{$config->app_name}}
        </a>
      </h1>
      {{-- Uncomment below if you prefer to use an image logo  --}}
      {{-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> --}}

      <div class="col">
          <div style="margin-top: 23px;margin-left: 0px;display: flex;justify-content: center;align-items: center;">
              @foreach ($stories as $storie)
                  <div class="mx-1">
                      <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $storie->id }}">
                          <img src="{{asset('storage/media').'/'.$storie->collectionStorie[0]->mediable->name}}" class="one-storie img-fluid rounded-circle d-block text-center" alt="">
                          <h6>{{ $storie->name }}</h6>
                      </a>
                  </div>
              @endforeach
          </div>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          @auth
            @if ($liveDispo && $config->active_live)
              <li>
                <a style="color:black" class="nav-link scrollto" href="{{route('live.consumer', ['locale' => session('locale'), 'streamId' => '212acde2'])}}">
                  live disponible
                </a>
              </li>
            @endif
            @if (auth()->check())
              @if (auth()->user()->role == 'admin')
              <li>
                <a class="nav-link scrollto" href="{{route('customer.dashboard')}}">
                    Dashboard
                </a>
              </li>
              @endif
            @endif

          <li>
            {{-- <i class="bi bi-house"></i> --}}
            <a class="nav-link scrollto" href="{{ route('home', ['locale' => session('locale')]) }}">
                Home
            </a>
          </li>
          
          <li class="dropdown"><a href="#"><span>Boutique</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('boutique', ['locale' => session('locale')])}}"><i class="bi bi-shop-window"></i>Produit</a></li></li>
              <li><a href="{{route('boutique.getDetailPaiment')}}"><i class="bi bi-basket"></i>Panier</a></li>
            </ul>
          </li>
          
            <li class="dropdown"></i><a href="#"><span>{{auth()->guard('web')->user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                @if (auth()->user()->role != 'admin')
                  <li><a href="{{route('home', ['locale' => session('locale')])}}"><i class="bi bi-credit-card"></i>Dashboard</a></li>
                  <li><a href="{{route('subscribe.index', ['locale' => session('locale')])}}"><i class="bi bi-credit-card"></i>Abonnee</a></li>
                  <li><a href="{{route('gallery.index', ['locale' => session('locale')])}}"><i class="bi bi-images"></i>Gallery</a></li>
                  <li><a href="{{route('chat.index', ['locale' => session('locale')])}}"><i class="bi bi-chat-left"></i>Chat</a></li>
                  <li><a href="#"><i class="bi bi-camera"></i>Live</a></li>
                @endif
                <li id="logout"><a  href="#"><i class="bi bi-box-arrow-in-right"></i>Deconnexion</a></li>
              </ul>
            </li>
          @else
          <li>
            {{-- <i class="bi bi-house"></i> --}}
            <a class="nav-link scrollto" href="{{ route('login', ['locale' => session('locale')]) }}">
                Connexion
            </a>
          </li>
          {{-- <li>
            <i class="bi bi-house"></i>
            <a class="nav-link scrollto" href="{{ route('register', ['locale' => session('locale')]) }}">
                Inscription
            </a>
          </li> --}}
          @endauth
          
          <li class="dropdown">
            {{-- <i class="bi bi-translate"></i> --}}
            <a href="#">
              <span>Langue</span> 
              <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
              <li><a href="#">Francais</a></li></li>
              <li><a href="#">Anglais</a></li>
              <li><a href="#">Espagnol</a></li>
            </ul>
          </li>

          @auth
            <li>
              <a href="#" data-toggle="modal" data-target="#exampleModal-wallet"class="">
                <img class="ruby-icon" src="{{asset('assets/img/ruby.png')}}" alt="" srcset="">
                {{-- <i class="bi bi-plus"></i> --}}
                {{auth()->user()->wallet}} {{$config->unite_point}}
              </a>
            </li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  
  <!-- End Header -->

  <div class="modal fade wallet-modal" id="exampleModal-wallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel" style=" color: black;">Acheter point</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center" class="modal-body">
              <div class="p-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, nihil.</p>
                <p>Lorem ipsum dolor sit amet.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores laudantium vitae ea cupiditate rem sequi nulla ipsam! Facere, libero sunt!</p>
              </div>
              <div class="p-5 price-wallet">
                <div class="">
                  <img class=""style=" width: 90px;" src="{{asset('assets/img/ruby.png')}}" alt="" srcset="">  
                </div>
                <div> <button class="btn btn-success"> <a href="{{route('wallet.index', ['locale' => session('locale')])}}">Acheter des points </a></button></div>
              </div>
            </div>
        </div>
    </div>
</div>