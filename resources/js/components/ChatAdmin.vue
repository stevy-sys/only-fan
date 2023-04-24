<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <div class="" style="height: calc(100vh - 56px);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <a @click="changeConversation(conversation)" v-for="(conversation, index) in conversations" :key="index" class="mb-2" href="#">
                                        <li class="list-group-item active">
                                            {{conversation.talked.user.name}}
                                        </li>
                                    </a>
                                </ul>
                            </div>
                                <div v-if="conversationActive" class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{conversationActive.talked.user.name}}</div>
                                        <div class="card-body" ref="messageList">
                                            <div v-for="(message, i) in conversationActive.messages" :key="i">
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
    export default {
        name: "ChatAdmin",
        props:['conversations','auth'],
        data(){
            return {
                conversation:[],
                conversationActive:null,
                messages:[],
                form:{
                    message:""
                }
            }
        },
        methods: {
            sendMessage(){
                let data = {
                    conversation_id:this.conversationActive.id,
                    message:this.form.message
                }
                axios.post('/admin/conversation',data)
                .then((res) => {
                    if (res.data.message) {
                        this.conversationActive.messages.push(res.data.message) 
                        this.form.message = ""
                        this.$nextTick(() => {
                            this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
                        });
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },
            changeConversation(conversation){
                axios.get('/admin/conversation?conversation='+conversation.id)
                .then((res) => {
                    this.conversationActive =  res.data.conversationActive
                    this.$nextTick(() => {
                        this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
            },
        },
        mounted() {
            window.Echo.private(`ChannelChat.${this.auth}`).listen("ChatChannel", ({ data }) => {
                if (this.conversationActive.messages) {
                    this.conversationActive.messages.push(data)
                    this.$nextTick(() => {
                        this.$refs.messageList.lastChild.scrollIntoView({ behavior: 'smooth' });
                    });
                }
            });
        }
    }
</script>

