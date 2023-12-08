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
                        v-for="(map, index) in mapList"
                        :key="index"
                    >
                        <td class="px-6 py-4">
                            <div class="relative h-10 w-10">
                                <img
                                    class="h-full w-full rounded-full object-cover object-center"
                                    :src="path + map.pic"
                                />
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <img
                                :src="icon + map.icon"
                                class="h-5 w-5 flex-shrink-0 rounded-full"
                            />
                        </td>
                        <td class="px-6 py-4">{{ map.title }}</td>
                        <td class="px-6 py-4">{{ map.lat.substring(0,7) }}...</td>
                        <td class="px-6 py-4">{{ map.lon.substring(0,7) }}...</td>
                        <td class="px-6 py-4">
                            <div
                                class="flex gap-4"
                                @click="detailMap(map.id)"
                            >
                                <box-icon
                                    name="link-external"
                                    color="#22d3ee"
                                    size="sm"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                ></box-icon>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="flex gap-4"
                                @click="linkMap(map.gmap)"
                            >
                                <box-icon
                                    name="map"
                                    type="solid"
                                    color="#fb7185"
                                    size="sm"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                ></box-icon>
                            </div>
                        </td>
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
                                    {{ map.created_by }}
                                </div>
                                <div class="text-gray-400">
                                    {{ map.email }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ moment(map.created_at).format("L") }}
                        </td>
                        <td class="flex px-6 py-4">
                            <div
                                class="flex justify-end gap-4 pr-2"
                                @click="editMap(map.id)"
                            >
                                <box-icon
                                    name="cog"
                                    color="#94a3b8"
                                    size="sm"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                ></box-icon>
                            </div>
                            <div
                                class="flex justify-end gap-4"
                                @click="delMap(map.id, index)"
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
                >
                    เพิ่มข้อมูล
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
        this.getMap();
        this.getType();
    },
    data() {
        return {
            path: "/storage/maps/thumbnails/",
            icon: "img/icon/",
            mapList: "",
            typeList: "",
            moment: moment,
        };
    },
    methods: {
        getMap() {
            axios
                .get("/api/map")
                .then((response) => {
                    this.mapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getType() {
            axios
                .get("/api/type")
                .then((response) => {
                    this.typeList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        editMap(id){
            this.$router.push('/editMap/' + id)
        },
        detailMap(id){
            this.$router.push('/mapDetail/' + id, "_blank");
        },
        linkMap(link){
            window.open(link, "_blank");
        },
        delMap(id, index) {
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
                        .delete("/api/map/" + id)
                        .then((response) => {
                            //console.log(res);
                        })
                        .catch((err) => {
                            //console.log(err);
                        });
                    this.mapList.splice(index, 1);
                    Swal.fire("ลบข้อมูล!", "ลบข้อมูลเรียบร้อย", "success");
                }
            });
        },
    },
};
</script>
