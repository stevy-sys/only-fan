<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aphrodite | 
        @yield('sub_title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
        integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <style>
        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            box-shadow: 2px 2px 5px #ccc;
            z-index: 9999;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .chat-bubble {
            position: fixed;
            bottom: 20px;
            width: 25%;
            right: 20px;
            background-color: #f5f5f5;
            border-radius: 20px;
            box-shadow: 2px 2px 5px #ccc;
            z-index: 9999;
            padding: 10px;
            display: none;
        }

        .chat-header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }

        .chat-body {
            padding: 10px;
            overflow-y: scroll;
            max-height: 300px;
        }

        .chat-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 20px;
        }

        .user {
            background-color: #d9edf7;
        }

        .system {
            background-color: #f0f0f0;
        }

        .chat-footer {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .form-control {
            flex-grow: 1;
            margin-right: 10px;
        }

        .send-icon {
            cursor: pointer;
        }
    </style>
    @yield('style')
    @vite('resources/js/app.js')
</head>

<body>
    {{-- <div id="app"> --}}
        <div id="chat-icon" class="chat-icon">
            <i class="fas fa-comments"></i>
        </div>
    
        <!-- HTML pour la bulle de chat -->
        <div id="chat-bubble" class="chat-bubble">
            <div class="chat-header">
                <div class="d-flex justify-content-between">
                    <h5>Assistant</h5>
                    <div id="close-chat" style="float: right; cursor: pointer;">&times;</div>
                </div>
            </div>
            <div class="chat-body">
                <div class="chat-message user">Bonjour, comment puis-je vous aider aujourd'hui?</div>
                <div class="chat-message system">Bonjour, j'aimerais savoir plus sur vos services.</div>
                <div class="chat-message user">Nous offrons des services de développement de logiciels, de conception de
                    sites web
                    et de marketing numérique. Comment puis-je vous aider en particulier?</div>
            </div>
            <div class="chat-footer">
                <input type="text" class="form-control" placeholder="Votre réponse">
                <i class="fas fa-paper-plane send-icon"></i>
            </div>
        </div>
    
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <a class="navbar-brand" href="{{ route('accueil') }}"> Aphrodite </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home', ['locale' => session('locale')]) }}">
                            <i class="far fa-image"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('chat.index', ['locale' => session('locale')]) }}">
                            <i class="fas fa-comment-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('live.index', ['locale' => session('locale')]) }}">
                            <i class="fas fa-video"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('gallery.index', ['locale' => session('locale')]) }}">
                            <i class="fa fa-images"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('subscribe.index', ['locale' => session('locale')]) }}">
                            <i class="fas fa-credit-card"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('boutique', ['locale' => session('locale')]) }}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('boutique.getDetailPaiment', ['locale' => session('locale')]) }}">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </li>
                    
                </ul> 
                <form class="form-inline my-2 my-lg-0">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a class="btn btn-outline-success mr-3"
                                    href="{{ route('home', ['locale' => session('locale')]) }}">Home</a>
                                <a class="btn btn-outline-danger mr-3" href="#" id="logout">Déconnexion</a>
                                <a href="{{ route('profile.index', ['locale' => session('locale')]) }}" type="button"
                                    class="btn btn-primary">
                                    <i class="fas fa-user-circle"></i> Profil
                                </a>
                            @else
                                <a class="btn btn-outline-success mr-3" href="{{ route('login', ['locale' => session('locale')]) }}">login</a>
    
                                @if (Route::has('register'))
                                    <a class="btn btn-outline-primary" href="{{ route('register', ['locale' => session('locale')]) }}">Register</a>
                                @endif
                            @endauth
                            {{-- <form method="post" action="{{ route('language') }}">
                @csrf
                <select name="locale" onchange="this.form.submit()" class="form-control mr-3">
                  <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }} >Français</option>
                  <option value="en" {{ app()->getLocale() == session('locale') ? 'selected' : '' }} >English</option>
                </select>
              </form> --}}
                        </div>
                    @endif
                </form>
            </div>
            <form class="ml-2" method="post" action="{{ route('language') }}">
                @csrf
                <select name="locale" onchange="this.form.submit()" class="form-control mr-3">
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Espagnol</option>
                </select>
            </form>
        </nav>
    
        @yield('body')
    
        <footer class="bg-light py-3">
            <div class="container">
                <p class="text-center">&copy; 2023 - Aphrodite</p>
                <p class="text-center">Tous droits réservés</p>
                <div class="d-flex justify-content-center">
                    <a class="nav-link" href="#">Accueil</a>
                    <a class="nav-link" href="#">À propos</a>
                    <a class="nav-link" href="#">Services</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </div>
        </footer>
    
        
    {{-- </div> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
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
    
    @yield('script')
</body>

</html>
