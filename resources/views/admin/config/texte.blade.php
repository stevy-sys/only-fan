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
            ">Parametre texte</div>

                <div class="card-body">
                    <form method="POST" action="{{route('admin.config.texte.update')}}">
                        @csrf

                        <div class="form-group row mb-5">
                            <label for="name" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Bio</label>
                            <div class="col-md-6">
                                <input id="name" type="texte" class="form-control" name="bio" value="{{$texte->bio}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="bg_color_menu" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Chat title</label>
                            <div class="col-md-6">
                                <input id="bg_color_menu" type="texte" class="form-control" name="chat_title" value="{{$texte->chat_title}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="bg_color_footer" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Chat description</label>
                            <div class="col-md-6">
                                <textarea id="bg_color_footer" type="texte" class="form-control" name="chat_description" >{{$texte->chat_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Live title</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="live_title" value="{{$texte->live_title}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5 ">
                            <label for="bg_color_footer" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">live 1 description</label>
                            <div class="col-md-6">
                                <textarea id="bg_color_footer" type="texte" class="form-control" name="live1_description" >{{$texte->live1_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">live 2 description</label>
                            <div class="col-md-6">
                                <textarea id="bg_color_footer" type="texte" class="form-control" name="live2_description" >{{$texte->live2_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-5 ">
                            <label for="bg_color_footer" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Boutique title</label>
                            <div class="col-md-6">
                                <input id="bg_color_footer" type="texte" class="form-control" name="boutique_title" value="{{$texte->boutique_title}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Boutique 1 description</label>
                            <div class="col-md-6">
                                <textarea id="color" type="texte" class="form-control" name="boutique1_description" >{{$texte->boutique1_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Boutique 2 description</label>
                            <div class="col-md-6">
                                <textarea id="color" type="texte" class="form-control" name="boutique2_description" >{{$texte->boutique2_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Abonnee title</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="abonnee_title" value="{{$texte->abonnee_title}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Storie title</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="storie_title" value="{{$texte->storie_title}}">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Gallerie title</label>
                            <div class="col-md-6">
                                <input id="color" type="texte" class="form-control" name="gallerie_title" value="{{$texte->gallerie_title}}">
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
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

