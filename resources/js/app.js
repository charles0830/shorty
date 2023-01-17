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
        /**
         * Returns limited length of strings that ends with '...'
         * @param {string} str
         * @param {int} limit
         * @returns {string} "lorem ipsum dolor sit..."
         */
        excerpt(str, limit = 37) {
            return str.length > limit ? str.slice(0, limit) + "..." : str;
        },

        /**
         * Return the shortened url code with base url joined
         * @param {string} shortUrl
         * @returns {string} http://shorty.test/u/{shortUrl}
         */
        prettyUrl(shortUrl) {
            return `${window.location.origin}/u/${shortUrl}`;
        },

        /**
         * Removes 'https://', 'http://', 'ftp://' etc protocol from a URL
         * @param {string} urlWithProtocol
         * @returns {string} example.com
         */
        freshUrl(urlWithProtocol) {
            return urlWithProtocol.replace(/(^\w+:|^)\/\//, "");
        },

        /**
         * Copies a provided text to user clipboard. But this
         * requires clipboard access from browser.
         * @param {string} text
         */
        copyToClipboard(text) {
            return navigator.clipboard.writeText(text)
                ? this.$notify("Short URL copied to clipboard")
                : this.$notify("Oh the misery! Everybody wants to be my enemy");
        },
    },
});

app.mount("#app");

/* 
TODO: Form validation for signup and login 
*/
