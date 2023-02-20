
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
      @include('partials._menu')
      <div class="col-10">
        <div class="" style="height: calc(100vh - 56px);">
            <div class="container page-top">
                <div class="row">
                   
                    
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a
                                href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
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
                                href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
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

                        <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <a href="" class="btn btn-primary">voir</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-primary">annuler la storie</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-primary">supprimer la storie</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <a href="" class="btn btn-primary">voir</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-primary">annuler la storie</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-primary">supprimer la storie</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
      </div>
    </div>

    
  </div>
  
@endsection

@section('script')
    
@endsection
