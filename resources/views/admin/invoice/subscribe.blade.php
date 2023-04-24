

@extends('layouts.new_layout_admin')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">numero</th>
                    <th scope="col">utilisateur</th>
                    <th scope="col">payment</th>
                    <th scope="col">detail</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Lorem, ipsum.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td><button class="btn btn-info"><a href="{{route('admin.invoice.paiment')}}">voir</a></button></td>
                </tr>
            </tbody>
        </table>
        
    </div>
@endsection