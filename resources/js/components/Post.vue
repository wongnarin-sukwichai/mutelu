<template>
    <div class="mx-auto px-6 py-6 sm:px-6 lg:px-8">
        <div class="flex grid grid-cols-4">
            <div class="px-4 py-5 sm:px-6 col-span-2">
                <h3 class="text-lg leading-6 font-medium text-gray-700">
                    <box-icon
                        name="message-rounded-dots"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >บทความ
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Post</p>
            </div>

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-sm leading-6 font-medium text-gray-600">
                    <box-icon
                        name="chat"
                        color="gray"
                        size="lg"
                        class="pr-2"
                    ></box-icon
                    >จำนวนบทความทั้งหมด
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
                            ชื่อเรื่อง
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
                        v-for="(post, index) in postList"
                        :key="index"
                    >
                        <td class="px-6 py-4">
                            <div class="relative h-10 w-10">
                                <img
                                    class="h-full w-full rounded-full object-cover object-center hover:scale-105 cursor-pointer"
                                    :src="path + post.pic"
                                    @click="getPic(post.pic)"
                                />
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ post.title }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-4" @click="detailPost(post.id)">
                                <box-icon
                                    name="windows"
                                    color="#22d3ee"
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
                                    {{ post.created_by }}
                                </div>
                                <div class="text-gray-400">
                                    {{ post.email }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ moment(post.created_at).format("L") }}
                        </td>
                        <td class="flex px-6 py-4">
                            <div
                                class="flex justify-end gap-4 pr-2"
                                @click="editPost(post.id)"
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
                                @click="delPost(post.id, index)"
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
            <router-link to="/addPost"
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
import Swal from "sweetalert2";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
moment.locale("th");

export default {
    mounted() {
        this.getPost();
    },
    data() {
        return {
            path: "/storage/posts/thumbnails/",
            postList: "",
            moment: moment,
        };
    },
    methods: {
        getPost() {
            axios
                .get("/api/post")
                .then((response) => {
                    this.postList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        editPost(id){
            this.$router.push('/editPost/' + id, "_blank")
        },
        delPost(id, index) {
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
                        .delete("/api/post/" + id)
                        .then((response) => {
                            //console.log(res);
                        })
                        .catch((err) => {
                            //console.log(err);
                        });
                    this.postList.splice(index, 1);
                    Swal.fire("ลบข้อมูล!", "ลบข้อมูลเรียบร้อย", "success");
                }
            });
        },
        getPic(pic) {
            window.open("/storage/posts/" + pic, "_blank");
        },
        detailPost(id){
            window.open('/postDetail/' + id, "_blank");
        },
    },
};
</script>
