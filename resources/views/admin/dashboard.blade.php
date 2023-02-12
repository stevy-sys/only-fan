
@extends('layouts.layoutadmin')

@section('style')
    <style>
    
    </style>
@endsection

@section('body')

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Tableau de bord</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
    </nav>
    <div class="row">
      <div class="col-2 bg-light sidebar">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Utilisateur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Live Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Parametre</a>
          </li>
        </ul>
      </div>
      <div class="col-10">
        <div class="" style="height: calc(100vh - 56px);">
            <p>bienvenue l'admin {{ Auth::guard('customer')->user()->name }}</p>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
    
@endsection
