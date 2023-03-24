@extends('layouts.layout_front')

@section('sub_title')
    Live
@endsection

@section('style')
    <style>
    
    </style>
@endsection
@section('content')
  <div id="app"  class="container my-5">
    <viewer-user stream_id="{{ $streamId }}" :auth_user_id="{{ $id }}"></viewer-user>
  </div>
  
@endsection

@section('script')
<script>
    
</script>
@endsection