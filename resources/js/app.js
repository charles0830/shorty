/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";
import router from "./router";

import App from "./App.vue";
import Notifications from "@kyvg/vue3-notification";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp(App);

app.use(Notifications);
app.use(router);

// Make the excerpt method available globally
app.mixin({
    methods: {
        excerpt(str, limit = 37) {
            return str.length > limit ? str.slice(0, limit) + "..." : str;
        },

        // return the shortened url code with base url joined
        pretty_url(short_url) {
            return `${window.location.origin}/u/${short_url}`;
        },
    },
});

app.mount("#app");

/* 
TODO: Form validation for signup and login 
*/
