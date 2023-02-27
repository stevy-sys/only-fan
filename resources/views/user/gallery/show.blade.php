@extends('layouts.layout')

@section('style')
    <style>
    
    </style>
@endsection
@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="img-fluid" alt="Image">
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Titre de l'article</h5>
          <p class="card-text">
            <form action="{{route('media.like',['locale' => session('locale')])}}" method="post">
              @csrf
              <input type="hidden" name="media" value="{{$media->id}}">
              <button type="submit" class="btn btn-outline-primary"> {{$media->likes->count() == 0 ? '' : $media->likes->count() }} J'aime</button>
            </form>
          </p>
        </div>
        <ul class="list-group list-group-flush">
          @foreach ($media->comments as $comment)
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-2">
                  <img src="chemin/vers/avatar1.jpg" class="img-fluid rounded-circle" alt="Avatar">
                </div>
                <div class="col-md-10">
                  <h5>{{$comment->user->name}}</h5>
                  <p>{{$comment->comment}}</p>
                  
                </div>
              </div>
            </li>
          @endforeach
          <!-- autres commentaires ici -->
        </ul>
        <div class="card-body">
          <h5 class="card-title">Laisser un commentaire</h5>
          <form method="post">
            @csrf
            {{-- <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
            </div> --}}
            <div class="form-group">
              <input type="hidden" value="{{$media->id}}" name="media_id">
              <label for="commentaire">Commentaire</label>
              <textarea name="comment" class="form-control" id="commentaire" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
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