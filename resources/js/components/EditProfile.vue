<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8 bg-gray-100">
        <form @submit.prevent="sendProfile()">
           
            <section class="py-1">
                <div class="w-full lg:w-8/12 px-4 mx-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
                    >
                        <div
                            class="rounded-t mb-0 px-6 py-6 bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
                        >
                            <div class="text-center flex justify-between">
                                <h6 class="text-white text-xl">My account</h6>
                                <button
                                    class="relative p-2 bg-green-200 shadow-lg rounded-md text-sm text-gray-700 hover:bg-green-300"
                                    type="submit"
                                >
                                    บันทึกข้อมูล
                                </button>
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
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            ชื่อ
                                        </label>
                                        <input
                                            type="text"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            v-model="auth.name"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            นามสกุล
                                        </label>
                                        <input
                                            type="text"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            v-model="auth.surname"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            อีเมล
                                        </label>
                                        <input
                                            type="email"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            v-model="auth.email"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            เบอร์โทร
                                        </label>
                                        <input
                                            type="text"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            v-model="auth.tel"
                                        />
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
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            ที่อยู่
                                        </label>
                                        <textarea
                                            type="text"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            rows="4"
                                            v-model="auth.address"
                                        ></textarea>
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
                                            class="block uppercase text-blueGray-600 text-sm mb-2"
                                            htmlfor="grid-password"
                                        >
                                            รหัสผ่าน
                                        </label>
                                        <input
                                            type="password"
                                            class="border px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            placeholder="** หากไม่ต้องการแก้ไข ให้เว้นว่างไว้ **"
                                            v-model="auth.password"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
