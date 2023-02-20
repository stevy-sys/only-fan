
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
      @include('partials._authentication')
    </nav>
    <div class="row">
      @include('partials._menu')
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
