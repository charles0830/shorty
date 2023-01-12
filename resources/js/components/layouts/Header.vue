<template>
    <div>
        <header class="text-gray-100 body-font">
            <div
                class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row"
            >
                <a
                    href="/"
                    class="flex items-center mb-4 font-medium title-font text-primary md:mb-0"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-10 h-10 text-secondary"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25"
                        />
                    </svg>

                    <span class="ml-3 text-xl font-bold">Shorty</span>
                </a>
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
export default {
    name: "AppHeader",

    data() {
        return {};
    },
};
</script>

<style></style>
