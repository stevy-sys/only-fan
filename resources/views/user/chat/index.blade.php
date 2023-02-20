@extends('layouts.layout')

@section('style')
    <style>
    
    </style>
@endsection
@section('body')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            Chat Room
          </div>
          <div class="card-body" id="chat-body" style="overflow-y: scroll; max-height: 300px;">
            <ul class="list-group" id="chat-box">
              <!-- Messages will be appended here -->
              <li class="list-group-item sender-message">
                <div class="d-flex align-items-start">
                  <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3">
                  <div class="bg-primary text-white p-2">
                    <strong>John Doe</strong>
                    <p class="text-muted">Today, 10:30 AM</p>
                    <p>Hello everyone!</p>
                  </div>
                </div>
              </li>
              <li class="list-group-item receiver-message">
                <div class="d-flex justify-content-end">
                  <div class="bg-light p-2 ">
                    <strong>Jane Doe</strong>
                    <p class="text-muted">Today, 10:31 AM</p>
                    <p>Hi John! How are you doing?</p>
                  </div>
                  <img src="https://via.placeholder.com/50x50" style = " width: 53px !important; height: 53px !important; border-radius: 100%;" class=" mr-3">
                </div>
              </li>
              <li class="list-group-item receiver-message">
                <div class="d-flex align-items-start">
                  <img src="https://via.placeholder.com/50x50" class="rounded-circle">
                  <div class="bg-light p-2">
                    <strong>Jane Doe</strong>
                    <p class="text-muted">Today, 10:31 AM</p>
                    <p>Hi John! How are you doing?</p>
                  </div>
                </div>
              </li>
              <li class="list-group-item receiver-message">
                <div class="d-flex align-items-start">
                  <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3">
                  <div class="bg-light p-2">
                    <strong>Jane Doe</strong>
                    <p class="text-muted">Today, 10:31 AM</p>
                    <p>Hi John! How are you doing?</p>
                  </div>
                </div>
              </li>
              <li class="list-group-item receiver-message">
                <div class="d-flex align-items-start">
                  <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3">
                  <div class="bg-light p-2">
                    <strong>Jane Doe</strong>
                    <p class="text-muted">Today, 10:31 AM</p>
                    <p>Hi John! How are you doing?</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer">
            <div class="input-group">
              <input type="text" class="form-control" id="message-input">
              <div class="input-group-append">
                <button class="btn btn-primary" id="send-message-btn">Send</button>
              </div>
            </div>
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