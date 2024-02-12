<template>
    <div class="min-h-full">
        <nav
            class="bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
        >
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                    >
                        <!-- Mobile menu button-->
                        <button
                            type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false"
                        >
                            <span class="absolute -inset-0.5"></span>

                            <svg
                                class="block h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                />
                            </svg>

                            <svg
                                class="hidden h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                    >
                        <div class="flex flex-shrink-0 items-center">
                            <img
                                class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company"
                            />
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <router-link
                                    to="/"
                                    class="text-white hover:bg-white hover:text-gray-900 rounded-md px-3 py-2 text-sm font-medium"
                                    aria-current="page"
                                    >หน้าแรก</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                    >
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div v-if="!user">
                                <router-link
                                    to="/login"
                                    class="text-gray-50 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium"
                                    >เข้าสู่ระบบ</router-link
                                >
                            </div>

                            <div v-else>
                                <button
                                    type="button"
                                    class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-0 focus:ring-white focus:ring-offset-2"
                                    id="user-menu-button"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                    @click="show = !show"
                                >
                                    <div class="flex items-center px-5">
                                        <div class="mr-3">
                                            <div
                                                class="text-base font-medium leading-none text-white text-left"
                                            >
                                                {{ user.name }}
                                                {{ user.surname }}
                                            </div>
                                            <div
                                                class="text-sm font-medium leading-none text-gray-100"
                                            >
                                                {{ user.email }}
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <box-icon
                                                name="user"
                                                color="white"
                                            ></box-icon>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <transition name="fade">
                                <div
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu-button"
                                    tabindex="-1"
                                    v-if="show"
                                >
                                    <router-link
                                        to="/home"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-0"
                                        >ระบบหลังบ้าน</router-link
                                    >

                                    <router-link
                                        to="/profile"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-0"
                                        >ข้อมูลลผู้ใช้</router-link
                                    >

                                    <a
                                        href=""
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-2"
                                        @click="logout()"
                                        >ออกจากระบบ</a
                                    >
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <router-link
                        to="/"
                        class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                        aria-current="page"
                        >หน้าแรก</router-link
                    >
                </div>
            </div>
        </nav>
        <!-- Replace with your content -->
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <img :src="banner" class="p-2 shadow-lg" />
            </div>

            <router-view v-slot="{ Component, route }">
                <transition name="fade" mode="out-in">
                    <div :key="route.name">
                        <component :is="Component"> </component>
                    </div>
                </transition>
            </router-view>

            <footer
                class="text-white footer footer-center text-base-content border-t fixed h-auto bottom-0 w-screen bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
            >
                <div class="py-4 text-sm text-center dark:text-gray-400">
                    ©2023 ThayuTech.com
                </div>
            </footer>
        </main>
        <!-- /End replace -->
    </div>
</template>

<script>
export default {
    mounted() {},
    data() {
        return {
            banner: "/img/banner/banner.jpg",
            user: "",
            show: false,
        };
    },
    methods: {
        async logout() {
            await this.$store.dispatch("logout");
            this.$router.push({ name: "login" });
        },
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
