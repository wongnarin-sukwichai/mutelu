<template>
    <div class="bg-white rounded-lg pb-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Category -->
            <div
                class="mx-auto max-w-2xl py-4 sm:py-6 lg:max-w-none lg:py-8"
                data-aos="fade-in"
                data-aos-duration="2500"
            >
                <div class="flex justify-between">
                    <h2 class="text-3xl font-bold text-gray-900">
                        เรื่องราวความเชื่อ/ภูมิปัญญา/อาถรรพ์
                    </h2>
                    <router-link
                        class="bg-gray-200 hover:bg-gray-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                        to="/"
                    >
                        กลับหน้าหลัก
                    </router-link>
                </div>

                <!-- hr -->
                <div class="inline-flex items-center justify-center w-full">
                    <hr
                        class="w-64 h-1 my-16 bg-gray-200 border-0 rounded dark:bg-gray-700"
                    />
                    <div
                        class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900"
                    >
                        <box-icon
                            type="solid"
                            name="quote-right"
                            color="#d1d5db"
                        ></box-icon>
                    </div>
                </div>

                <!-- Post -->
                <div
                    class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 lg:mx-0 lg:max-w-none lg:grid-cols-4"
                >
                    <article
                        class="flex max-w-xl flex-col items-start justify-between"
                        v-for="(post, index) in postList.data"
                        :key="index"
                    >
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64 hover:scale-105 shadow-lg"
                        >
                            <img
                                :src="postPath + post.pic"
                                class="h-full w-full object-cover object-center cursor-pointer"
                                @click="postDetail(post.id)"
                            />
                        </div>
                        <div class="flex items-center gap-x-4 text-xs mt-4">
                            <span
                                class="flex rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                ><box-icon
                                    type="solid"
                                    name="news"
                                    color="#cbd5e1"
                                ></box-icon
                                ><font class="p-1.5">ข่าวสาร</font></span
                            >
                        </div>
                        <div class="group relative">
                            <h3
                                class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                            >
                                <span
                                    class="cursor-pointer"
                                    @click="postDetail(post.id)"
                                >
                                    {{ post.title }}
                                </span>
                            </h3>
                            <p
                                class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 indent-4"
                            >
                                {{ removeTag(post.detail) }}
                            </p>
                        </div>
                        <div
                            class="relative mt-8 flex items-center gap-x-4 border w-full rounded-lg p-2 border-gray-100 shadow-sm"
                        >
                            <box-icon
                                name="user"
                                color="#cbd5e1"
                                size="md"
                            ></box-icon>
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <span class="absolute inset-0"></span>
                                    {{ post.created_by }}
                                </p>
                                <p class="text-gray-400">
                                    {{
                                        moment(post.created_at)
                                            .add(543, "years")
                                            .format("LL")
                                    }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center py-16">
                    <TailwindPagination
                        :data="postList"
                        @pagination-change-page="getPost"
                    >
                    </TailwindPagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { TailwindPagination } from "laravel-vue-pagination";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
moment.locale("th");

export default {
    mounted() {
        this.getPost();
    },
    data() {
        return {
            postPath: "/storage/posts/",
            postList: [],
            moment: moment,
        };
    },
    methods: {
        getPost(page = 1) {
            axios
                .get("/api/postAll?page=" + page)
                .then((response) => {
                    this.postList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
            console.log(this.postList);
        },
        removeTag(str) {
            return str.replace(/&nbsp;|(<([^>]+)>)/g, "").substring(0, 200);
        },
        postDetail(id) {
            this.$router.push("/postDetail/" + id);
        },
    },
    components: {
        TailwindPagination,
    },
};
</script>
