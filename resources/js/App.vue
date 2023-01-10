<template>
    <div>
        <AppHeader></AppHeader>
        <main class="min-h-screen"></main>
        <AppFooter></AppFooter>
    </div>
</template>
<script>
import AppHeader from "./components/layouts/Header.vue";
import AppFooter from "./components/layouts/Footer.vue";

export default {
    data() {
        return {};
    },

    components: { AppHeader, AppFooter },
};
</script>
<style></style>
