
@extends('layouts.new_layout_admin')

@section('style')
    <style>
    
    </style>
@endsection

@section('content')

<div class="container-fluid">
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Tableau de bord</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @include('partials._authentication')
    </nav> --}}
    <div class="row">
      {{-- @include('partials._menu') --}}
      <div class="col-10">
        <div class="" style="height: calc(100vh - 56px);">
            <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="video">Sélectionner une fichier</label>
                    <input type="file" multiple name="video[]" id="video">
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
    
@endsection
