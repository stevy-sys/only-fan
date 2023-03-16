@extends('layouts.new_layout_admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="texte" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">descirpiton</label>
          <input type="texte" name="description" class="form-control" id="exampleInputPassword1" placeholder="description">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">price</label>
            <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="200">
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
