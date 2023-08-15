@extends('layouts.layout_front')

@section('style')
<style>
    .card-body {
        overflow-y: auto; max-height: 400px;
    }
    .moi {
        display: flex !important;
        justify-content: end !important;
        border: 1px #4e73df solid;
        padding: 5px;
        border-radius: 12px;
        color: black;
        background-color: #4e73df;
    }
    .toi{
        border: 1px #e3e6f0 solid;
        padding: 5px;
        border-radius: 12px;
        color: black;
        background-color: #e3e6f0;
    }
    .message{
        margin-bottom: 10px
    }
</style>
@endsection

@section('sub_title')
    {{__('messages.Message')}}
@endsection
{{-- chat-user --}}
@section('content')
<div class="chat" id="app">
    <chat-user :conversation="{{$conversation}}" :auth="{{ $user->id }}"></chat-user>
</div>
    
@endsection
