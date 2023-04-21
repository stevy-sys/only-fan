
@extends('layouts.new_layout_admin')

@section('style')
    <style>
        .galle {
            width: 50% !important;
            margin: 2px;
            height: 50px !important;
            object-fit: cover !important;
        }

    </style>
@endsection

@section('content')

<div class="container-fluid">
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
    </nav> --}}
    <div class="row">
      {{-- @include('partials._menu') --}}
      <div class="col-10">
        <button class="btn btn-secondary">
            <a 
            style="font-style: normal;color: white;"
            href="#" 
            data-toggle="modal" 
            data-target="#exampleModal-create-collection"
            class="fancybox"
            rel="ligthbox"
            >
            Ajouter Collection
        </a>
        </button>
        <div class="" style="height: calc(100vh - 56px);">
            <div class="container page-top">
                <div class="row">
                   
                        @foreach ($stories as $storie)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a
                                    href="#" data-toggle="modal" data-target="#exampleModal-{{$storie->id}}"
                                    class="fancybox"
                                    rel="ligthbox"
                                >
                                @if ($storie->media->type == 'image')
                                    <img
                                        src="{{asset('').'storage/media/'.$storie->media->name}}"
                                        class="zoom img-fluid"
                                        alt=""
                                    />
                                @else
                                <div class="zoom img-fluid">
                                    <video width="300" height="250" controls>
                                        <source src="{{ asset('') . 'storage/media/' . $storie->media->name }}" type="{{$storie->media->enctype ? $storie->media->enctype : 'video/mp4' }}">
                                    </video>
                                </div>
                                @endif
                                </a>
                            </div>

                            <div class="modal fade" id="exampleModal-{{$storie->id}}" tabindex="-1" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="{{route('admin.storie.delete',['storie' => $storie->id])}}" class="btn btn-primary">annuler la storie</a>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <a href="#" class="btn btn-primary">supprimer la storie</a>
                                        </div> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

    <div class="modal fade" id="exampleModal-create-collection" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create collection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form action="" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="name" class="form-control"  placeholder="nom du collection">
                            </div>
                            
                            <div class="row mt-3">
                                @foreach ($galleries as $media)
                                    <div class="col-lg-4 col-md-12">
                                        @if ($media->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="shadow-1-strong rounded  galle" alt="" />
                                        @else
                                            <video class="w-100 h-50 shadow-1-strong m-0 rounded  galle" controls>
                                                <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
                                            </video>
                                        @endif
                                    </div>
                                @endforeach
                            </div> 

                            <div class="input-group mt-3">
                                <button type="submit" class="btn btn-primary">Creation</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
  </div>
  
@endsection

@section('script')
    
@endsection
