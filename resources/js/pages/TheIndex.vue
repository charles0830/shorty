<template>
    <div>
        <section class="text-gray-200 body-font">
            <div
                class="container flex flex-col items-center justify-center px-5 py-24 mx-auto"
            >
                <!-- Intro -->
                <div
                    class="flex flex-col items-center w-full text-center md:w-2/3"
                >
                    <h1
                        class="mb-4 text-3xl font-bold title-font sm:text-6xl text-secondary"
                    >
                        Shorten your
                        <span class="text-primary">loooooong</span> URLs like
                        never before!
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Copy your long boring url. Paste it below. Then 💥 You
                        got it, right?
                    </p>

                    <!-- URL Shortener Form -->
                    <form
                        @submit.prevent="shorten"
                        class="flex items-end justify-center w-full"
                    >
                        <div
                            class="relative w-2/4 mr-4 text-left lg:w-full xl:w-1/2 md:w-full"
                        >
                            <label
                                for="long-url"
                                class="text-sm font-semibold leading-10 text-gray-200"
                                >Your long Url</label
                            >
                            <input
                                type="url"
                                required
                                id="long-url"
                                name="url"
                                v-model="url"
                                class="w-full px-4 py-3 text-lg leading-8 transition duration-200 ease-in-out bg-gray-700 border-transparent rounded-md shadow-2xl outline-none placeholder:text-gray-400 border-y focus:border border-t-gray-600 focus:ring-2 focus:ring-primary focus:bg-transparent focus:border-primary"
                                placeholder="https://yoursite.com/this-is-a-very-large-url-but-boring-and-it-stinks-yaak?query=true&isItFun=false"
                            />
                        </div>

                        <button
                            type="submit"
                            class="inline-flex flex-shrink-0 px-6 py-4 text-lg font-semibold text-white transition border-0 rounded bg-secondary focus:outline-none hover:bg-secondary hover:brightness-50"
                        >
                            Shorten URL
                        </button>
                    </form>

                    <p
                        v-if="errors.real_url"
                        v-for="error in errors.real_url"
                        class="w-full my-4 font-semibold text-md text-secondary animate-pulse"
                    >
                        {{ error }}
                    </p>

                    <p class="w-full mt-2 mb-8 text-sm text-gray-400">
                        Vue & Laravel powered URL shortener ✨
                    </p>
                </div>

                <!-- The result -->
                <section
                    v-if="items.data.length > 0"
                    class="text-gray-600 body-font"
                >
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col w-full mb-10 text-center">
                            <h2
                                class="mb-4 text-2xl font-bold text-primary sm:text-5xl title-font"
                            >
                                Hoho!
                            </h2>
                            <p
                                class="mx-auto leading-relaxed text-gray-300 lg:w-2/3"
                            >
                                Here are your shortened URLs! Now start
                                rick-rolling your friends 😆
                            </p>
                        </div>
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -m-2"
                        >
                            <div v-for="item in items.data" class="w-full p-2">
                                <div
                                    class="flex items-center h-full p-4 break-all transition-all bg-gray-500 rounded-lg shadow-lg cursor-auto hover:bg-gray-800 hover:bg-opacity-20 bg-opacity-20 backdrop-blur-sm"
                                >
                                    <div class="flex-grow">
                                        <a :href="item.real_url"
                                            ><h2
                                                class="font-medium text-gray-200 title-font"
                                            >
                                                {{ excerpt(item.real_url) }}
                                            </h2></a
                                        >
                                        <a
                                            :href="pretty_url(item.short_url)"
                                            target="_blank"
                                            class="flex items-center gap-2 my-3"
                                        >
                                            <p
                                                class="font-bold leading-6 text-primary"
                                            >
                                                {{ pretty_url(item.short_url) }}
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
                                            class="flex items-center justify-between gap-3 mt-4"
                                        >
                                            <!-- Meta -->
                                            <p
                                                class="flex flex-shrink-0 gap-2 font-medium text-right text-gray-500 italic space-between items-center"
                                            >
                                                <!-- Copy To Clipboard button -->
                                                <CopyToClipboard
                                                    @click="
                                                        copyToClipboard(
                                                            pretty_url(
                                                                item.short_url
                                                            )
                                                        )
                                                    "
                                                ></CopyToClipboard>

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

                                                    <strong>{{
                                                        item.visits.toLocaleString()
                                                    }}</strong>
                                                </span>
                                                {{ item.created_at }}
                                            </p>

                                            <!-- Delete button -->
                                            <DeleteUrl
                                                @click="destroy(item)"
                                            ></DeleteUrl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="my-4">
                            <ol
                                class="flex justify-center items-center gap-3 text-sm text-gray-300 font-semibold"
                            >
                                <!-- Previous Button -->
                                <li>
                                    <button
                                        @click="prev"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded border-transparent"
                                        :class="[
                                            items.current_page === 1
                                                ? 'text-white border-primary bg-primary'
                                                : 'border-y-gray-500 border-y bg-gray-700',
                                        ]"
                                    >
                                        <span class="sr-only">Prev Page</span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-3 w-3"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </li>
                                <li><p class="text-gray-300">Page {{ items.current_page }} of {{ items.last_page }}</p></li>

                                <!-- Next Button -->
                                <li>
                                    <button
                                        @click="next"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded border-transparent"
                                        :class="[
                                            items.current_page ===
                                            items.last_page
                                                ? 'text-white border-primary bg-primary'
                                                : 'border-y-gray-500 border-y bg-gray-700',
                                        ]"
                                    >
                                        <span class="sr-only">Next Page</span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-3 w-3"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </li>
                            </ol>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</template>
<script>
import CopyToClipboard from "../components/buttons/CopyToClipBoard.vue";
import DeleteUrl from "../components/buttons/DeleteUrl.vue";
export default {
    middleware: "auth",

    name: "Index",
    data() {
        return {
            url: "",
            errors: {},
            items: {
                data: [],
            },
        };
    },

    props: {},

    methods: {
        fetchData(page = 1) {
            axios
                .get(`urls?page=${page}`)
                .then((res) => {
                    this.items = res.data;
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },

        destroy(item) {
            if (confirm("Are you sure bruh?")) {
                // send the delete request
                axios
                    .delete(`urls/${item.short_url}`)
                    .then(() => {
                        // filter out the deleted item from "items" and display toast
                        this.items = this.items.filter((i) => i.id !== item.id);
                        this.$notify({
                            text: "The shortened URL has been deleted!",
                        });
                    })
                    .catch((err) => {
                        if (err.hasOwnProperty("message")) {
                            this.$notify({
                                text: err.message,
                                type: "error",
                            });
                        } else {
                            this.$notify({
                                text: "Hmmm...Something went fishy!",
                                type: "error",
                            });
                        }
                    });
            }
        },

        next() {
            let nextPage = this.items.current_page + 1;

            // Don't do anything if the user is already on the last page
            if (this.items.current_page === this.items.last_page) return false;

            this.fetchData(nextPage);

            return true;
        },

        prev() {
            let prevPage = this.items.current_page - 1;

            // Don't do anything if the user is already on the first page
            if (this.items.current_page === 0) return false;

            this.fetchData(prevPage);

            return true;
        },

        shorten() {
            // Store the url using axios
            axios
                .post("urls", { real_url: this.url })
                .then((res) => {
                    this.url = ""; // reset the input field
                    this.items.unshift(res.data); // collect shortened urls in 'items'
                    this.$notify({
                        text: "The URL shortened successfully!",
                        type: "success",
                    });
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },

        copyToClipboard(text) {
            return navigator.clipboard.writeText(text)
                ? this.$notify("Short URL copied to clipboard")
                : this.$notify("Oh the misery! Everybody wants to be my enemy");
        },
    },

    computed: {},

    mounted() {
        this.fetchData();
    },

    components: {
        CopyToClipboard,
        DeleteUrl,
    },
};
</script>
<style></style>
