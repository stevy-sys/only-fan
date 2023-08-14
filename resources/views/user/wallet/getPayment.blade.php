@extends('layouts.layout_front')


@section('sub_title')
    Panier
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">{{ __('messages.contenue_du_panier') }}</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Prix unitaire d'un token</th>
                            <th>Nombre de token a acheter</th>
                            <th>Prix total du token</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 token = {{$config->ballance}} €</td>
                            <td>{{$myWallet->wallet }} </td>
                            <td>{{$myWallet->ballance }} € </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- @if (isset($detail)) --}}
                <div class="card-footer">
                    <div>
                        <div>
                            <form action="{{ route('wallet.createPaiment',['locale' => session('locale')]) }}" method="POST">
                                <input type="hidden" value="{{$myWallet->ballance}}" name="total">
                                <input type="hidden" value="{{$myWallet->wallet }}" name="wallet">
                                @csrf
                                <script
                                    src="https://checkout.stripe.com/checkout.js"
                                    class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-amount="{{$myWallet->ballance}}"
                                    data-name="Aphrodite"
                                    data-description=""
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-label="payer avec Stripe par CB">
                                    >
                                </script>
                            </form>
                        </div>
                        <br>
                        {{-- <div>
                            <form class="mt-1" action="{{ url('/paypal/handle-payment') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$total}}" name="total">
                                <input type="hidden" value="{{$detail->id}}" name="detail">
                                <button style="padding-left: 24px;padding-right: 24px;padding-top: 4px;font-size: 14px;font-weight: bold;" class="btn btn-primary" type="submit">Paypal <i class="bi bi-paypal"></i> </button>
                            </form>
                        </div> --}}
                        <br>
                    </div>
                </div>
            {{-- @endif --}}
        </div>

    </div>
@endsection
