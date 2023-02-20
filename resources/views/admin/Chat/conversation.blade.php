
@extends('layouts.layoutadmin')

@section('style')
    <style>
    
    </style>
@endsection

@section('body')

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Tableau de bord</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @include('partials._authentication')
    </nav>
    <div class="row">
      @include('partials._menu')
      <div class="col-10">
        <div class="" style="height: calc(100vh - 56px);">
            <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-group">
                      <li class="list-group-item active">Conversation 1</li>
                      <li class="list-group-item">Conversation 2</li>
                      <li class="list-group-item">Conversation 3</li>
                    </ul>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-header">Conversation 1</div>
                      <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                        <div class="message">
                          <p>User1: Salut, ça va ?</p>
                        </div>
                        <div class="message">
                          <p>User2: Oui, et toi ?</p>
                        </div>
                        <div class="message">
                          <p>User1: Ça va bien, merci.</p>
                        </div>
                      </div>
                      <div class="card-footer">
                        <form>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Votre message">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
    
@endsection