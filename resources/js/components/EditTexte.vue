<template>
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bio</div>

                    <div class="card-body">
                        <vue-editor v-model="form.bio" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.chat_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat description</div>

                    <div class="card-body">
                        <vue-editor v-model="form.chat_description" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Live title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.live_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">live 1 description</div>

                    <div class="card-body">
                        <vue-editor v-model="form.live1_description" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">live 2 description</div>

                    <div class="card-body">
                        <vue-editor v-model="form.live2_description" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Boutique title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.boutique_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Boutique 1 description</div>

                    <div class="card-body">
                        <vue-editor v-model="form.boutique1_description" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Boutique 2 description</div>

                    <div class="card-body">
                        <vue-editor v-model="form.boutique2_description" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Abonnee title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.abonnee_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Storie title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.storie_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gallerie title</div>

                    <div class="card-body">
                        <vue-editor v-model="form.gallerie_title" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Avantage token</div>

                    <div class="card-body">
                        <vue-editor v-model="form.token_avantage" ></vue-editor>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <button @click="update()" class="btn btn-primary">
                update
            </button>
        </div>
    </div>
</template>

<script>
import { VueEditor } from 'vue2-editor'
export default {
    name: "EditTexte",
    props:['url','data'],
    components: {
        VueEditor
    },
    data() {
        return {
            form :{
                bio: this.data.bio,
                chat_title: this.data.chat_title,
                chat_description: this.data.chat_description,
                live_title: this.data.live_title,
                live1_description: this.data.live1_description,
                live2_description: this.data.live2_description,
                boutique_title: this.data.boutique_title,
                boutique1_description: this.data.boutique1_description,
                boutique2_description: this.data.boutique2_description,
                storie_title: this.data.storie_title,
                abonnee_title: this.data.abonnee_title,
                gallerie_title: this.data.gallerie_title,
                token_avantage:this.data.token_avantage
            }
          
        }
    },
    methods: {
        update(){
            axios.post(this.url, this.form)
            .then((res) => {
                if (res.data.message) {
                    alert('texte modifier avec success')
                }
            })
            .catch((err) => {
              console.log(err);
            });
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style>
#app {
    font-family: Delicious, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    /* text-align: center; */
    color: #2c3e50;
    margin-top: 60px;
}
</style>