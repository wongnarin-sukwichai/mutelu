<template>
    <div class="justify-center p-8">
        <form @submit.prevent="updateMap()">
            <div class="flex grid grid-cols-4">
                <div class="px-4 py-5 sm:px-6 col-span-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-700">
                        <box-icon
                            name="cog"
                            color="gray"
                            size="lg"
                            class="pr-2"
                        ></box-icon
                        >แก้ไขแผนที่
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Edit Map</p>
                </div>
            </div>

            <div class="border-t">
                <dl>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mt-8"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            รูปภาพ
                        </dt>
                        <div class="flex">
                            <input
                                class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-xs font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary mr-2"
                                ref="fileInput"
                                type="file"
                                @input="pickFile"
                            />
                            <button
                                type="button"
                                class="rounded-md bg-white px-2.5 text-sm text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 hover:text-gray-500 hover:bg-gray-50"
                                @click="resetFile()"
                            >
                                <box-icon
                                    name="trash"
                                    size="xs"
                                    color="#f87171"
                                    class=""
                                ></box-icon>
                            </button>
                        </div>
                        <transition name="fade" mode="out-in">
                            <div
                                class="text-red-500 text-sm"
                                v-show="chkPic === false"
                            >
                                ** กรุณาเลือกรูป
                            </div>
                        </transition>
                    </div>
                </dl>

                <dl>
                    <div class="flex px-4 justify-center">
                        <transition name="fade" mode="out-in">
                            <div
                                v-if="previewImage"
                                class="imagePreviewWrapper"
                                :style="{
                                    'background-image': `url(${previewImage})`,
                                }"
                                @click="selectImage"
                            ></div>
                        </transition>
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            ประเภท
                        </dt>
                        <div class="relative mt-1">
                            <button
                                type="button"
                                class="relative w-full cursor-pointer rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 sm:text-sm sm:leading-6"
                                aria-haspopup="listbox"
                                aria-expanded="true"
                                aria-labelledby="listbox-label"
                                @click="selType = !selType"
                            >
                                <span class="flex items-center">
                                    <img
                                        :src="path + iconType"
                                        alt=""
                                        class="h-5 w-5 flex-shrink-0 rounded-full"
                                    />
                                    <span class="ml-3 block truncate">
                                        {{ callType }}
                                    </span>
                                </span>
                                <span
                                    class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2"
                                >
                                    <svg
                                        class="h-5 w-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </span>
                            </button>

                            <!-- Start Selected -->
                            <transition name="fade" mode="out-in">
                                <ul
                                    type="button"
                                    class="relative w-full cursor-pointer rounded-md bg-white mt-2 py-1.5 pl-3 pr-3 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-300 sm:text-sm sm:leading-6"
                                    aria-haspopup="listbox"
                                    aria-expanded="true"
                                    aria-labelledby="listbox-label"
                                    v-if="selType"
                                >
                                    <li
                                        class="text-gray-900 relative cursor-pointer select-none py-2 pl-3 pr-9 hover:text-white hover:bg-indigo-300"
                                        id="listbox-option-0"
                                        role="option"
                                        v-for="(type, index) in showType"
                                        :key="index"
                                        @click="pickType(index)"
                                    >
                                        <div class="flex items-center">
                                            <img
                                                :src="path + type.pic"
                                                class="h-5 w-5 flex-shrink-0 rounded-full"
                                            />
                                            <div class="ml-3 block truncate">
                                                {{ type.title }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </transition>
                        </div>
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            ชื่อสถานที่
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-blue-400 hover:ring-inset outline-0"
                            placeholder="** ไม่เกิน 255 อักขระ"
                            v-model="dataMap.title"
                            ref="title"
                            :class="
                                this.chkLength === false
                                    ? 'border-2 border-red-200'
                                    : ''
                            "
                            required
                        />
                        <transition name="fade" mode="out-in">
                            <div
                                class="text-red-500 text-sm"
                                v-show="chkLength === false"
                            >
                                ** ข้อความเกิน 200 อักขระ
                            </div>
                        </transition>
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            ละติจูด
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-blue-400 hover:ring-inset outline-0"
                            v-model="dataMap.lat"
                            required
                        />
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            ลองติจูด
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-blue-400 hover:ring-inset outline-0"
                            v-model="dataMap.lon"
                            required
                        />
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt
                            class="text-sm font-medium text-gray-500 text-right"
                        >
                            ลิ้งค์ Google Map
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-blue-400 hover:ring-inset outline-0"
                            v-model="dataMap.gmap"
                            required
                        />
                    </div>
                    <div class="px-4 py-2 grid-cols-4">
                        <dt
                            class="text-sm font-medium text-gray-500 text-left mb-2"
                        >
                            รายละเอียด
                        </dt>
                        <ckeditor
                            class="max-height-48"
                            :editor="editor"
                            v-model="dataMap.detail"
                            :config="editorConfig"
                        ></ckeditor>
                    </div>
                </dl>
            </div>

            <div class="flex justify-end mt-4">
                <router-link to="/map" class="mr-2"
                    ><button
                        class="bg-gray-200 hover:bg-gray-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                    >
                        กลับหน้าหลัก
                    </button></router-link
                >

                <button
                    class="bg-green-200 hover:bg-green-300 shadow-lg rounded-md p-2 text-sm text-gray-700"
                    type="submit"
                >
                    บันทึก
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import "boxicons";
import Swal from "sweetalert2";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
    mounted() {
        this.getMap();
        this.getType();
    },
    data() {
        return {
            previewImage: "",
            file: null,
            chkLength: true,
            chkPic: true,
            dataMap: {
                id: this.$route.params.id,
                pic: "",
                type: "",
                icon: "",
                call: "",
                title: "",
                lat: "",
                lon: "",
                gmap: "",
                detail: "",
            },
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the editor.
            },
            showType: "",
            selType: false,
            path: "/img/icon/",
            idType: "",
            iconType: "",
            callType: "",
        };
    },
    methods: {
        getMap() {
            axios
                .get("/api/map/" + this.$route.params.id)
                .then((response) => {
                    this.previewImage = "/storage/maps/" + response.data.pic;
                    this.dataMap.pic = response.data.pic;

                    this.idType = response.data.type;
                    this.iconType = response.data.icon;
                    this.callType = response.data.call;

                    this.dataMap.title = response.data.title;
                    this.dataMap.lat = response.data.lat;
                    this.dataMap.lon = response.data.lon;
                    this.dataMap.gmap = response.data.gmap;
                    this.dataMap.detail = response.data.detail;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getType() {
            axios
                .get("/api/type")
                .then((Response) => {
                    this.showType = Response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        pickType(code) {
            this.selType = false;

            this.idType = this.showType[code].id;
            this.iconType = this.showType[code].pic;
            this.callType = this.showType[code].title;
        },

        resetFile() {
            this.$refs.fileInput.value = null; //clear ช่อง choose
            this.previewImage = "";
            this.file = "";
        },

        //image upload and preview methods
        selectImage() {
            this.$refs.fileInput.click();
        },

        pickFile() {
            let input = this.$refs.fileInput;
            this.file = input.files; //เอาไฟล์รูปเข้าตัวแปร file
            //console.log(this.file[0])
            if (this.file && this.file[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage = e.target.result;
                    //this.file = e.target.files[0];
                };
                reader.readAsDataURL(this.file[0]);
                this.$emit("input", this.file[0]);
            }
        },

        async updateMap() {
            if (this.dataMap.title != null && this.dataMap.title.length > 255) {
                this.$refs.title.focus();
                this.chkLength = false;
            } else if (this.previewImage == null) {
                this.chkPic = false;
            } else {
                if (this.file != null) {
                    let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                    formData.append("file", this.file[0]);

                    try {
                        await this.$store.dispatch("uploadPicMap", formData);
                    } catch (err) {
                        console.log(err);
                    }
                    this.dataMap.pic = this.$store.getters.getPicName;
                }

                this.dataMap.type = this.idType;
                this.dataMap.icon = this.iconType;
                this.dataMap.call = this.callType;

                try {
                    await this.$store.dispatch("updateMap", this.dataMap);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "บันทึกข้อมูลเรียบร้อย",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.$router.push({ name: "map" });
                } catch (err) {
                    console.log(err);
                }
            }
        },
    },
};
</script>

<style>
.imagePreviewWrapper {
    width: 250px;
    height: 250px;
    display: block;
    cursor: pointer;
    margin: 0 auto;
    background-size: cover;
    background-position: center center;
}

.ck-editor__editable {
    max-height: 400px;
}
</style>
