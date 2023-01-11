<template>
    <div>
        <header class="text-gray-100 body-font">
            <div
                class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center"
            >
                <a
                    class="flex title-font font-medium items-center text-primary mb-4 md:mb-0"
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
                    class="md:ml-auto flex flex-wrap items-center text-base justify-center"
                >
                    <a class="mr-6 hover:text-secondary cursor-pointer"
                        >First Link</a
                    >
                </nav>

                <div class="flex gap-2">
                    <a
                        href=""
                        class="inline-flex items-center bg-secondary border-0 py-1 px-3 focus:outline-none hover:bg-primary rounded text-white mt-4 md:mt-0"
                    >
                        Login
                    </a>

                    <a
                        href=""
                        class="inline-flex items-center border border-white hover:bg-secondary hover:border-transparent py-1 px-3 focus:outline-none rounded text-white mt-4 md:mt-0"
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
