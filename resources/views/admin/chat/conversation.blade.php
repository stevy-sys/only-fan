@extends('layouts.new_layout_admin')

@section('style')
    <style>
        .moi {
          display: flex !important;
          justify-content: end !important;
          border: 1px #4e73df solid;
          padding: 5px;
          border-radius: 12px;
          color: black;
          background-color: #4e73df;
        }
        .toi{
          border: 1px #e3e6f0 solid;
          padding: 5px;
          border-radius: 12px;
          color: black;
          background-color: #e3e6f0;
        }
        .message{
          margin-bottom: 10px
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    @foreach ($conversations as $conversation)
                                        <a href="{{ route('admin.chat.index', ['conversation' => $conversation->id]) }}">
                                            <li class="list-group-item active">
                                                {{ $conversation->talked->user->name }}
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                            @if (isset($conversationActive))
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ $conversation->talked->user->name }}</div>
                                        <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                                            @foreach ($conversationActive->messages as $message)
                                                @if ($message->user->id == auth()->user()->id)
                                                    <div class="message moi">
                                                        <p>{{ $message->message }}</p>
                                                    </div>
                                                @else
                                                    <div class="message toi">
                                                        <p>{{ $message->message }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ route('admin.chat.store') }}" method="post">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="hidden" value="{{ $conversationActive->id }}"
                                                        name="conversation_id">
                                                    <input type="text" name="message" class="form-control"
                                                        placeholder="Votre message">
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
