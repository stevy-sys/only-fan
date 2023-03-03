@extends('layouts.layout')

@section('sub_title')
    profile
@endsection

@section('style')
@endsection

@section('body')
    <form action="{{ route('profile.update', ['locale' => session('locale')]) }}" method="post">
        @csrf
        <div class="mx-auto" style="width: 50%;">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Prénom</label>
                <input type="text" name="surname" value="{{ $user->name }}" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@endsection
@section('script')
    <script></script>
@endsection
