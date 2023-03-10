@extends('layouts.new_layout_admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Tableau de bord</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        </nav> --}}
        <div class="row">
            {{-- @include('partials._menu') --}}
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container page-top">
                        <div class="row">

                            @foreach ($couvertures as $media)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $media->media->id }}" class="fancybox" rel="ligthbox">
                                        @if ($media->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $media->media->name }}" class="zoom img-fluid"
                                                alt="" />
                                        @else
                                            <div class="zoom img-fluid">
                                                <video width="150" src="{{ asset('') . 'storage/media/' . $media->media->name }}">

                                                </video>
                                            </div>
                                        @endif
                                    </a>
                                </div>

                                <div class="modal fade" id="exampleModal-{{ $media->media->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <a href="{{ route('admin.home.view.couverture',['couvertureHome' => $media->id]) }}"
                                                        class="btn btn-primary">voir</a>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <a href="{{route('admin.home.set.couverture.active',['couverture' => $media->id])}}" class="btn btn-primary">
                                                        @if ($media->active == true)
                                                            definier inactive
                                                        @else
                                                            definir Active
                                                        @endif
                                                    </a>
                                                </div>
                                                {{-- @if ($media->active == true)
                                                    <div class="mb-3">
                                                        <a href="{{route('admin.media.set', ['id' => $media->media->id])}}" class="btn btn-primary">afficher dans accueil</a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="{{ route('admin.storie.store', ['media' => $media->media->id]) }}"
                                                            class="btn btn-primary">definier storie</a>
                                                    </div>
                                                @endif --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('script')
@endsection
