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
                        ค้นหาแผนที่
                    </h2>
                    <router-link
                        class="bg-gray-200 hover:bg-gray-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                        to="/mapAll"
                    >
                        กลับหน้าหลัก
                    </router-link>
                </div>

                <!-- hr -->
                <div class="inline-flex items-center justify-center w-full">
                    <hr
                        class="w-64 h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700"
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

                <!-- Search -->
                <div class="pb-4">
                    <form class="flex justify-end" @submit.prevent="getMap()">
                        <input
                            type="text"
                            class="p-2 mr-4 block w-56 rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-blue-400 hover:ring-inset outline-0"
                            required
                            v-model="data.text"
                        />
                        <button
                            type="submit"
                            class="bg-sky-200 hover:bg-sky-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                        >
                            ค้นหา
                        </button>
                    </form>
                </div>

                <!-- Post -->
                <div
                    class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 lg:mx-0 lg:max-w-none lg:grid-cols-4"
                    data-aos="fade-in"
                    data-aos-duration="1500"
                >
                    <article
                        class="flex max-w-xl flex-col items-start justify-between"
                        v-for="(map, index) in mapList.data"
                        :key="index"
                    >
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64 hover:scale-105 shadow-lg"
                        >
                            <img
                                :src="mapPath + map.pic"
                                class="h-full w-full object-cover object-center cursor-pointer"
                                @click="mapDetail(map.id)"
                            />
                        </div>
                        <div class="flex items-center gap-x-4 text-xs mt-4">
                            <span
                                class="flex rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                                ><box-icon
                                    type="solid"
                                    name="map"
                                    color="#cbd5e1"
                                ></box-icon
                                ><font class="p-1.5">แผนที่</font></span
                            >
                        </div>
                        <div class="group relative">
                            <h3
                                class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                            >
                                <span
                                    class="cursor-pointer"
                                    @click="mapDetail(map.id)"
                                >
                                    {{ map.title }}
                                </span>
                            </h3>
                            <p
                                class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 indent-4"
                            >
                                {{ removeTag(map.detail) }}
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
                                    {{ map.created_by }}
                                </p>
                                <p class="text-gray-400">
                                    {{
                                        moment(map.created_at)
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
                        :data="mapList"
                        @pagination-change-page="getMap"
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
import axios from "axios";
moment.locale("th");

export default {
    mounted() {
        this.getMap();
    },
    data() {
        return {
            mapPath: "/storage/maps/",
            mapList: [],
            moment: moment,
            data: {
                text: this.$route.params.text,
            },
        };
    },
    methods: {
        getMap(page = 1) {
            axios
                .post("/api/mapSearch?page=" + page, this.data)
                .then((response) => {
                    this.mapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        removeTag(str) {
            return str.replace(/&nbsp;|(<([^>]+)>)/g, "").substring(0, 200);
        },
        mapDetail(id) {
            this.$router.push("/mapDetail/" + id);
        },
    },
    components: {
        TailwindPagination,
    },
};
</script>
