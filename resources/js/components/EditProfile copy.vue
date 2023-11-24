<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <form @submit.prevent="sendProfile()">
            <div class="flex grid grid-cols-4">
                <div class="px-4 py-5 sm:px-6 col-span-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-700">
                        <box-icon
                            name="user-pin"
                            color="gray"
                            size="md"
                            class="pr-2"
                        ></box-icon
                        >แก้ไขข้อมูลส่วนตัว
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Edit Profile
                    </p>
                </div>

                <div class="px-4 py-5 sm:px-6"></div>

                <div class="px-4 py-5 sm:px-6"></div>
            </div>
            <div class="border-t border-gray-200 shadow-md">
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">ชื่อ</div>
                    <input
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.name"
                        required
                    />
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">นามสกุล</div>
                    <input
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.surname"
                        required
                    />
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">อีเมล</div>
                    <input
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.email"
                        required
                    />
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">ที่อยู่</div>
                    <textarea
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.address"
                    ></textarea>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">
                        เบอร์โทร
                    </div>
                    <input
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.tel"
                    />
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <div class="text-sm font-medium text-gray-500">
                        รหัสผ่าน
                    </div>
                    <input
                        type="text"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        v-model="auth.password"
                        placeholder="** หากไม่ต้องการแก้ไข ให้เว้นว่างไว้ **"
                    />
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <router-link to="/profile" class="mr-2"
                    ><button
                        class="relative p-2 bg-gray-200 shadow-lg rounded-md text-sm text-gray-700 hover:bg-gray-300"
                    >
                        กลับหน้าหลัก
                    </button></router-link
                >
                <button
                    class="relative p-2 bg-green-200 shadow-lg rounded-md text-sm text-gray-700 hover:bg-green-300"
                    type="submit"
                >
                    บันทึก
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
    mounted() {},
    data() {
        return {
            auth: {
                id: this.$store.getters.user.id,
                name: this.$store.getters.user.name,
                surname: this.$store.getters.user.surname,
                email: this.$store.getters.user.email,
                address: this.$store.getters.user.address,
                tel: this.$store.getters.user.tel,
                password: "",
            },
            user: "",
        };
    },
    methods: {
        async sendProfile() {
            try {
                await this.$store.dispatch("updateProfile", this.auth);
                this.$router.push({ name: "profile" });
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "บันทึกข้อมูลเรียบร้อย",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } catch (err) {
                Swal.fire({
                    icon: "error",
                    title: "ผิดพลาด",
                    text: "ไม่สามารถบันทึกข้อมูลได้ กรุณาติดต่อเจ้าหน้าที่",
                });
            }
        },
    },
};
</script>
