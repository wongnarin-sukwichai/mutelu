<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-4">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="user-pin"
                        color="gray"
                        size="md"
                        class="pr-2"
                    ></box-icon
                    >ข้อมูลส่วนตัว
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Profile</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="message-add"
                        color="gray"
                        size="md"
                        class="pr-2"
                    ></box-icon
                    >จำนวนโพสต์
                </h3>
                <p class="mt-1 text-sm text-purple-400">12</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="message-rounded-dots"
                        color="gray"
                        size="md"
                        class="pr-2"
                    ></box-icon
                    >จำนวนคอมเม้นต์
                </h3>
                <p class="mt-1 text-sm text-purple-400">0</p>
            </div>
        </div>

        <div class="mx-auto px-6 sm:px-6 lg:px-8">
            <section class="">
                <div class="w-full lg:w-8/12 px-4 mx-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
                    >
                        <div
                            class="rounded-t mb-0 px-6 py-6 bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
                        >
                            <div class="text-center flex justify-between">
                                <h6 class="text-white text-xl">My account</h6>
                                <router-link to="/editProfile">
                                    <button
                                        class="bg-amber-300 hover:bg-amber-400 shadow-lg rounded-md p-2 text-sm text-gray-700"
                                    >
                                        แก้ไขข้อมูล
                                    </button>
                                </router-link>
                            </div>
                        </div>
                        <div
                            class="flex-auto px-4 lg:px-10 py-10 pt-0 bg-white"
                        >
                            <h6
                                class="text-sky-600 text-lg mt-3 mb-6 uppercase"
                            >
                                Profile
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            ชื่อ
                                        </label>
                                        {{ user.name }} {{ user.surname }}
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            อีเมล
                                        </label>
                                        {{ user.email }}
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            เบอร์โทร
                                        </label>
                                        {{ user.tel }}
                                    </div>
                                </div>                         
                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300" />

                            <h6
                                class="text-sky-600 text-lg mt-3 mb-6 uppercase"
                            >
                                Address
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            ที่อยู่
                                        </label>
                                        {{ user.address }}
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300" />

                            <h6
                                class="text-sky-600 text-lg mt-3 mb-6 uppercase"
                            >
                                Other
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            วันที่สมัคร
                                        </label>
                                        {{ moment(user.start).format("d MMM YYYY") }}
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-sky-500 text-md mb-2"
                                            htmlfor="grid-password"
                                        >
                                            วันหมดอายุ
                                        </label>
                                        {{ moment(user.end).format("d MMM YYYY") }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>     
    </div>
</template>

<script>
import "boxicons";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
moment.locale("th");

export default {
    mounted() {},
    data() {
        return {
            moment: moment,
            user: "",
        };
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
