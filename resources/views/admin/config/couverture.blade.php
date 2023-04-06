@extends('layouts.new_layout_admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
    
        </div>
        <div class="col-md-4">
          @if ($media->type == 'image')
            <img src="{{ asset('') . 'storage/media/' . $couverture->media->name }}" class="img-fluid" alt="Image">
          @else
            <video style="width: 100%;height: auto;" width="240" height="250" controls>
              <source src="{{ asset('') . 'storage/media/' . $couverture->media->name }}" type="{{$couverture->media->enctype ? $couverture->media->enctype : 'video/mp4' }}">
            </video>  
          @endif
        </div>
        <div class="col-md-4">
          <form action="{{route('admin.config.setcouverture',['locale' => session('locale')])}}" method="post">
            @csrf
            <input type="hidden" name="media">
            <button type="submit" class="btn btn-outline-primary">Update</button>
          </form>
        </div>
        <div class="col-md-12">
         
        </div>
        </div>
      </div>
</div>
@endsection

