@extends('layouts.new_layout_admin')

@section('content')
<div id="app">
    <broadcaster-admin
    :auth_user_id="{{ $id }}"
    env="{{env('APP_ENV')}}"
    url="{{ $url }}"
    ></broadcaster-admin> 
</div>
@endsection

