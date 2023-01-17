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
                    <UrlForm />

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
                    <div class="container px-5 pt-16 mx-auto">
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

                        <!-- Url Cards -->
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -m-2"
                        >
                            <UrlCard
                                :items="items.data"
                                @destroy="destroy"
                            ></UrlCard>
                        </div>

                        <!-- Pagination -->
                        <ThePagination
                            :items="items"
                        />
                    </div>
                </section>
            </div>
        </section>
    </div>
</template>
<script>
import UrlForm from "../components/UrlForm.vue";
import UrlCard from "../components/UrlCard.vue";
import ThePagination from "../components/ThePagination.vue";

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
        /**
         * Fetch urls data from API based on page number
         * provided by Laravel pagination meta info
         * @param {int} page
         */
        fetchData(page = 1) {
            axios
                .get(`urls?page=${page}`)
                .then((res) => {
                    this.$router.replace({ query: { page: page } });
                    this.items = res.data;
                })
                .catch((err) => {
                    if (err.hasOwnProperty("response")) {
                        // Validation Errors
                        this.errors = err.response.data.errors;
                    } else {
                        // Axios/Server Errors
                        this.errors = err.message;
                        this.$notify({ type: "error", text: err.message });
                    }
                });
        },

        /**
         * Send a DELETE/PATCH request to the server
         * then remove the item from items object on success
         * @param {object} item
         */
        destroy(item) {
            if (confirm("Are you sure bruh?")) {
                // send the delete request
                axios
                    .delete(`urls/${item.short_url}`)
                    .then(() => {
                        // filter out the deleted item from "items" and display toast
                        this.items.data = this.items.data.filter(
                            (i) => i.id !== item.id
                        );
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


        // Send AJAX request to store and shorten the provided URL
        shorten(url) {
            // Store the url using axios
            this.url = url;
            axios
                .post("urls", { real_url: this.url })
                .then((res) => {
                    this.url = ""; // reset the input field
                    this.items.data.unshift(res.data); // collect shortened urls in 'items'
                    this.$notify({
                        text: "The URL shortened successfully!",
                        type: "success",
                    });
                })
                .catch((err) => {
                    if (err.hasOwnProperty("response")) {
                        // Validation Errors
                        this.errors = err.response.data.errors;
                    } else {
                        // Axios/Server Errors
                        this.errors = err.message;
                        this.$notify({ type: "error", text: err.message });
                    }
                });
        },
    },

    mounted() {
        this.fetchData(this.$route.query.page);
    },

    components: {
        UrlForm,
        UrlCard,
        ThePagination,
    },
};
</script>
<style></style>
