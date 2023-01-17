<template>
    <div v-for="item in items" class="w-full p-2">
        <div
            class="flex items-center h-full p-4 break-all transition-all bg-gray-500 rounded-lg shadow-lg cursor-auto hover:bg-gray-800 hover:bg-opacity-20 bg-opacity-20 backdrop-blur-sm"
        >
            <div class="flex-grow">
                <a :href="item.real_url"
                    ><h2 class="font-medium text-gray-200 title-font">
                        <span class="hidden md:block">
                            {{
                                // hidden on small screens
                                excerpt(item.real_url, 29)
                            }}
                        </span>
                        <span class="md:hidden">
                            {{
                                // visible on small screens
                                excerpt(item.real_url)
                            }}
                        </span>
                    </h2></a
                >
                <a
                    :href="prettyUrl(item.short_url)"
                    target="_blank"
                    class="flex items-center gap-2 my-3"
                >
                    <p class="font-bold leading-6 text-primary">
                        {{ freshUrl(prettyUrl(item.short_url)) }}
                    </p>
                    <span
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-4 h-4 text-secondary"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
                            />
                        </svg>
                    </span>
                </a>

                <div
                    class="flex items-center justify-between gap-3 mt-4 flex-wrap"
                >
                    <!-- Meta -->
                    <p
                        class="flex flex-shrink-0 gap-2 font-medium text-right text-gray-500 italic space-between items-center"
                    >
                        <span
                            v-if="item.visits > 0"
                            class="flex gap-1 pr-2 border-r border-r-gray-700"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>

                            <strong>{{ item.visits.toLocaleString() }}</strong>
                        </span>
                        {{ item.created_at }}
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-1">
                        <!-- Copy To Clipboard button -->
                        <CopyToClipboard
                            @click="copyToClipboard(prettyUrl(item.short_url))"
                        ></CopyToClipboard>

                        <!-- Delete button -->
                        <DeleteUrl @click="destroy(item)"></DeleteUrl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CopyToClipboard from "../components/buttons/CopyToClipBoard.vue";
import DeleteUrl from "../components/buttons/DeleteUrl.vue";
export default {
    name: "Url Card",

    props: {
        items: { type: Array },
    },

    emits: ["destroy"],

    methods: {
        destroy(item) {
            this.$emit("destroy", item);
        },
    },

    components: {
        CopyToClipboard,
        DeleteUrl,
    },
};
</script>
<style lang=""></style>
