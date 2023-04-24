@extends('layouts.layout_front')

@section('style')
    <style>

    </style>
@endsection

@section('sub_title')
    Message
@endsection
{{-- chat-user --}}
@section('content')
<div id="app">
    <chat-user :conversation="{{$conversation}}" :auth="{{ $user->id }}"></chat-user>
</div>
    
@endsection

@section('script')
    <script>
      
    </script>
@endsection
