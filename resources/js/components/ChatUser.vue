<template>
    <!-- <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-lg-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white" style="background-color: #ff00ff !important;" >
                        Sallon de discussion
                    </div>
                    <div class="card-body" id="chat-body" style="overflow-y: scroll; max-height: 300px;" ref="chatBody">
                        <ul class="list-group" id="chat-box">
                            <div v-for="(message, index) in myConversation.messages" :key="index">
                                <li class="list-group-item" :class="message.user_id != auth ? 'sender-message' : 'receiver-message'">
                                    <div class="d-flex align-items-start">
                                        <div class="text-black p-2">
                                            <strong>{{ message.user.name}}</strong>
                                            <p class="text-muted">{{ message.created_at }}</p>
                                            <p>{{ message.message }}</p>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form @submit.prevent="sendMessage()" method="post">
                            <div class="input-group">
                                <input type="text" v-model="form.message" class="form-control" name="message" id="message-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="send-message-btn" style="background-color: #ff00ff !important; border-color: #ff00ff; ">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <ul class="list-group">
                                    <a @click="changeConversation(conversation)" v-for="(conversation, index) in conversations" :key="index" class="mb-2" href="#">
                                        <li class="list-group-item active">
                                            {{conversation.talked.user.name}}
                                        </li>
                                    </a>
                                </ul>
                            </div> -->
                            <div class="col-md-8">
                                <div class="card">
                                    <!-- <div class="card-header">{{conversationActive.talked.user.name}}</div> -->
                                    <div class="card-body" ref="messageList">
                                        <div v-for="(message, i) in myConversation.messages" :key="i">
                                            <div class="message" :class="message.user_id == auth ? 'moi' : 'toi'">
                                                <p>{{message.message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <form @submit.prevent="sendMessage()" method="post">
                                            <div class="input-group">
                                                <input v-model="form.message" type="text" name="message" class="form-control"
                                                    placeholder="Votre message">
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
</template>

<script>
// <!-- <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3">  -->
    export default {
        name:"ChatUser",
        props:['conversation','auth'],
        data(){
            return {
                myConversation:[],
                form:{
                    message:""
                }
            }
        },
        methods: {
            sendMessage(){
                let data = {
                    conversation_id:this.conversation.id,
                    message:this.form.message
                }
                axios.post('/en/chat',data)
                .then((res) => {
                    console.log(res)
                    if (res.data.message) {
                        this.myConversation.messages.push(res.data.message) 
                        this.form.message = ""
                        this.$nextTick(() => {
                            this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
                        });
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            }
        },
        mounted() {
            this.myConversation = this.conversation
            window.Echo.private(`ChannelChat.${this.auth}`).listen("ChatChannel", ({ data }) => {
                this.myConversation.messages.push(data)
                this.$nextTick(() => {
                    this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
                });
            });
            this.$nextTick(() => {
                this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
            });
        }
    }
</script>
