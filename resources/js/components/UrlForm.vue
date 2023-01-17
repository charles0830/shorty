<template>
    <form
        @submit.prevent="shorten"
        class="flex items-end justify-center w-full"
    >
        <div class="relative w-2/4 mr-4 text-left lg:w-full xl:w-1/2 md:w-full">
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
                class="w-full px-4 py-3 text-lg leading-8 transition duration-200 ease-in-out bg-gray-700 border-transparent rounded-md shadow-2xl outline-none font-medium placeholder:text-gray-400 border-y focus:border border-t-gray-600 focus:ring-2 focus:ring-primary focus:bg-transparent focus:border-primary"
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
</template>

<script>
export default {
    data() {
        return {
            url: "",
        };
    },

    methods: {
        shorten(url) {
            this.$parent.shorten(this.url);
            
            // Clear the form once the url submitted to server successfully
            // Known issue: no matter what, form get resetted
            this.url = "";
        },
    },
};
</script>
