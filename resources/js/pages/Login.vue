<template>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1
                class="text-center text-2xl font-bold text-secondary sm:text-4xl"
            >
                Get <span class="text-primary">Started</span> Today
            </h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-300">
                Hey 👋🏼 buddy! Listen, login to your account now so that you can
                manage all your shorten links more securly!
            </p>

            <form
                @submit.prevent="login"
                class="mt-6 mb-0 space-y-4 rounded-lg p-8 shadow-2xl bg-gray-800"
            >
                <div>
                    <label for="email" class="text-sm font-medium">Email</label>

                    <div class="relative mt-1">
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-lg text-gray-300 shadow-sm"
                            placeholder="Enter email"
                            required
                        />
                    </div>
                </div>

                <div>
                    <label for="password" class="text-sm font-medium"
                        >Password</label
                    >

                    <div class="relative mt-1">
                        <input
                            v-model="form.password"
                            type="password"
                            id="password"
                            class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-lg text-gray-300 shadow-sm"
                            placeholder="Enter password"
                            required
                        />
                    </div>
                </div>

                <router-link
                    class="text-primary font-semibold block text-right hover:underline"
                    :to="{ name: 'ForgotPassword' }"
                    >Forgot Password?</router-link
                >

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-primary hover:bg-secondary transition-all px-5 py-3 text-lg font-medium text-white"
                >
                    Sign In
                </button>

                <p class="text-center text-sm text-gray-400">
                    No account?
                    <router-link class="text-primary" to="/signup"
                        >Sign Up</router-link
                    >
                </p>
            </form>
        </div>
    </div>
</template>

<script type="js">
export default {
    middleware: "guest",
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
        };
    },

    methods: {
        login() {
            axios
                .post("/login", this.form)
                .then(() => {
                    // First redirect then notify
                    window.location = "/";
                    this.$notify({
                        text: "Great! Welcome Back 👋🏼",
                        type: "success",
                    });
                })
                .catch(() => {
                    this.$notify({
                        text: "Something went wrong!",
                        type: "error",
                    });
                });
        },
    },
};
</script>

<style></style>
