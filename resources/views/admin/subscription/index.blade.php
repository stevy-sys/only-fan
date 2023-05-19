@extends('layouts.new_layout_admin')

@section('content')
    <div class="container">
        <div class="mb-5">
            <a href="{{route('admin.subscription.create')}}"><button class="btn btn-primary">create</button></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">amount</th>
                    <th scope="col">devise</th>
                    <th scope="col">action</th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($subscriptions as $subscription)
                    <tr>
                        <td>{{$subscription->name}}</td>
                        <td>{{$subscription->amount}}</td>
                        <td>{{$subscription->devise}}</td>
                        <td>
                            <button class="btn btn-info"> <a href="{{route('admin.subscription.view',['subscription' => $subscription->id])}}">Voir</a></button>
                            <button class="btn btn-danger"> <a href="{{route('admin.subscription.delete',['subscription' => $subscription->id])}}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection