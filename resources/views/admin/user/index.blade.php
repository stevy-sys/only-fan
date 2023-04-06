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
            <th scope="col">role</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->premium == true)
                        {{$user->premium_type}}
                        @else
                        none
                        @endif
                    </td>
                    <td>{{$user->role}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection