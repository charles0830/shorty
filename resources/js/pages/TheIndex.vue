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
                        <span class="text-success">loooooong</span> URLs like
                        never before!
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Copy the boring long url, Paste it here then 💥 Feel
                        free to
                        <a href="" class="font-semibold text-secondary"
                            >Signup</a
                        >
                        and manage all your links now. It's free!
                    </p>

                    <!-- Quick Shortener Form -->
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
                    v-if="items.length > 0"
                    class="text-gray-600 body-font"
                >
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col w-full mb-10 text-center">
                            <h2
                                class="mb-4 text-2xl font-bold text-success sm:text-5xl title-font"
                            >
                                Hoho!
                            </h2>
                            <p
                                class="mx-auto leading-relaxed text-gray-300 lg:w-2/3"
                            >
                                Here are your shortened URLs! Remember, these
                                are temporarily shown here. Create an account to
                                manage and see the analytics of your shortened
                                URLs.
                            </p>
                        </div>
                        <div class="flex flex-wrap -m-2">
                            <div
                                v-for="item in items"
                                class="w-full p-2 lg:w-1/3 md:w-1/2"
                            >
                                <div
                                    class="flex items-center h-full p-4 break-all transition-all bg-gray-500 rounded-lg shadow-lg cursor-pointer hover:bg-gray-800 hover:bg-opacity-20 bg-opacity-20 backdrop-blur-sm"
                                >
                                    <div class="flex-grow">
                                        <a :href="item.real_url"
                                            ><h2
                                                class="font-medium text-secondary title-font"
                                            >
                                                {{ excerpt(item.real_url) }}
                                            </h2></a
                                        >
                                        <a
                                            :href="item.short_url"
                                            target="_blank"
                                            class="flex items-start gap-2 my-3"
                                        >
                                            <p
                                                class="font-bold leading-3 text-gray-200"
                                            >
                                                {{ item.short_url }}
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
                                                class="flex flex-shrink-0 gap-2 font-medium text-right text-gray-500 talic space-bet"
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

                                                    <strong>{{
                                                        item.visits
                                                    }}</strong>
                                                </span>
                                                {{ item.created_at }}
                                            </p>

                                            <!-- Delete button -->
                                            <button
                                                @click="destroy(item)"
                                                class="p-1 text-center transition rounded hover:bg-gray-700"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-6 h-6 text-red-600"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: "Index",
    data() {
        return {
            url: "",
            errors: {},
            items: [],
        };
    },

    props: {},

    methods: {
        shorten() {
            // Store the url using axios
            axios
                .post("api/urls", { real_url: this.url })
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

        fetchData() {
            axios
                .get("api/urls")
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
                    .delete(`api/urls/${item.short_url}`)
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

        excerpt(str, limit = 37) {
            return str.length > limit ? str.slice(0, limit) + "..." : str;
        },
    },

    computed: {},

    mounted() {
        this.fetchData();
    },
};
</script>
<style></style>
