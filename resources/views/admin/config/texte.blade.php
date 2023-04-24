@extends('layouts.new_layout_admin')

@section('content')
<div class="container mt-5">
    <div id="app">
        <edit-texte url="{{route('admin.config.texte.update')}}" :data="{{$texte}}"></edit-texte>
    </div>
</div>
@endsection

