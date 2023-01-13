<template>
    <div>
        <header class="text-gray-100 body-font">
            <div
                class="container flex flex-row flex-wrap items-center p-5 mx-auto"
            >
                <TheLogo class="flex-grow" />
                <nav
                    class="flex flex-wrap items-center justify-center text-base md:ml-auto"
                >
                    <!-- <router-link
                        to="/"
                        class="mr-6 cursor-pointer hover:text-secondary"
                        >Home</router-link
                    > -->
                </nav>

                <div class="flex items-center gap-2">
                    <span
                        class="whitespace-nowrap rounded-full px-2.5 py-0.5 text-sm"
                    >
                        Hi,
                        <span class="text-success">{{
                            excerpt("Al Nahian", 15)
                        }}</span>
                    </span>

                    <button
                        v-if="loggedIn"
                        @click="logout()"
                        class="inline-flex items-center px-3 py-1 mt-4 text-white border border-white rounded hover:bg-success hover:border-transparent focus:outline-none md:mt-0"
                    >
                        Logout
                    </button>
                    <div v-else class="flex items-center gap-2">
                        <router-link
                            to="/login"
                            class="inline-flex items-center px-3 py-1 mt-4 text-white border-0 rounded bg-secondary focus:outline-none hover:bg-primary md:mt-0"
                            >Login</router-link
                        >
                        <router-link
                            to="/signup"
                            class="inline-flex items-center px-3 py-1 mt-4 text-white border border-white rounded hover:bg-success hover:border-transparent focus:outline-none md:mt-0"
                            >Signup</router-link
                        >
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
import TheLogo from "../TheLogo.vue";

export default {
    name: "AppHeader",
    data() {
        return {
            loggedIn: window.loggedIn,
        };
    },

    methods: {
        logout() {
            axios
                .post("/logout")
                .then(() => {
                    window.location = "/";
                    this.$notify({
                        text: "Good, now go outside and touch some grass!",
                        type: "info",
                    });
                })
                .catch(() => {
                    this.$notify({
                        text: "So, you've chosen... death?",
                        type: "error",
                    });
                });
        },
    },
    components: { TheLogo },
};
</script>

<style></style>
