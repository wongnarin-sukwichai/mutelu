<template>
    <div class="p-16 bg-gray-50">
        <div class="grid grid-cols-6 gap-2">
            <div
                class="p-6 rounded-md bg-white bg-opacity-50 lg:w-60 border rounded-lg shadow-lg no-print"
            >
                <nav class="space-y-4 text-sm text-gray-700">                 
                    <div class="space-y-2">
                        <h2
                            class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                        >
                            Home
                        </h2>
                        <div class="flex flex-col space-y-2">
                            <router-link
                                to="/home"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="home"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">ระบบหลังบ้าน</p></router-link
                            >
                            <router-link
                                to="/map"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="map"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">
                                    แผนที่
                                </p></router-link
                            >
                            <router-link
                                to="/post"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="message-rounded-dots"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">บทความ</p></router-link
                            >
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h2
                            class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                        >
                            Profile
                        </h2>
                        <div class="flex flex-col space-y-2">
                            <router-link
                                to="/profile"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="user-pin"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">ข้อมูลผู้ใช้</p></router-link
                            >
                        </div>
                    </div>
                    <div class="space-y-2" v-if="level === 1">
                        <h2
                            class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                        >
                            Administrator
                        </h2>
                        <div class="flex flex-col space-y-2">
                            <router-link
                                to="/member"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="user-plus"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">
                                    ข้อมูลสมาชิก
                                </p></router-link
                            >
                            <router-link
                                to="/collap"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="transfer-alt"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">
                                    เครือข่ายฯ
                                </p></router-link
                            >
                            <router-link
                                to="/contact"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="envelope"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">ข้อมูลติดต่อ</p></router-link
                            >
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h2
                            class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                        >
                            Tools
                        </h2>
                        <div class="flex flex-col space-y-1">
                            <router-link
                                to="/"
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                ><box-icon
                                    name="file"
                                    color="gray"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">คู่มือการใช้งาน</p></router-link
                            >
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h2
                            class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                        >
                            System
                        </h2>
                        <div class="flex flex-col space-y-1">
                            <a
                                href=""
                                class="flex p-2 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                                @click="logout()"
                                ><box-icon
                                    name="log-out-circle"
                                    color="red"
                                    size="sm"
                                    class="pr-2"
                                ></box-icon>
                                <p class="p-1">ออกจากระบบ</p></a
                            >
                        </div>
                    </div>
                </nav>
            </div>

            <div
                class="col-span-5 bg-white border rounded-md bg-opacity-50 shadow-lg"
            >
                <router-view />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {},
    data() {
        return {
            level: "",
        };
    },
    methods: {
        async logout() {
            await this.$store.dispatch("logout");
            this.$router.push({ name: "login" });
        },
    },
    computed: {
        level() {
            return this.$store.getters.level;
        },
    },
};
</script>
