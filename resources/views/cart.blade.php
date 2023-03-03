@extends('layouts.layout')


@section('sub_title')
    Panier
@endsection

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('messages.contenue_du_panier') }}</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('messages.produit') }}</th>
                            <th>{{ __('messages.prix') }}</th>
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
                            <td><strong>{{ __('messages.total') }}</strong></td>
                            <td><strong>{{$total}}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>{{ __('messages.type_de_livraison') }}</strong></td>
                            <td><strong>Standard</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block">{{ __('messages.payer') }}</button>
            </div>
        </div>

    </div>
@endsection
