@extends('layouts.layout_front')

@section('sub_title')
    {{__('messages.Gallery')}}
@endsection

@section('style')
    <style>
    
    </style>
@endsection
@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
      @if ($media->type == 'image')
        <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="img-fluid" alt="Image">
      @else
        <video style="width: 100%;height: auto;" width="240" height="250" controls>
          <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
        </video>  
      @endif
    </div>
    <div class="col-md-4">
      <form action="{{route('media.like',['locale' => session('locale')])}}" method="post">
        @csrf
        <input type="hidden" name="media" value="{{$media->id}}">
        <button type="submit" class="btn btn-outline-primary"> {{$media->likes->count() == 0 ? '' : $media->likes->count() }}<i class="ml-5 bi bi-hand-thumbs-up-fill"></i></button>
      </form>
    </div>
    <div class="col-md-12">
      {{-- <div class="card">
        <div class="card-body">
          <h5 class="card-title">Titre de l'article</h5>
          <p class="card-text">
            <form action="{{route('media.like',['locale' => session('locale')])}}" method="post">
              @csrf
              <input type="hidden" name="media" value="{{$media->id}}">
              <button type="submit" class="btn btn-outline-primary"> {{$media->likes->count() == 0 ? '' : $media->likes->count() }} J'aime</button>
            </form>
          </p>
        </div> --}}
        {{-- <ul class="list-group list-group-flush">
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
        </ul> --}}
        {{-- <div class="card-body">
          <h5 class="card-title"> {{ __('messages.laisser_commentaire') }}</h5>
          <form method="post">
            @csrf
            <div class="form-group">
              <input type="hidden" value="{{$media->id}}" name="media_id">
              <label for="commentaire">{{ __('messages.commentaire') }}</label>
              <textarea name="comment" class="form-control" id="commentaire" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5">{{ __('messages.envoyer') }}</button>
          </form>
        </div> --}}
      </div>
    </div>
  </div>
</div>  
@endsection

@section('script')
<script>
    
</script>
@endsection