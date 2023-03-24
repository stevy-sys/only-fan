@extends('layouts.new_layout_admin')

@section('content')
<div id="app">
    <broadcaster-admin
    :auth_user_id="{{ $id }}"
    ></broadcaster-admin>
</div>
@endsection

