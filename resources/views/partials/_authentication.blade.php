<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        @if (auth()->guard('customer')->check())
        <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.logout') }}">Déconnexion</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="#">Connexion</a>
        </li>
        @endif
      
    </ul>
  </div>