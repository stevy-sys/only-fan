@extends('layouts.new_layout_admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- @include('partials._menu') --}}
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container page-top">
                        <div class="row">

                            @foreach ($medias as $media)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a href="#" data-toggle="modal"
                                        data-target="#exampleModal-{{ $media->id }}" class="fancybox" rel="ligthbox">
                                        @if ($media->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="zoom img-fluid"
                                                alt="" />
                                        @else
                                            <div class="zoom img-fluid">
                                                <video width="300" height="250" controls>
                                                    <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
                                                  </video>
                                            </div>
                                        @endif
                                    </a>
                                </div>

                                <div class="modal fade" id="exampleModal-{{ $media->id }}" tabindex="-1"
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
                                                    <a href="{{route('admin.media.active',['media' => $media->id])}}" class="btn btn-primary">
                                                        @if ($media->active == true)
                                                            definier inactive
                                                        @else
                                                            definir Active
                                                        @endif
                                                    </a>
                                                </div>
                                                @if ($media->active == true)
                                                    <div class="mb-3">
                                                        <a href="{{route('admin.media.set', ['id' => $media->id])}}" class="btn btn-primary">afficher dans accueil</a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="{{route('admin.media.addCouverture', ['media' => $media->id])}}" class="btn btn-primary">ajouter dans la couverture</a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="{{ route('admin.storie.store', ['media' => $media->id]) }}"
                                                            class="btn btn-primary">definier storie</a>
                                                    </div>
                                                @endif
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
