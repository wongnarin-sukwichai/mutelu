<template>
    <div class="bg-white rounded-lg">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Container for demo purpose -->
            <div
                class="container mb-24 mx-auto md:px-6 p-8 shadow-lg rounded-lg"
            >
                <!-- Section: Design Block -->
                <section class="mb-12">
                    <div class="flex justify-center">
                        <img
                            :src="path + postDetail.pic"
                            class="mb-6 shadow-lg"
                            alt="image"
                        />
                    </div>
                    <div class="mb-6 flex items-center text-sm text-gray-600">
                        <i class="fas fa-newspaper"></i>
                        <div>
                            <span>
                                <box-icon
                                    type="solid"
                                    name="calendar-alt"
                                    color="#cbd5e1"
                                    size="sm"
                                ></box-icon>
                                เผยแพร่ :
                                {{
                                    moment(postDetail.created_at).format(
                                        "d MMM YYYY"
                                    )
                                }}
                                โดย
                            </span>
                            {{ postDetail.created_by }}
                        </div>
                    </div>

                    <h1 class="mb-6 text-3xl font-bold">
                        {{ postDetail.title }}
                    </h1>

                    <p class="indent-8" v-html="postDetail.detail"></p>
                </section>
                <div class="flex justify-end">
                    <router-link 
                    to="/"
                    class="bg-gray-200 hover:bg-gray-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                    >
                     กลับหน้าหลัก
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "boxicons";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
import axios from "axios";
moment.locale("th");

export default {
    mounted() {
        this.getPost();
    },
    data() {
        return {
            path: "/storage/posts/",
            postDetail: "",
            moment: moment,
        };
    },
    methods: {
        getPost() {
            axios
                .get("/api/postDetail/" + this.$route.params.id)
                .then((response) => {
                    this.postDetail = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
