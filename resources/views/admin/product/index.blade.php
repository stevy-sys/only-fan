@extends('layouts.new_layout_admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <button class="btn btn-danger"><a href="{{route('admin.product.create')}}">Creer un produit</a></button>
        <div class="row">
            {{-- @include('partials._menu') --}}
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container page-top">
                        <div class="row">

                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a href="#" data-toggle="modal"
                                        data-target="#exampleModal-{{ $product->id }}" class="fancybox" rel="ligthbox">
                                            <img src="{{ asset('') . 'storage/media/' . $product->media }}" class="zoom img-fluid" alt="" />
                                    </a>
                                </div>

                                <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <a href="{{ route('admin.gallerie.show') }}"
                                                        class="btn btn-primary">voir</a>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <a href="{{route('admin.product.active',['product' => $product->id])}}" class="btn btn-primary">
                                                        @if ($product->active == true)
                                                            definier inactive
                                                        @else
                                                            definir Active
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="mb-3">
                                                    <a href="{{route('admin.product.set', ['product' => $product->id])}}" class="btn btn-primary">modifier</a>
                                                </div>
                                                
                                                {{-- <div class="mb-3">
                                                    <a href="{{ route('admin.storie.store', ['product' => $product->id]) }}"
                                                        class="btn btn-primary">suprimer</a>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('script')
@endsection
