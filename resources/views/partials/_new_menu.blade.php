<!-- ======= Header ======= -->
<header id="header" class="">
    {{-- <header id="header" class="fixed-top" > --}}
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo">
            <img src="/assets/img/logo.png" alt="" class="img-fluid">
            <a class="apps-name" href="{{ route('accueil', ['locale' => session('locale')]) }}">{{ $config->app_name }}
            </a>
        </h1>
        {{-- Uncomment below if you prefer to use an image logo  --}}
        {{-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> --}}

        <div class="col">
            <div style="margin-top: 23px;margin-left: 0px;display: flex;justify-content: center;align-items: center;">
                @foreach ($stories as $storie)
                    <div class="mx-1">
                        <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $storie->id }}">
                            <img src="{{ asset('storage/media') . '/' . $storie->collectionStorie[0]->mediable->name }}"
                                class="one-storie img-fluid rounded-circle d-block text-center" alt="">
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
                            <a style="color:black" class="nav-link scrollto"
                                href="{{ route('live.consumer', ['locale' => session('locale'), 'streamId' => '212acde2']) }}">
                                {{__('messages.live_disponible')}}
                            </a>
                        </li>
                    @endif
                    @if (auth()->check())
                        @if (auth()->user()->role == 'admin')
                            <li>
                                <a class="nav-link scrollto" href="{{ route('customer.dashboard') }}">
                                    {{__('messages.Dashboard')}}
                                </a>
                            </li>
                        @endif
                    @endif

                    <li>
                        {{-- <i class="bi bi-house"></i> --}}
                        <a class="nav-link scrollto" href="{{ route('home', ['locale' => session('locale')]) }}">
                            {{__('messages.Accueil')}}
                        </a>
                    </li>

                    <li class="dropdown"><a href="#"><span>{{__('messages.Boutique')}}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('boutique', ['locale' => session('locale')]) }}"><i
                                        class="bi bi-shop-window"></i>{{__('messages.Produit')}}</a></li>
                    </li>
                    <li><a href="{{ route('boutique.getDetailPaiment') }}"><i class="bi bi-basket"></i>{{__('messages.Panier')}}</a></li>
                </ul>
                </li>

                <li class="dropdown"></i><a href="#"><span>{{ auth()->guard('web')->user()->name }}</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (auth()->user()->role != 'admin')
                            {{-- <li><a href="{{ route('home', ['locale' => session('locale')]) }}"><i
                                        class="bi bi-credit-card"></i>Dashboard</a></li> --}}
                            <li><a href="{{ route('subscribe.index', ['locale' => session('locale')]) }}"><i
                                        class="bi bi-credit-card"></i>{{__('messages.Abonnement')}}</a></li>
                            <li><a href="{{ route('gallery.index', ['locale' => session('locale')]) }}"><i
                                        class="bi bi-images"></i>{{__('messages.Galleries')}}</a></li>
                            <li><a href="{{ route('chat.index', ['locale' => session('locale')]) }}"><i
                                        class="bi bi-chat-left"></i>{{__('messages.Chat')}}</a></li>
                            <li><a href="#"><i class="bi bi-camera"></i>{{__('messages.Live')}}</a></li>
                        @endif
                        <li id="logout"><a href="#"><i class="bi bi-box-arrow-in-right"></i>{{__('messages.Deconnexion')}}</a></li>
                    </ul>
                </li>
            @else
                <li>
                    {{-- <i class="bi bi-house"></i> --}}
                    <a class="nav-link scrollto" href="{{ route('login', ['locale' => session('locale')]) }}">
                        {{__('messages.Connexion')}}
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span>{{ __('messages.langue') }}</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="{{ route('language') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="fr">
                            <a href="javascript:void(0);" onclick="this.parentNode.submit()"
                                class="dropdown-item">Français</a>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('language') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="en">
                            <a href="javascript:void(0);" onclick="this.parentNode.submit()"
                                class="dropdown-item">English</a>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('language') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="es">
                            <a href="javascript:void(0);" onclick="this.parentNode.submit()"
                                class="dropdown-item">Español</a>
                        </form>
                    </li>
                </ul>
            </li>

            @auth
                <li>
                    <a href="#" data-toggle="modal" data-target="#exampleModal-wallet"class="">
                        <img class="ruby-icon" src="{{ asset('assets/img/ruby.png') }}" alt="" srcset="">
                        {{-- <i class="bi bi-plus"></i> --}}
                        {{ number_format(auth()->user()->wallet, 2, ',', '.') }} {{ $config->unite_point }}
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

<div class="modal fade wallet-modal" id="exampleModal-wallet" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel" style=" color: black;">{{__('messages.Acheter_des_point')}}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="text-center" class="modal-body">
                <div class="p-5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, nihil.</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores laudantium vitae ea cupiditate
                        rem sequi nulla ipsam! Facere, libero sunt!</p>
                </div>
                <div class="p-5 price-wallet">
                    <div class="">
                        <img class=""style=" width: 90px;" src="{{ asset('assets/img/ruby.png') }}"
                            alt="" srcset="">
                    </div>
                    <div> <button class="btn btn-success"> <a
                                href="{{ route('wallet.index', ['locale' => session('locale')]) }}">{{__('messages.Acheter_des_points')}}
                            </a></button></div>
                </div>
            </div>
        </div>
    </div>
</div>
