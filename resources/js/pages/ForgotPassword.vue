<template>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1
                class="text-center text-2xl font-bold text-secondary sm:text-4xl"
            >
                Forgot Your <span class="text-primary">Password?</span>
            </h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-300">
                Don't worry, we got you! It won't take more than five minutes to
                recover your account. Trust me bro 🙏🏼
            </p>

            <form
                @submit.prevent="resetPassword"
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
                            placeholder="Enter your email address"
                            required
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-primary active:opacity-50 hover:bg-secondary transition-all px-5 py-3 text-lg font-medium text-white"
                >
                    Send Password Reset Link
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

<script>
export default {
    middleware: "guest",
    data() {
        return {
            form: {
                email: "",
            },

            errors: [],
        };
    },
    methods: {
        resetPassword() {
            axios
                .post("/password/email", this.form)
                .then((res) => {
                    this.$notify({
                        type: "success",
                        text: res.data.message,
                    });
                })
                .catch((err) => {
                    this.$notify({
                        type: "error",
                        text: err.response.data.message,
                    });
                });
        },
    },
};
</script>
