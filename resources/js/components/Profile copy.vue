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
        
        <div class="border-t border-gray-200 shadow-lg rounded ">
            <dl>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        ชื่อ-นามสกุล
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ user.name }} {{ user.surname }}
                    </dd>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">อีเมล</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ user.email }}
                    </dd>
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">ที่อยู่</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ user.address }}
                    </dd>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">เบอร์โทร</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ user.tel }}
                    </dd>
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        วันที่สมัคร
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ moment(user.start).format("d MMM YYYY") }}
                    </dd>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        วันหมดอายุ
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                    >
                        {{ moment(user.end).format("d MMM YYYY") }}
                    </dd>
                </div>
            </dl>
        </div>

        <div class="flex justify-end mt-4">
            <router-link to="/editProfile"
                ><button
                    class="bg-amber-300 hover:bg-amber-400 shadow-lg rounded-md p-2 text-sm text-gray-700"
                >แก้ไขข้อมูล
                </button></router-link
            >
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
