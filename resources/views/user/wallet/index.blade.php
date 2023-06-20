@extends('layouts.layout_front')


@section('content')
    <section>
        <div class="wallet-balance">
            <div class="">
                <img class=""style=" width: 160px;" src="{{asset('assets/img/ruby.png')}}" alt="" srcset="">  
            </div>
            <div>
                <h2>Avantage des token</h2>
                <div>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, provident.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
    
            <div class="paiment-wallet">
                <h2>Payer pour avoir token</h2>
                <form method="post" action="{{route('wallet.create',['locale' => session('locale')]) }}" class="d-flex">
                    @csrf
                    <div class="input-group ml-3 mb-3" style="  margin-left: 5px;  width: 147px; ">
                        <span class="input-group-text" id="basic-addon1">token</span>
                        <input name="wallet" id="wallet" type="number" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    {{-- <div>
                        <input id="wallet" type="number" class="form-control mb-1 mr-5" style=" width: 76px; ">
                    </div> --}}
                    <div class="input-group ml-3 mb-3" style="  margin-left: 5px;margin-right: 5px;  width: 147px; ">
                        <input name="ballance" id="ballance" disabled type="text" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">€</span>
                    </div>
                    {{-- <input disabled type="number" class="form-control mb-1" style=" width: 100px; ">€ --}}
                    <div><button type="submit" class="btn btn-danger ">Valider</button></div>
                </form>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#wallet").change(function(event) {
                var value = $(this).val();
                let bal = value *  5 ;
                console.log(bal)
                $("#ballance").val(bal);
            });
        });
    </script>
@endsection