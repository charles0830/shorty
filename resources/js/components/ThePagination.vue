<template>
    <div class="my-8" v-if="items.last_page > 1">
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
            <li>
                <p class="text-gray-300">
                    Page {{ items.current_page }} of
                    {{ items.last_page }}
                </p>
            </li>

            <!-- Next Button -->
            <li>
                <button
                    @click="next"
                    class="inline-flex h-8 w-8 items-center justify-center rounded border-transparent"
                    :class="[
                        items.current_page === items.last_page
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
</template>
<script>
export default {
    props: {
        items: {
            type: Object,
        },
    },

    methods: {
        // Paginate to next page
        next() {
            let nextPage = this.items.current_page + 1;

            // Don't do anything if the user is already on the last page
            if (this.items.current_page === this.items.last_page) return false;

            this.$parent.fetchData(nextPage);

            return true;
        },

        // Return to previous page
        prev() {
            let prevPage = this.items.current_page - 1;

            // Don't do anything if the user is already on the first page
            if (this.items.current_page === 1) return false;

            this.$parent.fetchData(prevPage);

            return true;
        },
    },
};
</script>
