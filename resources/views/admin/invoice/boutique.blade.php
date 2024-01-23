@extends('layouts.new_layout_admin')

@section('content')
<div class="container">
        <h1>Liste payment boutique</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">date</th>
                    <th scope="col">numero</th>
                    <th scope="col">utilisateur</th>
                    <th scope="col">payment</th>
                    <th scope="col">Total</th>
                    <th scope="col">detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <th scope="row">{{ $invoice->created_at }}</th>
                        <th>{{ $invoice->numero }}</th>
                        <td>{{ $invoice->user->name}}</td>
                        <td>{{ $invoice->paiment}}</td>
                        <td>{{  $invoice->paiment !== 'point' ?? $invoice->detail->total . ' €' }}  </td>
                        <td><button class="btn btn-info"> <a href="{{route('admin.invoice.boutique',['idInvoice' => $invoice->id])}}">voir</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
