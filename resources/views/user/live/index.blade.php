@extends('layouts.layout_front')

@section('sub_title')
    Live
@endsection

@section('style')
    <style>
    
    </style>
@endsection
@section('content')
  @if (isset($streamId))
    <div id="app"  class="container my-5">
      <viewer-user stream_id="{{ $streamId }}" :auth_user_id="{{ $id }}"></viewer-user>
    </div>
  @else
  <div>
    Pas de live disponible pour le moment
  </div>
  @endif
  
@endsection

@section('script')
<script>
    
</script>
@endsection