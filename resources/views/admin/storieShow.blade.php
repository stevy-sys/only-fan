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
    <input type="hidden" class="idstore" value="{{$stories->id}}">
    <button class="btn btn-secondary">
        <a 
            style="font-style: normal;color: white;"
            href="#" 
            data-toggle="modal" 
            data-target="#exampleModal-create-collection"
            class="fancybox"
            rel="ligthbox"
        >
            Modifier Collection
        </a>
    </button>

    <div class="mt-5 container">
        <div class="row">
            @foreach ($stories->collectionStorie as $collectionStorie)
                <div class="col-lg-3 col-md-12">
                    <a href="#" data-toggle="modal" data-target="#exampleModal-{{ $collectionStorie->id }}">
                        @if ($collectionStorie->mediable->type != 'video')
                            <img src="{{ asset('') . 'storage/media/' . $collectionStorie->mediable->name }}" class="w-100 h-50 shadow-1-strong m-0 rounded" alt="" />
                        @else
                            <video class="w-100 h-50 shadow-1-strong m-0 rounded" controls>
                                <source src="{{ asset('') . 'storage/media/' . $collectionStorie->mediable->name }}" type="{{$collectionStorie->mediable->enctype ? $collectionStorie->mediable->enctype : 'video/mp4' }}">
                            </video>
                        @endif
                    </a>
                </div>
                <div class="modal fade" id="exampleModal-{{ $collectionStorie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifie media</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <a href="{{route('admin.storie.show.delete',['storieCollection' => $collectionStorie->id])}}" class="btn btn-primary">
                                       supprimer
                                    </a>
                                </div>
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

    <div class="modal fade" id="exampleModal-create-collection" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier collection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input id="storieCollection" value="{{$stories->name}}" type="text" name="name" class="form-control"  placeholder="nom du collection">
                            </div>
                            <div>Les actives</div>
                            <div class="row mt-3">
                                @foreach ($stories->collectionStorie as $collectionStorie)
                                    <div class="col-lg-4 col-md-12 collect">
                                        <div class="media{{$collectionStorie->mediable->id}} check"></div>
                                        @if ($collectionStorie->mediable->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $collectionStorie->mediable->name }}" class="shadow-1-strong rounded  galle" alt="" />
                                        @else
                                            <video class="w-100 h-50 shadow-1-strong m-0 rounded galle" controls>
                                                <source src="{{ asset('') . 'storage/media/' . $collectionStorie->mediable->name }}" type="{{$collectionStorie->mediable->enctype ? $collectionStorie->mediable->enctype : 'video/mp4' }}">
                                            </video>
                                        @endif
                                    </div>
                                @endforeach
                                
                            </div> 
                            <div>Autre gallerie</div>
                            <div class="row mt-3">
                                @foreach ($galleries as $media)
                                    <div class="col-lg-4 col-md-12 collect">
                                        <div class="media{{$media->id}}"></div>
                                        @if ($media->type != 'video')
                                            <img src="{{ asset('') . 'storage/media/' . $media->name }}" class="shadow-1-strong rounded  galle" alt="" />
                                        @else
                                            <video class="w-100 h-50 shadow-1-strong m-0 rounded galle" controls>
                                                <source src="{{ asset('') . 'storage/media/' . $media->name }}" type="{{$media->enctype ? $media->enctype : 'video/mp4' }}">
                                            </video>
                                        @endif
                                    </div>
                                @endforeach
                            <div>

                            <div class="input-group mt-3">
                                <button type="submit" class="btn btn-primary submit-create">Modifier</button>
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
        const getId = (classId) => {
            let split = classId.split('media');
            return split['1'];
        }

        var data = [] ;
        let id = $('.idstore')[0].value

        let presData = $('.check');
        for (let i = 0; i < presData.length; i++) {
            let id = getId(presData[i].classList[0])
            data.push(id)
        }
        console.log(data)

       

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
                name: $('#storieCollection')[0].value,
                storieId: id
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(allData)
            /*$.ajax({
                url: "/admin/updateStorie",
                method: "POST",
                data: allData
            }).done(function(response) {
                if (response.message) {
                    window.location.reload()
                }
            }).fail(function(error) {
                alert(error)
            });*/
            
        });

    });
</script>
@endsection
