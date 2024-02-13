import { createRouter, createWebHistory } from "vue-router";

import Welcome from "../components/Welcome.vue";
import Login from "../components/Login.vue";
import Home from "../components/Home.vue";
import Dashboard from "../components/Dashboard.vue";
import Profile from "../components/Profile.vue";
import EditProfile from "../components/EditProfile.vue";
import Member from "../components/Member.vue";
import AddMem from "../components/AddMem.vue";
import Collap from "../components/Collap.vue";
import AddCollap from "../components/AddCollap.vue";
import Contact from "../components/Contact.vue";
import Post from "../components/Post.vue";
import AddPost from "../components/AddPost.vue";
import Map from "../components/Map.vue";
import AddMap from "../components/AddMap.vue";
import EditPost from "../components/EditPost .vue";
import EditMap from "../components/EditMap.vue";
import PostDetail from "../components/PostDetail.vue";
import MapDetail from "../components/MapDetail.vue";
import PostAll from "../components/PostAll.vue";
import MapAll from "../components/MapAll.vue";
import MapSearch from "../components/mapSearch.vue";

import store from "../store";
import AOS from 'aos'
import 'aos/dist/aos.css'

const routes = [
    {
        path: "/",
        name: "welcome",
        component: Welcome,
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/postDetail/:id",
        name: "postDetail",
        component: PostDetail,
    },
    {
        path: "/mapDetail/:id",
        name: "mapDetail",
        component: MapDetail,
    },
    {
        path: "/postAll",
        name: "postAll",
        component: PostAll
    },
    {   
        path: "/mapAll",
        name: "mapAll",
        component: MapAll,
        meta: {
            guard: "auth"
        }
    },
    {   
        path: "/mapSearch",
        name: "mapSearch",
        component: MapSearch,
        meta: {
            guard: "auth"
        }
    },
    {
        path: "/home",
        name: "home",
        component: Home,
        redirect: {
            name: "dashboard",
        },
        meta: {
            guard: "auth",
        },
        children: [
            {
                path: "/dashboard",
                name: "dashboard",
                component: Dashboard,
                meta: {
                    guard: "auth"
                }
            },
            {
                path: "/profile",
                name: "profile",
                component: Profile,
                meta: {
                    guard: "auth"
                }
            },
            {
                path: "/editProfile",
                name: "editProfile",
                component: EditProfile,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/member",
                name: "member",
                component: Member,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/addMem",
                name: "addMem",
                component: AddMem,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/collap",
                name: "collap",
                component: Collap,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/addCollap",
                name: "addCollap",
                component: AddCollap,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/contact",
                name: "contact",
                component: Contact,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/post",
                name: "post",
                component: Post,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/addPost",
                name: "addPost",
                component: AddPost,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/editPost/:id",
                name: "editPost",
                component: EditPost,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/map",
                name: "map",
                component: Map,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/addMap",
                name: "addMap",
                component: AddMap,
                meta: {
                    guard: "auth",
                },
            },
            {
                path: "/editMap/:id",
                name: "editMap",
                component: EditMap,
                meta: {
                    guard: "auth",
                },
            },
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    AOS.init();
    if (store.getters.user) {
        if (to.matched.some((route) => route.meta.guard === "guest"))
            next({ name: "home" });
        else next();
    } else {
        if (to.matched.some((route) => route.meta.guard === "auth"))
            next({ name: "login" });
        else next();
    }
});

export default router;
