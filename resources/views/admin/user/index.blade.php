@extends('layouts.new_layout_admin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">premium</th>
                    <th scope="col">wallet</th>
                    <th scope="col">role</th>
                    <th scope="col">profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->premium == true)
                                {{ $user->premium_type }}
                            @else
                                none
                            @endif
                        </td>
                        <td>{{ $user->wallet }} 
                            <a 
                                href="#" 
                                data-toggle="modal" 
                                data-target="#wallet-{{$user->id}}"
                                class="fancybox"
                                rel="ligthbox"
                            >
                            <button class="btn btn-info">
                                +
                            </button>
                            </a>
                        </td>
                        <td>{{ $user->role }}</td>
                        <td> 
                            <a 
                                href="#" 
                                data-toggle="modal" 
                                data-target="#exampleModal-{{$user->id}}"
                                class="fancybox"
                                rel="ligthbox"
                            >
                                profile
                            </a>
                    </tr>
                    <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        phone : {{ $user->profile ? $user->profile->phone : ''}}
                                    </div>
                                    <div class="mb-3">
                                        addresse : {{ $user->profile ? $user->profile->adress : ''}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="wallet-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">wallet</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('admin.user.update.wallet')}}">
                                        @csrf
                                        <input name="wallet" value="{{$user->wallet}}" type="number" class="form-control">
                                        <input name="user_id" value="{{$user->id}}" type="hidden" class="form-control">
                                        <input class="mt-3 btn btn-primary" type="submit" value="enregistrer">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
