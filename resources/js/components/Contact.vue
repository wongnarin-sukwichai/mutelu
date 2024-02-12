<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-4">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="envelope"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >ข้อมูลติดต่อ
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Email</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="envelope-open"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนรายการติดต่อ
                </h3>
                <p class="mt-1 text-sm text-purple-400">0</p>
            </div>
          
        </div>

        <!-- component -->
        <div
            class="overflow-hidden rounded-lg border border-gray-200 shadow-lg"
        >
            <table
                class="w-full border-collapse bg-white text-left text-sm text-gray-500 table-auto"
            >
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ชื่อ
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            อีเมล
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            รายละเอียด
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                        </th>                    
                    </tr>
                </thead>
                <tbody
                    class="divide-y divide-gray-100 border-t border-gray-100"
                >
                    <tr
                        class="hover:bg-gray-50"
                        v-for="(contact, index) in contactList"
                        :key="index"
                    >
                        <td
                            class="flex gap-3 px-6 py-4 font-normal text-gray-900"
                        >
                            <div class="relative h-10 w-10">
                                <box-icon
                                    name="envelope"
                                    color="#94a3b8"
                                    size="lg"
                                    class="pr-2"
                                    v-if="contact.status === 0"
                                ></box-icon>
                                <box-icon
                                    name="envelope-open"
                                    color="#94a3b8"
                                    size="lg"
                                    class="pr-2"
                                    v-else
                                ></box-icon>
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full ring ring-white"
                                    :class=" contact.status === 0 ? 'bg-red-400' : 'bg-green-400'"
                                ></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">
                                    {{ contact.name }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ contact.email }}</td>
                        <td class="px-6 py-4">{{ contact.detail }}</td>
                        <td class="px-6 py-4">
                            <div
                                class="flex justify-end gap-4"
                                @click="sendContact(contact.id)"
                            >
                                <box-icon
                                    name="loader"
                                    color="#facc15"
                                    size="md"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                    v-if="contact.status === 0"
                                ></box-icon>
                                <box-icon
                                    name="check"
                                    color="#4ade80"
                                    size="md"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                    v-else
                                ></box-icon>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            <router-link to="/addMem"
                ><button
                    class="bg-green-200 hover:bg-green-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                >เพิ่มข้อมูล
                </button></router-link
            >
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
moment.locale("th");

export default {
    mounted() {
        this.getContact();
    },
    data() {
        return {
            contactList: "",
            moment: moment,
        };
    },
    methods: {
        getContact() {
            axios
                .get("/api/contact")
                .then((response) => {
                    this.contactList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        async sendContact(id) {
            try {
                await axios.put('/api/contact/' + id)
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "บันทึกข้อมูลเรียบร้อย",
                    showConfirmButton: false,
                    timer: 1500,
                });
                this.getContact()
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
