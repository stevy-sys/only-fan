@extends('layouts.layoutadmin')

@section('style')
    <style>
    
    </style>
@endsection

@section('body')
    <form class="mx-auto mt-5" style="width: 30%;" method="post" action="{{ route('customer.authenticate') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Adresse email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
        </div>
    
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
@endsection

@section('script')
    
@endsection