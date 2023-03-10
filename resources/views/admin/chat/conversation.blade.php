
@extends('layouts.new_layout_admin')

@section('style')
    <style>
    
    </style>
@endsection

@section('content')

<div class="container-fluid">
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Tableau de bord</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @include('partials._authentication')
    </nav> --}}
    <div class="row">
      {{-- @include('partials._menu') --}}
      <div class="col-10">
        <div class="" style="height: calc(100vh - 56px);">
            <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list-group">
                      @foreach ($conversations as $conversation)
                      <a href="{{ route('admin.chat.index',['conversation' => $conversation->id]) }}">
                        <li class="list-group-item active">
                          {{$conversation->talked->membrable->name}}
                        </li>
                      </a>
                      @endforeach
                      {{-- <li class="list-group-item">Conversation 2</li>
                      <li class="list-group-item">Conversation 3</li> --}}
                    </ul>
                  </div>
                  @if (isset($conversationActive))
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">Conversation 1</div>
                        <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                          @foreach ($conversationActive->messages as $message)
                            <div class="message">
                              <p>{{$message->messagable->name}}: {{ $message->message }}</p>
                            </div>
                          @endforeach
                          
                          {{-- <div class="message">
                            <p>User2: Oui, et toi ?</p>
                          </div>
                          <div class="message">
                            <p>User1: Ça va bien, merci.</p>
                          </div> --}}
                        </div>
                        <div class="card-footer">
                          <form action="{{ route('admin.chat.store') }}" method="post">
                            @csrf
                            <div class="input-group">
                              <input type="hidden" value="{{ $conversationActive->id }}" name="conversation_id">
                              <input type="text" name="message" class="form-control" placeholder="Votre message">
                              <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
    
@endsection