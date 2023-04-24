
@extends('layouts.new_layout_admin')

@section('style')
    <style>
        .galle {
            width: 50% !important;
            margin: 2px;
            height: 50px !important;
            object-fit: cover !important;
        }

        .check {
            position: absolute;
            z-index: 100000;
            width: 15px;
            height: 24px;
            background-color: red;
            text-align: center;
            top: 30%;
            left: 30%;
            transform: translate(-50%, -50%);
        }

    </style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-10">
        <button class="btn btn-secondary">
            <a 
            style="font-style: normal;color: white;"
            href="#" 
            data-toggle="modal" 
            data-target="#exampleModal-create-collection"
            class="fancybox"
            rel="ligthbox"
            >
            Ajouter Collection
        </a>
        </button>
        <div class="mt-5" style="height: calc(100vh - 56px);">
            <div class="container page-top">
                <div class="row">
                        @foreach ($stories as $storie)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a
                                    href="#" data-toggle="modal" data-target="#exampleModal-{{$storie->id}}"
                                    class="fancybox"
                                    rel="ligthbox"
                                >
                                @if ($storie->collectionStorie[0]->mediable->type == 'image')
                                    <img
                                        src="{{asset('').'storage/media/'.$storie->collectionStorie[0]->mediable->name}}"
                                        class="zoom img-fluid"
                                        alt=""
                                    />
                                @else
                                    <div class="zoom img-fluid">
                                        <video width="300" height="250" controls>
                                            <source src="{{ asset('') . 'storage/media/' . $storie->collectionStorie[0]->mediable->name }}" type="{{$storie->collectionStorie[0]->mediable->enctype ? $storie->collectionStorie[0]->mediable->enctype : 'video/mp4' }}">
                                        </video>
                                    </div>
                                @endif
                                </a>
                                <h4>{{ $storie->name }} ({{$storie->collectionStorie->count()}})</h4>
                            </div>

                            <div class="modal fade" id="exampleModal-{{$storie->id}}" tabindex="-1" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Titre de la popup</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <a href="{{route('admin.storie.show',['storie' => $storie->id])}}" class="btn btn-primary">voir</a>
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{route('admin.storie.delete',['storie' => $storie->id])}}" class="btn btn-primary">annuler la storie</a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

    <div class="modal fade" id="exampleModal-create-collection" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create collection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form action="#" method="post">
                            @csrf
                            <div class="input-group">
                                <input id="storieCollection" type="text" name="name" class="form-control"  placeholder="nom du collection">
                            </div>
                            
                            <div class="row mt-3">
                                @foreach ($galleries as $media)
                                    <div class="col-lg-4 col-md-12 collect">
                                        <div class="media{{$media->id}}"></div>
                                        @if ($media->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="shadow-1-strong rounded  galle" alt="" />
                                        @else
                                            <video class="w-100 h-50 shadow-1-strong m-0 rounded  galle" controls>
                                                <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
                                            </video>
                                        @endif
                                    </div>
                                @endforeach
                            </div> 

                            <div class="input-group mt-3">
                                <button type="submit" class="btn btn-primary submit-create">Creation</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
  </div>
  
@endsection

@section('script')
    <script>
        $(document).ready(function() {
          
            var data = [] ;

            const getId = (classId) => {
                let split = classId.split('media');
                return split['1'];
            }

            const verif = (classId) => {
                let id = getId(classId)
                let temp = data ;
                temp = temp.filter(element => {
                    return element == id
                })
                temp.length > 0 ? suprim(id) : add(id)
            }

            const add = (id) => {
                data.push(id)
            }

            const suprim = (id) => {
                data = data.filter(element => {
                    return element != id
                })
            }

            $('.collect').click(function() {
                let child = $(this).children().first()[0];
                let id = $(child)[0].classList[0]
                verif(id)
                $(child).toggleClass('check')
            });

            $('.submit-create').click(function(e) {
                e.preventDefault();
                let allData = {
                    data:data,
                    name: $('#storieCollection')[0].value
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/activeStorie",
                    method: "POST",
                    data: allData
                }).done(function(response) {
                    if (response.message) {
                        window.location.reload()
                    }
                }).fail(function(error) {
                    alert(error)
                });
                
            });

        });
    </script>
@endsection
