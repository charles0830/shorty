import { createRouter, createWebHistory } from "vue-router";
import TheIndex from "../pages/TheIndex.vue";
import Login from "../pages/Login.vue";
import Signup from "../pages/Signup.vue";

const routes = [
    {
        path: "/",
        name: "TheIndex",
        component: TheIndex,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/signup",
        name: "Signup",
        component: Signup,
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
