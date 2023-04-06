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
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container page-top">
                        <div class="row">
                            <div class="col-4">
                                <img class="w-100" src="{{ asset('') . 'storage/media/' . $couverture->media->name }}" alt="" srcset="">
                            </div>
                            <div class="col-8">
                                <form action="{{route('admin.home.set.couverture')}}" method="post">
                                    @csrf
                                    <input type="hidden"  value="{{$couverture->id}}" name="id">
                                    {{-- <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$couverture->description}}</textarea> --}}
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Ajouter dans la couverture</button>
                                    </div>
                                </form>
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
