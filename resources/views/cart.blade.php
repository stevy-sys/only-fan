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
                            <th>{{ __('messages.produit') }}</th>
                            <th>{{ __('messages.prix') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($detail))
                            @foreach ($detail->commands as $command)
                                <tr>
                                    <td>{{$command->product->name}}</td>
                                    <td>{{$command->product->price}} €</td>
                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>{{ __('messages.total') }}</strong></td>
                            <td><strong>{{$total}}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Total points</strong></td>
                            <td><strong>{{$totalWallet}} {{ $config->unite_point }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>{{ __('messages.type_de_livraison') }}</strong></td>
                            <td><strong>Standard</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if (isset($detail))
                <div class="card-footer">
                    <h4 class="securisee">PAIEMENT EN LIGNE 100% SECURISE</h4>
                    <div class="paiment-moyen">
                        <div>
                            <form action="{{ route('payment.boutique.process',['locale' => session('locale')]) }}" method="POST">
                                <input type="hidden" value="{{$total}}" name="total">
                                <input type="hidden" value="{{$detail->id}}" name="detail">
                                @csrf
                                <script
                                    src="https://checkout.stripe.com/checkout.js"
                                    class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-amount="{{$total}}"
                                    data-name="Aphrodite"
                                    data-description=""
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-label="payer avec Stripe">
                                    >
                                </script>
                            </form>
                        </div>

                        <div>
                            <form action="{{ url('/paypal/handle-payment') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$total}}" name="total">
                                <input type="hidden" value="{{$detail->id}}" name="detail">
                                <button style="padding-left: 24px;padding-right: 24px;padding-top: 4px;font-size: 14px;font-weight: bold;" class="btn btn-primary" type="submit">Paypal <i class="bi bi-paypal"></i> </button>
                            </form>
                        </div>

                        <div>
                            <form action="{{ route('payment.boutique.wallet') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$totalWallet}}" name="total">
                                <input type="hidden" value="{{$detail->id}}" name="detail">
                                <button @disabled($totalWallet > auth()->user()->wallet) style="padding-left: 24px;padding-right: 24px;padding-top: 4px;font-size: 14px;font-weight: bold;" class="btn btn-primary" type="submit">Payer avec les points</button>
                                @if ($totalWallet > auth()->user()->wallet)
                                    <div class="p-2 m-0 alert alert-danger">Token insuffisant</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
