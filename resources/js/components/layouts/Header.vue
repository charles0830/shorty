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
                    <div v-if="loggedIn">
                        <span
                            class="whitespace-nowrap rounded-full px-2.5 py-0.5 text-sm"
                        >
                            Hi,
                            <span class="text-primary">{{
                                excerpt(user.name, 15)
                            }}</span>
                        </span>

                        <button
                            @click="logout()"
                            class="inline-flex items-center px-3 py-1 mt-4 text-white border border-white rounded hover:bg-primary hover:border-transparent focus:outline-none md:mt-0 select-none"
                        >
                            Logout
                        </button>
                    </div>
                    <div v-else class="flex items-center gap-2">
                        <router-link
                            to="/login"
                            class="inline-flex items-center px-3 py-1 mt-4 text-white border-0 rounded bg-secondary focus:outline-none hover:bg-primary md:mt-0 select-none"
                            >Login</router-link
                        >
                        <router-link
                            to="/signup"
                            class="inline-flex items-center px-3 py-1 mt-4 text-white border border-white rounded hover:bg-primary hover:border-transparent focus:outline-none md:mt-0 select-none"
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
            user: window.user,
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
