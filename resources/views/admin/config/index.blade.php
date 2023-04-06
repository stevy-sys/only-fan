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

