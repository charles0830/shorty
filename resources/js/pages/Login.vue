<template>
    <!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-primary sm:text-3xl">
                Get started today
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
                            v-bind="form.email"
                            type="email"
                            id="email"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter email"
                        />
                    </div>
                </div>

                <div>
                    <label for="password" class="text-sm font-medium"
                        >Password</label
                    >

                    <div class="relative mt-1">
                        <input
                            v-bind="form.password"
                            type="password"
                            id="password"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Enter password"
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-secondary hover:bg-primary hover:brightness-50 transition-all px-5 py-3 text-sm font-medium text-white"
                >
                    Sign In
                </button>

                <p class="text-center text-sm text-gray-400">
                    No account?
                    <router-link class="text-success" to="/signup"
                        >Sign Up</router-link
                    >
                </p>
            </form>
        </div>
    </div>
</template>

<script>
export default {
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
            console.log("proceed to login the user");
        },
    },
};
</script>

<style></style>
