@extends('layouts.layout_front')

@section('style')
    <style>

    </style>
@endsection

@section('sub_title')
    Message
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-lg-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white" style="background-color: #ff00ff !important;" >
                        {{ __('messages.sallon_discussion') }}
                    </div>
                    <div class="card-body" id="chat-body" style="overflow-y: scroll; max-height: 300px;">
                        <ul class="list-group" id="chat-box">
                            <!-- Messages will be appended here -->
                            
                            @foreach ($conversation->messages as $message)
                                @if ($message->user_id !== $user->id)
                                    <li class="list-group-item sender-message">
                                        <div class="d-flex align-items-start">
                                            {{-- <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3"> --}}
                                            <div class="text-black p-2">
                                                <strong>{{$message->user->name}}</strong>
                                                <p class="text-muted">{{ $message->created_at }}</p>
                                                <p>{{ $message->message }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="list-group-item receiver-message">
                                        <div class="d-flex justify-content-end">
                                            <div class="bg-light p-2 ">
                                                <strong>{{$message->user->name}}</strong>
                                                <p class="text-muted">{{ $message->created_at }}</p>
                                                <p>{{ $message->message }}</p>
                                            </div>
                                            {{-- <img src="https://via.placeholder.com/50x50"
                                                style=" width: 53px !important; height: 53px !important; border-radius: 100%;"
                                                class=" mr-3"> --}}
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('chat.store', ['locale' => session('locale')]) }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="message" id="message-input">
                                <input type="hidden" value="{{ $conversation->id }}" name="conversation_id">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="send-message-btn" style="background-color: #ff00ff !important; border-color: #ff00ff; ">{{ __('messages.envoyer') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
      
    </script>
@endsection
