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
                            <td><strong>{{ __('messages.type_de_livraison') }}</strong></td>
                            <td><strong>Standard</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if (isset($detail))
                <div class="card-footer">
                    <div style="
                    display: flex !important;
                    justify-content: center;
                ">
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
                                data-locale="auto">
                            </script>
                        </form>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection