@extends('layouts.new_layout_admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a href="#" data-toggle="modal"
            data-target="#exampleModal-{{ $product->id }}" class="fancybox" rel="ligthbox">
                <img src="{{ asset('') . 'storage/media/' . $product->media }}" class="zoom img-fluid" alt="" />
        </a>
    </div>
    <form method="POST" action="{{route('admin.product.update',['product' => $product->id])}}" enctype="multipart/form-data">
        @csrf
        <input value="{{$product->id}}" type="hidden" name="id">
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="texte" value="{{$product->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">description</label>
          <input value="{{$product->description}}" type="texte" name="description" class="form-control" id="exampleInputPassword1" placeholder="description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">price</label>
            <input value="{{$product->price}}" type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="200">
          </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">image</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('script')
@endsection
