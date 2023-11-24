<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-5">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="map"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >แผนที่
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Map</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="institution"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนวัด
                </h3>
                <p class="mt-1 text-sm text-purple-400">0</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="landmark"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนสิ่งศักสิทธิ์
                </h3>
                <p class="mt-1 text-sm text-purple-400">0</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="tree"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนต้นไม้ศักสิทธิ์
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
                            รูปภาพ
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ไอคอน
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ชื่อสถานที่
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ละติจูด
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ลองติจูด
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
                            ลิ้งค์
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            ผู้โพสต์
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-4 font-medium text-gray-900"
                        >
                            วันที่
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
                    <td class="px-6 py-4">
                            <div class="relative h-10 w-10">
                            <img
                                class="h-full w-full rounded-full object-cover object-center"
                                
                            />
                            </div>
                        </td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"></td>
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
                            {{ moment(member.start).format("L") }}
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
            <router-link to="/addMap"
                ><button
                    class="bg-green-200 hover:bg-green-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                >เพิ่มข้อมูล
                </button></router-link
            >
        </div>
    </div>
</template>

<script>
import "boxicons";
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
