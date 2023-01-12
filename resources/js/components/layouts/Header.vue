<template>
    <div>
        <header class="text-gray-100 body-font">
            <div
                class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row"
            >
                <TheLogo />
                <nav
                    class="flex flex-wrap items-center justify-center text-base md:ml-auto"
                >
                    <a href="/" class="mr-6 cursor-pointer hover:text-secondary"
                        >Home</a
                    >
                </nav>

                <div class="flex gap-2">
                    <a
                        href=""
                        class="inline-flex items-center px-3 py-1 mt-4 text-white border-0 rounded bg-secondary focus:outline-none hover:bg-primary md:mt-0"
                    >
                        Login
                    </a>

                    <a
                        href=""
                        class="inline-flex items-center px-3 py-1 mt-4 text-white border border-white rounded hover:bg-secondary hover:border-transparent focus:outline-none md:mt-0"
                    >
                        Signup
                    </a>
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
        return {};
    },
    components: { TheLogo },
};
</script>

<style></style>
