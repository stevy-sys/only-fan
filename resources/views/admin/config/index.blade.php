@extends('layouts.new_layout_admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="
                    background-color: black;
                ">
                <div class="card-header" style="
                background-color: #ff00ff !important;
            ">Parametre</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.config.store') }}">
                        @csrf
                        <div class="form-group row mb-5">
                            <label for="name" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">App name</label>
                            <div class="col-md-6">
                                <input id="name" type="texte" class="form-control" name="app_name" value="{{$config->app_name}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="bg_color_footer" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Background color Apps</label>
                            <div class="col-md-6">
                                <input id="bg_color_footer" type="texte" class="form-control" name="bg_color_footer" value="{{$config->bg_color_footer}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="bg_color_menu" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Background color menu</label>
                            <div class="col-md-6">
                                <input id="bg_color_menu" type="texte" class="form-control" name="bg_color_menu" value="{{$config->bg_color_menu}}">
                            </div>
                        </div>

                        

                        <div class="form-group row mb-5 d-none">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Color texte</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="texte_color" value="{{$config->texte_color}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">definition point</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="unite_point" value="{{$config->unite_point}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Live</label>
                            <div class="col-md-6">
                                <select class="form-control" name="active_live" id="">
                                    <option @selected($config->active_live == true) value="1">active</option>
                                    <option @selected($config->active_live == false) value="0">desactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Prix d'un token</label>
                            <div class="input-group" style="margin-left: 5px;  width: 147px; ">
                                <input name="ballance" id="ballance" step="any" type="number" class="form-control" value="{{$config->ballance}}" placeholder="5" aria-label="Username" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1">€</span>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Cle secret stripe </label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" value="{{$config->stripe_cle}}" name="stripe_cle">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Cle secret paypal </label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" value="" name="paypal_cle">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" style="
                                background-color: #ff00ff;
                                border-color: #ff00ff;
                                " class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{route('admin.config.reset')}}" class="form-group row mb-0 mt-5">
                        @csrf
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" style="
                            background-color: #ff00ff;
                            border-color: #ff00ff;
                            " class="btn btn-primary">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

