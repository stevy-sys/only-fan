@extends('layouts.layout_front')


@section('sub_title')
    {{__('messages.Panier')}}s
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">{{ __('messages.contenue_du_panier') }}</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__("messages.Prix_unitaire_d'un_token")}}</th>
                            <th>{{__('messages.Nombre_de_token_a_acheter')}}</th>
                            <th>{{__('messages.Prix_total_du_token')}}</th>
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
                                <input type="hidden" value="{{$myWallet->ballance * 100}}" name="total">
                                <input type="hidden" value="{{$myWallet->wallet }}" name="wallet">
                                @csrf
                                <script
                                    src="https://checkout.stripe.com/checkout.js"
                                    class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-currency="eur"
                                    data-amount="{{$myWallet->ballance * 100}}"
                                    data-name="Aphrodite"
                                    data-description=""
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-label="{{__('messages.payer_avec_Stripe_par_CB')}}">
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
