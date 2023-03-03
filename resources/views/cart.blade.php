@extends('layouts.layout')


@section('sub_title')
    Panier
@endsection

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">Contenu du panier</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail->commands as $command)
                            <tr>
                                <td>{{$command->product->name}}</td>
                                <td>{{$command->product->price}} €</td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{$total}}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Type de livraison</strong></td>
                            <td><strong>Standard</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block">Payer</button>
            </div>
        </div>

    </div>
@endsection
