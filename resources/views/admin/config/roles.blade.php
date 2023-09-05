@extends('layouts.new_layout_admin')

@section('content')
    <div class="container">
        <div class="mb-5">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-create">
                create Role
            </button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-create-admin">
                create Admin
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                @if (($role->name != 'super-admin') && ($role->name != 'user'))
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td class="d-flex">
                            <button href="#" data-toggle="modal" data-target="#exampleModal-{{ $role->id }}"
                                class="btn btn-info mr-1 fancybox" rel="ligthbox">
                                Voir
                            </button>
                            <form method="POST" action="{{ route('admin.reseau.delete', ['reseau' => $role->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger" rel="ligthbox">
                                    Delete
                                </button>
                            </form>
                    </tr>
                    <div class="modal fade" id="exampleModal-{{ $role->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="POST" action="{{ route('admin.config.role.update', ['role' => $role->id]) }}">
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
                                                    name="name" value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <h3>Menu</h3>
                                        
                                        @foreach ($menus as $menu )
                                            <div class="form-group row mb-5">
                                                <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">{{ $menu->name }}</label>
                                                <div class="col-md-6">
                                                    <select multiple class="form-control" name="menus[]" id="">
                                                        {{-- <option @selected($config->active_live == true) value="1">active</option> --}}
                                                        @foreach ( $menu->sub as $submenu )
                                                            <option @selected(isMenuSelected($submenu->id,$role) == true) value="{{$submenu->id}}">{{ $submenu->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal-create" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form method="POST" action="{{ route('admin.config.role.store') }}">
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
                                    <input required id="bg_color_menu" type="texte" class="form-control"
                                        name="name" value="">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">icon </label>
                                <div class="col-md-6">
                                    <input required placeholder="<i class='bi bi-facebook'></i>" id="bg_color_menu"
                                        type="texte" class="form-control" name="icon" value="">
                                    (<a target="_blank" href="https://icons.getbootstrap.com/"> ici </a>)
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">lien</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="texte" class="form-control"
                                        name="lien" value="">
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

        <div class="modal fade" id="exampleModal-create-admin" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <form method="POST" action="{{ route('admin.config.createadmin') }}">
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
                                    class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="texte" class="form-control"
                                        name="name" value="">
                                </div>
                            </div>
                             <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="email" class="form-control"
                                        name="email" value="">
                                </div>
                            </div>
                             <div class="form-group row mb-5">
                                <label for="bg_color_menu" style="font-weight: bold;"
                                    class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input required id="bg_color_menu" type="password" class="form-control"
                                        name="password" value="">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="role_id" id="">
                                        {{-- <option @selected($config->active_live == true) value="1">active</option> --}}
                                        @foreach ( $roles as $role )
                                            @if (($role->name != 'super-admin') && ($role->name != 'user') )
                                                <option value="{{$role->id}}">{{ $role->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
