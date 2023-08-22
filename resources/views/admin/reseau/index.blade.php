@extends('layouts.new_layout_admin')

@section('content')
    <div class="container">
        <div class="mb-5">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-create">
                create
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">icon</th>
                    <th scope="col">lien</th>
                    <th scope="col">order</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reseauSocios as $reseau)
                    <tr>
                        <td>{{ $reseau->name }}</td>
                        <td>{{ $reseau->icon }}</td>
                        <td>{{ $reseau->lien }} </td>
                        <td>{{ $reseau->order }}</td>
                        <td class="d-flex">
                                <button href="#" data-toggle="modal" data-target="#exampleModal-{{ $reseau->id }}"
                                    class="btn btn-info mr-1 fancybox" rel="ligthbox">
                                    Voir
                                </button>
                                <form method="POST" action="{{route('admin.reseau.delete',['reseau' => $reseau->id])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" rel="ligthbox">
                                        Delete
                                    </button>
                                </form>
                    </tr>
                    <div class="modal fade" id="exampleModal-{{ $reseau->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="POST" action="{{route('admin.reseau.update',['reseau' => $reseau->id])}}">
                            @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row mb-5">
                                            <label for="bg_color_menu" style="font-weight: bold;"
                                                class="col-md-4 col-form-label text-md-right">Nom</label>
                                            <div class="col-md-6">
                                                <input required id="bg_color_menu" type="texte" class="form-control"
                                                    name="name" value="{{ $reseau->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="bg_color_menu" style="font-weight: bold;"
                                                class="col-md-4 col-form-label text-md-right">icon (<a target="_blank" href="https://icons.getbootstrap.com/icons/" > ici </a>)</label>
                                            <div class="col-md-6">
                                                <input required placeholder="<i class='bi bi-facebook'></i>" id="bg_color_menu" type="texte" class="form-control"
                                                    name="icon" value="{{ $reseau->icon }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="bg_color_menu" style="font-weight: bold;"
                                                class="col-md-4 col-form-label text-md-right">lien</label>
                                            <div class="col-md-6">
                                                <input required id="bg_color_menu" type="texte" class="form-control"
                                                    name="lien" value="{{ $reseau->lien }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <label for="bg_color_menu" style="font-weight: bold;"
                                                class="col-md-4 col-form-label text-md-right">Order</label>
                                            <div class="col-md-6">
                                                <input required min="1" max="{{$reseauSocios->count() + 1}}" name="order" id="ballance" step="any" type="number" class="form-control" value="{{ $reseau->order }}" placeholder="5" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" >Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal-create" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form method="POST" action="{{route('admin.reseau.create')}}">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">create</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="texte" class="form-control" name="name"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">icon </label>
                                <div class="col-md-6">
                                    <input required placeholder="<i class='bi bi-facebook'></i>" id="bg_color_menu" type="texte" class="form-control" name="icon"
                                        value="">
                                    (<a target="_blank" href="https://icons.getbootstrap.com/icons/" > ici </a>)
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">lien</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="texte" class="form-control" name="lien"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Order</label>
                                <div class="col-md-6">
                                    <input required min="1" max="{{$reseauSocios->count() + 1}}" name="order" id="ballance" step="any" type="number" class="form-control" value="1" placeholder="5" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">creer</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
