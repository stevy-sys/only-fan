window._ = require("lodash");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";
window.Pusher = require("pusher-js");
// window.Echo = new Echo({
//     broadcaster: "pusher",
//     host:'127.0.0.1',
//     wsHost: '127.0.0.1',
//     wsPort: 6001,
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     enabledTransports: ['ws', 'wss'],
//     forceTLS: false,
//     disableStats: false,
// });

window.Echo = new Echo({
  broadcaster: "pusher",
  key: "a8d718807218ceb8b0b8",
  cluster: "mt1",
  encrypted: true,
  authEndpoint: "/broadcasting/auth",
  // auth: {
  //     headers: {
  //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  //     },
  // },
  // private: function(channelName) {
  //   return {
  //       channel: channelName,
  //       key: "5ae708df4426e2dabe9e",
  //       cluster: "PUSHER_APP_CLUSTER",
  //       encrypted: true,
  //   };
  // },
  // presence: function(channelName) {
  //   var userId = channelName.split(".")[1];
  //   return {
  //       channel: channelName,
  //       key: "5ae708df4426e2dabe9e",
  //       cluster: "PUSHER_APP_CLUSTER",
  //       encrypted: userId,
  //       user: {
  //           id: userId,
  //           info: {
  //               name: "USER_NAME",
  //           },
  //       },
  //   };
  // },
});
