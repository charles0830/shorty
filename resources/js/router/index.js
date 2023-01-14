import { createRouter, createWebHistory } from "vue-router";
import TheIndex from "../pages/TheIndex.vue";
import Login from "../pages/Login.vue";
import Signup from "../pages/Signup.vue";
import ForgotPassword from "../pages/ForgotPassword.vue";
import ResetPassword from "../pages/ResetPassword.vue";
import NotFound from "../pages/404.vue";

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
    {
        path: "/forgot-password",
        name: "ForgotPassword",
        component: ForgotPassword,
    },
    {
        path: "/password/reset/:token",
        name: "ResetPassword",
        component: ResetPassword,
    },
    {
        path: "/:pathMatch(.*)*",
        name: "404",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
});

router.beforeEach((to, from) => {
    // Get the middleware property from component
    let middleware = to.matched[0].components.default.hasOwnProperty(
        "middleware"
    )
        ? to.matched[0].components.default.middleware
        : undefined;

    /*
    Scenario: 
    An authenticated user is trying to access a public component/page which
    should logically be accessible for unauthenticated users only.
    So we're checking the middleware first then validating the logged in state of the user.
    If the user is logged in, then we'll redirect them to homepage
    */
    if (middleware === "guest" && window.loggedIn) {
        return { name: "TheIndex" };
    }

    /*
    Scenario: 
    An unauthenticated user is trying to access a protected component/page.
    So we're checking the middleware first then validating the logged in state of the user.
    If the user is logged out, then we'll redirect them to login/signup page
    */
    if (middleware === "auth" && !window.loggedIn) {
        return { name: "Login" };
    }
});

export default router;
