@extends('layouts.layout')

@section('style')
    <style>
    
    </style>
@endsection
@section('body')
<div class="container my-5">
    <div class="row">
      <div class="col-md-8">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/T9U6sF9sJss" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <h3 class="my-3">Titre de la vidéo</h3>
        <p>Description de la vidéo</p>
        <div class="d-flex align-items-center my-3">
          <i class="fas fa-thumbs-up mr-2"></i>
          <p>Nombre de "j'aime"</p>
        </div>
        <h5>Commentaires</h5>
        <hr>
        <div class="media my-3">
          <img src="https://via.placeholder.com/64x64" alt="Profile picture" class="mr-3 rounded-circle">
          <div class="media-body">
            <h6 class="mt-0">Nom d'utilisateur</h6>
            Commentaire de l'utilisateur
          </div>
        </div>
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Publier</button>
        </form>
      </div>
      <div class="col-md-4">
        <h5>Vidéos similaires</h5>
        <hr>
        <div class="card mb-3">
          <img src="https://via.placeholder.com/300x200" alt="Image de la vidéo" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Titre de la vidéo</h6>
          </div>
        </div>
        <div class="card mb-3">
          <img src="https://via.placeholder.com/300x200" alt="Image de la vidéo" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Titre de la vidéo</h6>
          </div>
        </div>
        <div class="card mb-3">
          <img src="https://via.placeholder.com/300x200" alt="Image de la vidéo" class="card-img-top">
          <div class="card-body">
            <h6 class="card-title">Titre de la vidéo</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
<script>
    
</script>
@endsection