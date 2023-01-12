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
                                class="text-sm leading-10 text-gray-200"
                                >Your long Url</label
                            >
                            <input
                                type="url"
                                required
                                id="long-url"
                                name="url"
                                v-model="url"
                                class="w-full px-4 py-3 text-lg leading-8 text-gray-100 transition-colors duration-200 ease-in-out bg-gray-700 border-transparent rounded-md shadow-2xl outline-none border-y focus:border border-t-gray-600 focus:ring-2 focus:ring-primary focus:bg-transparent focus:border-primary"
                                placeholder="https://yoursite.com/this-is-a-very-large-url-but-boring-and-it-stinks-yaak?query=true&isItFun=false"
                            />
                        </div>

                        <button
                            type="submit"
                            class="inline-flex px-6 py-4 text-lg font-semibold text-white border-0 rounded bg-secondary focus:outline-none hover:bg-secondary"
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
                        <div class="flex flex-col w-full mb-20 text-center">
                            <h2
                                class="mb-4 text-2xl font-bold text-success sm:text-5xl title-font"
                            >
                                Hoho!
                            </h2>
                            <p
                                class="mx-auto leading-relaxed text-gray-300 lg:w-2/3"
                            >
                                Here is your shortened urls. Remember, these are
                                temporarily shown here. Create an account to
                                manage and see the analytics of your shortened
                                urls.
                            </p>
                        </div>
                        <div class="flex flex-wrap -m-2">
                            <div
                                v-for="item in items"
                                class="w-full p-2 lg:w-1/3 md:w-1/2"
                            >
                                <div
                                    class="flex items-center h-full p-4 border border-gray-200 rounded-lg"
                                >
                                    <div class="flex-grow">
                                        <h2
                                            class="font-medium text-secondary title-font"
                                        >
                                            {{ excerpt(item.real_url) }}
                                        </h2>
                                        <p class="text-gray-500">
                                            {{ item.short_url }}
                                        </p>
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
                    this.items.push(res.data); // collect shortened urls in 'items'
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                });
        },

        excerpt(str, limit = 37) {
            return str.length > limit ? str.slice(0, limit) + "..." : str;
        },
    },

    computed: {},

    mounted() {
        
    },
};
</script>
<style></style>
