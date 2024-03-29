@extends('layouts.new_layout_admin')


@section('style')
    <style>
        .body-main {
            background: #ffffff;
            border-bottom: 15px solid #1E1F23;
            border-top: 15px solid #1E1F23;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #808080;
            font-size: 15px;
        }

        .main thead {
            background: #1E1F23;
            color: #fff;
        }

        .img {
            height: 100px;
        }

        h1 {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img" alt="Invoce Template"
                                    src="/assets/img/logo.png" />
                            </div>
                            <div class="col-md-8 text-right">
                                <h4 style="color: #F81D2D;"><strong>{{ $invoice->user->name}}</strong></h4>
                                {{-- <p>221 ,Baker Street</p> --}}
                                <p>Inscrit le {{ $invoice->user->created_at}}</p>
                                <p>{{ $invoice->user->email}}</p>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>INVOICE</h2>
                                <h5>{{ $invoice->numero}}</h5>
                            </div>
                        </div>
                        <br />
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>Description</h5>
                                        </th>
                                        <th>
                                            <h5>Quantite</h5>
                                        </th>
                                        <th>
                                            <h5>Amount</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->detail->commands as $item)
                                        <tr>
                                            <td class="col-md-8">{{$item->product->name}}</td>
                                            <td class="col-md-2"> 1 </td>
                                            <td class="col-md-2">{{ $item->product->price }} € </td>
                                        </tr>
                                    @endforeach


                                    {{-- <tr>
                                        <td class="text-right">
                                            <p>
                                                <strong>Shipment and Taxes:</strong>
                                            </p>
                                            <p>
                                                <strong>Total Amount: </strong>
                                            </p>
                                            <p>
                                                <strong>Discount: </strong>
                                            </p>
                                            <p>
                                                <strong>Payable Amount: </strong>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 </strong>
                                            </p>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 82,900</strong>
                                            </p>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong>
                                            </p>
                                            <p>
                                                <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900</strong>
                                            </p>
                                        </td>
                                    </tr> --}}

                                    <tr style="color: #F81D2D;">
                                        <td class="text-right">
                                            <h4><strong>Total:</strong></h4>
                                        </td>
                                        <td class="text-left">
                                            <h4><strong> {{ $invoice->detail->total }} €
                                                </strong></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="col-md-12">
                                <p><b>Date :</b> {{ $invoice->created_at }}</p>
                                <br />
                                <p><b>Signature</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
