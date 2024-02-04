@extends('layouts.layout_front')


@section('content')
        <div class="container" style="
        margin-bottom: 20vh;
    ">
            <div class="row">
                <div class="col-lg-2 col-xs-12">
                    <div class="logo">
                        <img class=""style=" width: 160px;" src="{{asset('assets/img/ruby.png')}}" alt="" srcset="">
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div>
                        <h2>{{__('messages.Avantage_des_token')}}</h2>
                        <div>
                            {!!$text->token_avantage!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="paiment-wallet">
                        <h2>{{__('messages.Payer_pour_avoir_token')}}</h2>
                        <form method="post" action="{{route('wallet.create',['locale' => session('locale')]) }}" class="d-flex">
                            @csrf
                            <div class="input-group ml-3 mb-3" style="  margin-left: 5px;  width: 147px; ">
                                <span class="input-group-text" id="basic-addon1">token</span>
                                <input name="wallet" id="wallet" step="any" type="number" class="form-control" placeholder="0">
                            </div>
                            {{-- <div>
                                <input id="wallet" type="number" class="form-control mb-1 mr-5" style=" width: 76px; ">
                            </div> --}}
                            <div class="input-group ml-3 mb-3" style="  margin-left: 5px;margin-right: 5px;  width: 147px; ">
                                <input name="ballance" id="ballance" disabled type="text" class="form-control" placeholder="0.00" >
                                <span class="input-group-text" id="basic-addon1">€</span>
                            </div>
                            {{-- <input disabled type="number" class="form-control mb-1" style=" width: 100px; ">€ --}}
                            <div><button id="submit" disabled type="submit" class="btn btn-danger ">{{__('messages.valider')}}</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#wallet").on('input',function(event) {
                console.log(event.target.value)
                var value = $(this).val();
                if (value >= 0) {
                    let bal = value * {{$config->ballance}} ;
                    bal = bal.toFixed(2)
                    $("#ballance").val(bal);
                    disabledbutton(bal)
                }
            });

            function disabledbutton(valu) {
                if (valu == 0) {
                    $("#submit").attr('disabled',true)
                }else{
                    $("#submit").attr('disabled',false)
                }
            }
        });
    </script>
@endsection
