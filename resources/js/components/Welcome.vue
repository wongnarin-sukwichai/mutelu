<template>
    <div class="bg-white rounded-lg">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Map Detail -->
            <GoogleMap
                api-key="AIzaSyCTTZZ1n55bBuMNrWNSBltniL1nsQChTHs"
                style="width: 100%; height: 500px"
                :center="center"
                :zoom="5"
            >
                <template v-for="(gmap, index) in mapList" :key="index">
                    <Marker
                        :options="{
                            position: {
                                lat: parseFloat(gmap.lat),
                                lng: parseFloat(gmap.lon),
                            },
                            icon: path + gmap.icon,
                        }"
                    >
                        <InfoWindow>
                            <div id="content">
                                <h1
                                    id="firstHeading"
                                    class="firstHeading font-bold"
                                >
                                    {{ gmap.title }}
                                </h1>
                                <img
                                    class="mt-2"
                                    :src="pathMap + gmap.pic"
                                    width="50"
                                    height="50"
                                />
                                <div id="bodyContent">
                                    <p class="font-normal indent-4 mt-2">
                                        {{ removeTag(gmap.detail) }}...
                                    </p>
                                    <p class="mt-1">
                                        อ่านเพิ่มเติม :
                                        <box-icon
                                            name="link-external"
                                            size="xs"
                                            color="#3b82f6"
                                            animation="tada-hover"
                                            class="cursor-pointer"
                                            @click="mapDetail(gmap.id)"
                                        ></box-icon>
                                    </p>
                                    <p class="mt-1">
                                        ไปยังแผนที่ :
                                        <box-icon
                                            name="map"
                                            type="solid"
                                            size="xs"
                                            color="#ef4444"
                                            animation="tada-hover"
                                            class="cursor-pointer"
                                            @click="linkMap(gmap.gmap)"
                                        ></box-icon>
                                    </p>
                                </div>
                            </div>
                        </InfoWindow>
                    </Marker>
                </template>
            </GoogleMap>

            <!-- Post -->
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                data-aos="zoom-in"
                data-aos-duration="1500"
            >
                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                    v-for="(map, index) in mapList"
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
                    <div class="relative mt-8 flex items-center gap-x-4">
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

            <!-- Category -->
            <div
                class="mx-auto max-w-2xl py-8 sm:py-12 lg:max-w-none lg:py-16"
                data-aos="fade-in"
                data-aos-duration="2500"
            >
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold text-gray-900">
                        เรื่องราวความเชื่อ/ภูมิปัญญา/อาถรรพ์
                    </h2>
                    <h2
                        class="flex justify-end text-blue-500 cursor-pointer hover:text-blue-600"
                    >
                        อ่านทั้งหมด
                        <box-icon
                            name="chevrons-right"
                            color="#3b82f6"
                            animation="fade-right-hover"
                        ></box-icon>
                    </h2>
                </div>

                <!-- Post -->
                <div
                    class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                >
                    <article
                        class="flex max-w-xl flex-col items-start justify-between"
                        v-for="(post, index) in postList"
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
                        <div class="relative mt-8 flex items-center gap-x-4">
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
            </div>

            <!-- Team -->
            <section
                class="text-center"
                data-aos="fade-in"
                data-aos-duration="2500"
            >
                <h2 class="mb-12 text-3xl font-bold">เครือข่ายความร่วมมือ</h2>

                <div
                    class="lg:gap-xl-12 grid gap-x-6 md:grid-cols-3 xl:grid-cols-4"
                >
                    <div
                        class="mb-12"
                        v-for="(collap, index) in collapList"
                        :key="index"
                    >
                        <img
                            :src="collapPath + collap.pic"
                            class="mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20"
                            alt=""
                            style="max-width: 100px"
                        />

                        <p class="mb-2 font-bold">
                            {{ collap.name }} {{ collap.surname }}
                        </p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            {{ collap.detail }}
                        </p>
                    </div>
                </div>
            </section>
            <!-- Section: Design Block -->

            <!-- Contact -->
            <div
                class="my-4 mx-auto md:px-6"
                data-aos="fade-in"
                data-aos-duration="25000"
            >
                <!-- Section: Design Block -->
                <section class="mb-32">
                    <div class="flex justify-center">
                        <div class="text-center md:max-w-xl lg:max-w-3xl">
                            <h2 class="mb-12 px-6 text-3xl font-bold">
                                ติดต่อเรา
                            </h2>
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div
                            class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6"
                        >
                            <form @submit.prevent="sendContact()">
                                <div
                                    class="relative mb-6"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="text"
                                        class="peer block min-h-[auto] w-full rounded border-blue-200 border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleInput90"
                                        placeholder="Name"
                                        required
                                        v-model="dataCont.name"
                                    />
                                    <label
                                        class="peer-focus:bg-white peer-focus:px-1 pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                        for="exampleInput90"
                                        v-if="dataCont.name === ''"
                                        >Name
                                    </label>
                                </div>
                                <div
                                    class="relative mb-6"
                                    data-te-input-wrapper-init
                                >
                                    <input
                                        type="email"
                                        class="peer block min-h-[auto] w-full rounded border-blue-200 border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleInput91"
                                        placeholder="Email address"
                                        required
                                        v-model="dataCont.email"
                                    />
                                    <label
                                        class="peer-focus:bg-white peer-focus:px-1 pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                        for="exampleInput91"
                                        v-if="dataCont.email === ''"
                                        >Email
                                    </label>
                                </div>
                                <div
                                    class="relative mb-6"
                                    data-te-input-wrapper-init
                                >
                                    <textarea
                                        class="peer block min-h-[auto] w-full rounded border-blue-200 border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        placeholder="Your message"
                                        required
                                        v-model="dataCont.detail"
                                    ></textarea>
                                    <label
                                        for="exampleFormControlTextarea1"
                                        class="peer-focus:bg-white peer-focus:px-1 pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                                        v-if="dataCont.detail === ''"
                                        >Message</label
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="mb-6 inline-block w-full rounded bg-blue-400 border-blue-200 bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-lg hover:bg-blue-500"
                                >
                                    Send
                                </button>
                            </form>
                        </div>
                        <div
                            class="w-full shrink-0 grow-0 basis-auto lg:w-7/12"
                        >
                            <div class="flex flex-wrap">
                                <div
                                    class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6"
                                >
                                    <div class="flex items-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block rounded-md bg-primary-100 p-4 text-primary"
                                            >
                                                <box-icon
                                                    name="location-plus"
                                                    size="sm"
                                                ></box-icon>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p
                                                class="mb-2 font-bold dark:text-white"
                                            >
                                                Address
                                            </p>
                                            <p class="text-neutral-500">
                                                Faculty of Environment and
                                                Resource Studies
                                            </p>
                                            <p class="text-neutral-500">
                                                Mahasarakham University
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6"
                                >
                                    <div class="flex items-start">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block rounded-md bg-primary-100 p-4 text-primary"
                                            >
                                                <box-icon
                                                    name="envelope"
                                                    size="sm"
                                                ></box-icon>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p
                                                class="mb-2 font-bold dark:text-white"
                                            >
                                                Email
                                            </p>
                                            <p class="text-neutral-500">
                                                thayukorn.p@msu.ac.th
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6"
                                >
                                    <div class="align-start flex">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block rounded-md bg-primary-100 p-4 text-primary"
                                            >
                                                <box-icon
                                                    name="phone"
                                                    type="solid"
                                                    size="sm"
                                                ></box-icon>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p
                                                class="mb-2 font-bold dark:text-white"
                                            >
                                                Tel
                                            </p>
                                            <p class="text-neutral-500">
                                                080-1234567
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6"
                                >
                                    <div class="align-start flex">
                                        <div class="shrink-0">
                                            <div
                                                class="inline-block rounded-md bg-primary-100 p-4 text-primary"
                                            >
                                                <box-icon
                                                    name="network-chart"
                                                    size="sm"
                                                ></box-icon>
                                            </div>
                                        </div>
                                        <div class="ml-6 grow">
                                            <p
                                                class="mb-2 font-bold dark:text-white"
                                            >
                                                Social Media
                                            </p>
                                            <div class="d-flex">
                                                <span class="pr-2"
                                                    ><box-icon
                                                        name="facebook-circle"
                                                        type="logo"
                                                        size="md"
                                                        color="#d1d5db"
                                                    ></box-icon
                                                ></span>
                                                <span class="pr-2"
                                                    ><box-icon
                                                        name="instagram"
                                                        type="logo"
                                                        size="md"
                                                        color="#d1d5db"
                                                    ></box-icon
                                                ></span>
                                                <span class="pr-2"
                                                    ><box-icon
                                                        name="youtube"
                                                        type="logo"
                                                        size="md"
                                                        color="#d1d5db"
                                                    ></box-icon
                                                ></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section: Design Block -->
            </div>
        </div>
    </div>
</template>

<script>
import "boxicons";
import Swal from "sweetalert2";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
moment.locale("th");
import { GoogleMap, Marker, InfoWindow, CustomMarker } from "vue3-google-map";

export default {
    mounted() {
        this.getMap();
        this.getPost();
        this.getCollap();
    },
    data() {
        return {
            mapList: "",
            mapPath: "/storage/maps/",
            collapList: "",
            collapPath: "/storage/collaps/",
            postList: "",
            postPath: "/storage/posts/",
            dataCont: {
                name: "",
                email: "",
                detail: "",
            },
            moment: moment,
            path: "/img/icon/",
            pathMap: "/storage/maps/thumbnails/",
        };
    },
    methods: {
        getMap() {
            axios
                .get("/api/showMap")
                .then((response) => {
                    this.mapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getCollap() {
            axios
                .get("/api/showCollap")
                .then((response) => {
                    this.collapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getPost() {
            axios
                .get("/api/showPost")
                .then((response) => {
                    this.postList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        postDetail(id) {
            this.$router.push("/postDetail/" + id);
        },
        mapDetail(id) {
            this.$router.push("/mapDetail/" + id);
        },
        linkMap(link) {
            window.open(link, "_blank");
        },
        sendContact() {
            axios
                .post("/api/contact", this.dataCont)
                .then((response) => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "บันทึกข้อมูลเรียบร้อย กรุณารอการติดต่อกลับจากทางเจ้าหน้าที่ทางอีเมล",
                        showConfirmButton: false,
                        timer: 5000,
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        removeTag(str) {
            return str.replace(/&nbsp;|(<([^>]+)>)/g, "").substring(0, 200);
        },
    },
    components: { GoogleMap, Marker, InfoWindow, CustomMarker },
    setup() {
        const center = { lat: 15.286098648061838, lng: 100.96467575092925 };

        return { center };
    },
};
</script>
