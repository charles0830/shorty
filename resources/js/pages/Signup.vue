<template>
    <div>
        <section>
            <main
                aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6"
            >
                <div class="max-w-xl">
                    <h1
                        class="mt-6 text-2xl font-bold text-primary sm:text-3xl md:text-4xl"
                    >
                        Join Shorty,
                        <span class="text-secondary">Save Time</span>
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-300">
                        Don't think about it, do it!
                    </p>

                    <form
                        @submit.prevent="signup"
                        class="mt-8 grid grid-cols-6 gap-6"
                    >
                        <div class="col-span-6">
                            <label
                                for="Name"
                                class="block text-md font-medium text-gray-300"
                            >
                                Name
                            </label>

                            <input
                                type="text"
                                id="Name"
                                name="name"
                                v-model="form.name"
                                class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-md text-gray-300 shadow-sm"
                                placeholder="Otwell You"
                                required
                            />
                        </div>

                        <div class="col-span-6">
                            <label
                                for="Email"
                                class="block text-md font-medium text-gray-300"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                id="Email"
                                name="email"
                                v-model="form.email"
                                class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-md text-gray-300 shadow-sm"
                                placeholder="example@mail.com"
                                required
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label
                                for="Password"
                                class="block text-md font-medium text-gray-300"
                            >
                                Password
                            </label>

                            <input
                                type="password"
                                id="Password"
                                name="password"
                                v-model="form.password"
                                class="mt-1 w-full rounded-md border-t-gray-500 border-transparent bg-gray-700 text-md text-gray-300 shadow-sm"
                                placeholder="********"
                                required
                            />
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

                        <div
                            class="col-span-6 sm:flex sm:items-center sm:gap-4"
                        >
                            <button
                                class="inline-block shrink-0 rounded-md border border-primary bg-primary shadow-lg shadow-primary/30 px-12 py-3 text-md font-medium text-white transition hover:bg-transparent hover:text-primary focus:outline-none focus:ring active:text-primary"
                            >
                                Create an Account
                            </button>

                            <p class="mt-4 text-md text-gray-500 sm:mt-0">
                                Already have an account?
                                <router-link
                                    to="/login"
                                    class="text-gray-300 underline"
                                    >Login</router-link
                                >
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </section>
    </div>
</template>

<script>
export default {
    middleware: "guest",
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
        };
    },

    methods: {
        signup() {
            axios
                .post("/signup", this.form)
                .then(() => {
                    // First redirect then notify
                    window.location = "/";
                    this.$notify({
                        text: "Welcome! Thanks for being with us",
                        type: "success",
                    });
                })
                .catch((err) => {
                    // Display an error from the message bag
                    console.log();
                    this.$notify({
                        text: err.response.data.message,
                        type: "error",
                    });
                });
        },
    },
};
</script>

<style></style>
