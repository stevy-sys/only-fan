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

// Vérifie si les notifications sont supportées par le navigateur
if ("Notification" in window) {
  // Demande la permission d'envoyer des notifications
  Notification.requestPermission().then(function (permission) {
    // Si l'utilisateur a donné la permission
    if (permission === "granted") {
      // Envoi la notification "Hello World"
      var notification = new Notification("Hello World!");
    }
  });
}

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

// en ligne
window.Echo = new Echo({
  broadcaster: "pusher",
  key: "a8d718807218ceb8b0b8",
  cluster: "mt1",
  encrypted: true,
  authEndpoint: "/broadcasting/auth",
});
