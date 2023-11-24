<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-4">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="transfer-alt"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >เครือข่ายความร่วมมือ
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Cooperation</p>
            </div>
        </div>

        <!-- component -->

        <div class="grid grid-cols-4 p-4">
            <div
                class="border-0 shadow rounded-lg border-gray-100 mr-2 bg-white"
                v-for="(collap, index) in collapList"
                :key="index"
            >
                <div class="flex">

                    <div
                        class="flex px-6 py-6 border-r"
                        @click="delCollap(collap.id, index)"
                    >
                        <box-icon
                            name="trash"
                            color="#f87171"
                            size="sm"
                            animation="tada-hover"
                            class="cursor-pointer"
                        ></box-icon>
                    </div>

                    <div class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="relative h-10 w-10">
                            <img
                                class="h-full w-full rounded-full object-cover object-center"
                                :src="path + collap.pic"
                            />
                            <span
                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"
                            ></span>
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">
                                {{ collap.name }} {{ collap.surname }}
                            </div>
                            <div class="text-gray-400">
                                {{ collap.detail }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <router-link to="/addCollap"
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

export default {
    mounted() {
        this.getCollap();
    },
    data() {
        return {
            path: "/storage/collaps/thumbnails/",
            collapList: "",
        };
    },
    methods: {
        getCollap() {
            axios
                .get("/api/collap")
                .then((response) => {
                    this.collapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        delCollap(id, index) {
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
                        .delete("/api/collap/" + id)
                        .then((response) => {
                            //console.log(res);
                        })
                        .catch((err) => {
                            //console.log(err);
                        });
                    this.collapList.splice(index, 1);
                    Swal.fire("ลบข้อมูล!", "ลบข้อมูลเรียบร้อย", "success");
                }
            });
        },
    },
};
</script>
