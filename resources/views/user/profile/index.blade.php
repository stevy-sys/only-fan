@extends('layouts.layout_front')

@section('style')

@endsection

@section('content')
    <form action="{{ route('profile.update', ['locale' => session('locale')]) }}" method="post">
        @csrf
        <div class="mx-auto" style="width: 50%;">
            <div class="form-group">
                <label for="exampleInputEmail1">{{ __('messages.nom') }}</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ __('messages.prenom') }}</label>
                <input type="text" name="surname" value="{{ $user->name }}" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">{{ __('messages.adresse_email') }}</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">{{__('messages.phone')}}</label>
                <input type="texte" name="phone" value="{{ $user->profile->phone ? $user->profile->phone : '' }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">{{__('messages.adress')}}</label>
                <input type="texte" name="adress" value="{{ $user->profile->adress }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('messages.enregistrer') }}</button>
        </div>
    </form>
@endsection
@section('script')
    <script></script>
@endsection
