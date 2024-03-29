<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
    style="
        overflow-y: auto;
        max-height: 400px;
    ">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Aphrodite Admin  </div>
    </a>
    <div style="color:white;" class="mx-3">({{auth()->user()->roles->name}})</div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    {{-- <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('customer.newdashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}

    <hr class="sidebar-divider">
    @foreach (test() as $menu)
        @if (count($menu->sub) > 0)
            <div class="sidebar-heading">
                {{$menu->name}}
            </div>
            @foreach ($menu->sub as $sub )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($sub->route) }}">
                        <i class="{{$sub->icon}}"></i>
                        <span>{{$sub->name}}</span></a>
                </li>
            @endforeach
            <hr class="sidebar-divider">
        @endif

    @endforeach
    {{-- <div class="sidebar-heading">
        Gestion utilisateur
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-users"></i>
            <span>Utilisateur</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.chat.index') }}">
            <i class="fab fa-rocketchat"></i>
            <span>Chat</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Parametrage du site
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.config.index')}}">
            <i class="fas fa-wrench"></i>
            <span>Parametre</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.config.texte')}}">
            <i class="fas fa-tools"></i>
            <span>Parametre texte</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.reseau.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reseau Socio</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Gestion du site
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.media.index') }}"> 
            <i class="fas fa-upload"></i>
            <span>Uploader </span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.live.streaming') }}">
            <i class="fas fa-camera-retro"></i>
            <span>Live </span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.storie.index') }}">
            <i class="fas fa-images"></i>
            <span>Storie</span></a>
    </li>
   
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.gallerie.index') }}">
            <i class="fas fa-photo-video"></i>
            <span>Gallery</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.subscription.index') }}">
            <i class="fas fa-photo-video"></i>
            <span>Subscription</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home.couverture') }}">
            <i class="fas fa-image"></i>
            <span>Couverture</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}">
            <i class="fab fa-product-hunt"></i>
            <span>Product</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.subscribe.invoice')}}">
            <i class="fab fa-product-hunt"></i>
            <span>Payment Subscription</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.boutique.invoice')}}">
            <i class="fab fa-product-hunt"></i>
            <span>Payment Boutique</span>
        </a>
    </li> --}}



    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>