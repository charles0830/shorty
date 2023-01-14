<template>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1
                class="text-center text-2xl font-bold text-secondary sm:text-4xl"
            >
                Get <span class="text-primary">Started</span> Today
            </h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-300">
                You're almost there! Now set a new password for your account 🔑
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
                            placeholder="Enter email"
                            disabled
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

                <div class="col-span-6 sm:col-span-3">
                    <label
                        for="PasswordConfirmation"
                        class="block text-md font-medium text-gray-300"
                    >
                        Password Confirmation
                    </label>

                    <input
                        type="password"
                        id="PasswordConfirmation"
                        name="password_confirmation"
                        v-model="form.password_confirmation"
                        class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-md text-gray-300 shadow-sm"
                        placeholder="********"
                        required
                    />
                </div>

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-primary hover:bg-secondary transition-all px-5 py-3 text-lg font-medium text-white"
                >
                    Reset Password
                </button>
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
                password: "",
                password_confirmation: "",
                token: "",
            },
        };
    },

    mounted() {
        this.form.email = this.$route.query.email;
        this.form.token = this.$route.params.token;
    },

    methods: {
        resetPassword() {
            axios
                .post("/reset-password", this.form)
                .then((res) => {
                    this.$notify({
                        text: "Your password reset successfully!",
                        type: "success",
                    });
                    window.location = "/";
                })
                .catch((err) => {
                    this.$notify({
                        text: err.response.data.message,
                        type: "error",
                    });
                });
        },
    },
};
</script>
