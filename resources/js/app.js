// import './bootstrap';
// import { createApp } from 'vue';

// const app = createApp({});
// import BroadcasterAdmin from './components/BroadcasterAdmin.vue';
// import ViewerUser from './components/ViewerUser.vue';
// app.component('broadcaster-admin', BroadcasterAdmin);
// app.component('viewer-user', ViewerUser);
// console.log(app)
// app.mount('#app');


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );
Vue.component("broadcaster-admin", require("./components/BroadcasterAdmin.vue").default);
Vue.component("viewer-user", require("./components/ViewerUser.vue").default);
Vue.component("edit-texte", require("./components/EditTexte.vue").default);
Vue.component("chat-admin", require("./components/ChatAdmin.vue").default);
Vue.component("chat-user", require("./components/ChatUser.vue").default);

//  Streaming Components
// Vue.component("broadcaster", require("./components/Broadcaster.vue").default);
// Vue.component("viewer", require("./components/Viewer.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
