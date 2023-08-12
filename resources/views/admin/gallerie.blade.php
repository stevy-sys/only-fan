@extends('layouts.new_layout_admin')

@section('style')
    <style>
        .galle {
            width: 100% !important;
            height: 250px !important;
            object-fit: cover !important;
        }

    </style>
@endsection

@section('content')
<div class="container-fluid">
    


    <div class="container">
        <div class="row">
            @foreach ($medias as $media)
                <div class="col-lg-3 col-md-12">
                    <div class="image_gallery"> 
                        <div class="icon_actif d-flex align-items-center justify-content-center">
                            <div class="cercle_icon {{ $media->show ? "cercle_icon_actif" : "cercle_icon_inactif" }}"></div>
                            @if ($media->blur)
                            <div class="cercle_premium">premium</div>
                            @endif
                        </div>
                        <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $media->id }}">
                            @if ($media->type != 'video')
                                <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="w-100 h-50 shadow-1-strong m-0 rounded  galle" alt="" />
                            @else
                                <video class="w-100 h-50 shadow-1-strong m-0 rounded  galle" controls>
                                    <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
                                </video>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal-{{ $media->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <a href="{{ asset('') . 'storage/media/' . $media->name }}"
                                        class="btn btn-primary">voir</a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('admin.gallerie.delete',['media' => $media->id]) }}"
                                        class="btn btn-primary">supprimer</a>
                                </div>
                                
                                <div class="mb-3">
                                    <a href="{{route('admin.media.active',['media' => $media->id])}}" class="btn btn-primary">
                                        @if ($media->show == true)
                                            definier Inactive
                                        @else
                                            definir Active
                                        @endif
                                    </a>
                                </div>
                                @if ($media->show == true)
                                    <div class="mb-3">
                                        <a href="{{route('admin.media.setflou', ['id' => $media->id])}}" class="btn btn-primary">
                                            @if ($media->blur == true)
                                                Annuler le mode premium
                                            @else
                                                Mode premium
                                            @endif
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{route('admin.media.set', ['id' => $media->id])}}" class="btn btn-primary">
                                            {{ isExistInMediaHome($media->id) == true ? " supprimer dans accueil" : "afficher dans accueil"}}
                                        </a>
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
@endsection

@section('script')
@endsection
