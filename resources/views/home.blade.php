@extends('layouts.layout')


@section('style')
    <style>
    .carousel-item {
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
@endsection
@section('body')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-image: url(http://via.placeholder.com/1000x600)">
        <div class="carousel-caption d-none d-md-block">
          <h5>Image 1</h5>
          <p>Description de l'image 1</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(http://via.placeholder.com/1000x600)">
        <div class="carousel-caption d-none d-md-block">
          <h5>Image 2</h5>
          <p>Description de l'image 2</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(http://via.placeholder.com/1000x600)">
        <div class="carousel-caption d-none d-md-block">
          <h5>Image 3</h5>
          <p>Description de l'image 3</p>
        </div>
      </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </a>
</div>
  
  <!-- CSS Code -->
  
  
  <!-- JavaScript Code -->
  
  
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".carousel").carousel();
    });
</script>
@endsection
