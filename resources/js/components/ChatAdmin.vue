<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <!-- @foreach ($conversations as $conversation) -->
                                        <a class="mb-2" href="#">
                                            <li class="list-group-item active">
                                                JohnDoe
                                            </li>
                                        </a>
                                    <!-- @endforeach -->
                                </ul>
                            </div>
                            <!-- @if (isset($conversationActive)) -->
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">John Doe</div>
                                        <div class="card-body">
                                            <!-- @foreach ($conversationActive->messages as $message)
                                                @if ($message->user->id == auth()->user()->id) -->
                                                    <div class="message moi">
                                                        <p>salut</p>
                                                    </div>
                                                <!-- @else -->
                                                    <div class="message toi">
                                                        <p>ca va</p>
                                                    </div>
                                                <!-- @endif
                                            @endforeach -->
                                        </div>
                                        <div class="card-footer">
                                            <!-- action="{{ route('admin.chat.store') }}" -->
                                            <form  method="post">
                                                <div class="input-group">
                                                    <input v-model="form.message" type="hidden" value="1" name="conversation_id">
                                                    <input type="text" name="message" class="form-control"
                                                        placeholder="Votre message">
                                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- @endif -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatAdmin",
        props:[''],
        data(){
            return {
                conversation:[],
                conversationActive:{},
                messages:[],
                form:{
                    message:""
                }
            }
        },
        methods: {
            sendMessage(){

            },
            changeConversation(){
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

