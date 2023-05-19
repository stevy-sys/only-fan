@extends('layouts.new_layout_admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="
                    background-color: black;
                ">
                <div class="card-header" style="
                background-color: #ff00ff !important;
            ">Subscription</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.subscription.update',['subscription' => $subscription->id]) }}">
                        @csrf

                        <div class="form-group row mb-5">
                            <label for="name" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" value="{{$subscription->name}}" type="texte" class="form-control" name="name" >
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="name" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Amount</label>
                            <div class="col-md-6">
                                <input id="name" value="{{$subscription->amount}}" type="texte" class="form-control" name="amount" >
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="color" style="font-weight: bold;" class="col-md-4 col-form-label text-md-right">Devise</label>
                            <div class="col-md-6">
                                <select class="form-control" name="devise" id="">
                                    <option @selected($subscription->devise == '$') value="$">$</option>
                                    <option @selected($subscription->devise == '€') value="€">€</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" style="
                                background-color: #ff00ff;
                                border-color: #ff00ff;
                                " class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

