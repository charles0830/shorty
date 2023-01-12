<template>
    <div>
        <footer class="text-primary body-font">
            <div
                class="container flex flex-col items-center px-5 py-8 mx-auto sm:flex-row"
            >
                <TheLogo />
                <p
                    class="mt-4 text-sm text-white sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0"
                >
                    © {{ thisYear }} {{ APP_NAME }} —
                    <a
                        href="https://github.com/alnahian2003"
                        class="ml-1 text-secondary"
                        rel="noopener noreferrer"
                        target="_blank"
                        >@alnahian2003</a
                    >
                </p>
                <span
                    class="inline-flex justify-center mt-4 sm:ml-auto sm:mt-0 sm:justify-start"
                >
                    <a class="text-white">
                        <svg
                            fill="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                            ></path>
                        </svg>
                    </a>
                    <a class="ml-3 text-white">
                        <svg
                            fill="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                            ></path>
                        </svg>
                    </a>
                </span>
            </div>
        </footer>
    </div>
</template>

<script>
import TheLogo from "../TheLogo.vue";

export default {
    name: "AppFooter",
    data() {
        return {
            APP_NAME: "Shorty",
        };
    },
    computed: {
        thisYear() {
            return new Date().getFullYear();
        },
    },
    components: { TheLogo },
};
</script>

<style></style>
