<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-4">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="user-plus"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >ข้อมูลสมาชิก
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Member</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="user"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนสมาชิก
                </h3>
                <p class="mt-1 text-sm text-purple-400">0</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="cool"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนผู้ดูแลระบบ
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
                            ชื่อ-นามสกุล
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ประเภท
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ที่อยู่
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            เบอร์โทร
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            วันที่สมัคร
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            วันหมดอายุ
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        ></th>
                    </tr>
                </thead>
                <tbody
                    class="divide-y divide-gray-100 border-t border-gray-100"
                >
                    <tr
                        class="hover:bg-gray-50"
                        v-for="(member, index) in memList"
                        :key="index"
                    >
                        <td
                            class="flex gap-3 px-6 py-4 font-normal text-gray-900"
                        >
                            <div class="relative h-10 w-10">
                                <box-icon
                                    name="user"
                                    color="gray"
                                    size="lg"
                                    class="pr-2"
                                ></box-icon>
                                <span
                                    class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"
                                ></span>
                            </div>
                            <div class="text-sm">
                                <div class="font-medium text-gray-700">
                                    {{ member.name }} {{ member.surname }}
                                </div>
                                <div class="text-gray-400">
                                    {{ member.email }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs"
                                :class="
                                    member.level === null
                                        ? 'bg-green-200'
                                        : member.level === 0
                                        ? 'bg-yellow-200'
                                        : 'bg-sky-200'
                                "
                            >
                                <span v-if="member.level === null"
                                    >ผู้ใช้ทั่วไป</span
                                >
                                <span v-else-if="member.level === 0"
                                    >เจ้าหน้าที่ทั่วไป</span
                                >
                                <span v-else>ผู้ดูแลระบบ</span>
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ member.address }}</td>
                        <td class="px-6 py-4">{{ member.tel }}</td>
                        <td class="px-6 py-4">
                            {{ moment(member.start).format("L") }}
                        </td>
                        <td class="px-6 py-4">
                            {{ moment(member.end).format("L") }}
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="flex justify-end gap-4"
                                @click="delMem(member.id, index)"
                            >
                                <box-icon
                                    name="trash"
                                    color="#f87171"
                                    size="sm"
                                    animation="tada-hover"
                                    class="cursor-pointer"
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
        this.getMem();
    },
    data() {
        return {
            memList: "",
            moment: moment,
        };
    },
    methods: {
        getMem() {
            axios
                .get("/api/member")
                .then((response) => {
                    this.memList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        delMem(id, index) {
            Swal.fire({
                title: "ต้องการลบข้อมูล?",
                text: "ยืนยันการลบข้อมูลหรือไม่",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete("/api/member/" + id)
                        .then((response) => {
                            //console.log(res);
                        })
                        .catch((err) => {
                            //console.log(err);
                        });
                    this.memList.splice(index, 1);
                    Swal.fire("ลบข้อมูล!", "ลบข้อมูลเรียบร้อย", "success");
                }
            });
        },
    },
};
</script>
