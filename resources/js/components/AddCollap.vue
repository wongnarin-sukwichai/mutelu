<template>
    <div class="justify-center p-8">
        <form @submit.prevent="sendCollap()">
            <div class="flex grid grid-cols-4 ">
                <div class="px-4 py-5 sm:px-6 col-span-2 ">
                    <h3 class="text-lg leading-6 font-medium text-gray-700">
                        <box-icon
                            name="transfer-alt"
                            color="gray"
                            size="lg"
                            class="pr-2"
                        ></box-icon
                        >เครือข่ายความร่วมมือ
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Cooperation
                    </p>
                </div>
            </div>

            <div class="border-t">
                <dl>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mt-8"
                    >
                        <dt class="text-sm font-medium text-gray-500 text-right">
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
                                <box-icon name="trash" size="xs" color="#f87171" class=""></box-icon>
                            </button>
                        </div>
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
                        <dt class="text-sm font-medium text-gray-500 text-right">
                            ชื่อ
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-pink-200 hover:ring-inset outline-0"
                            v-model="dataCol.name"
                            required
                        />
                    </div>
                    <div
                        class=" px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm font-medium text-gray-500 text-right">
                            นามสกุล
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-pink-200 hover:ring-inset outline-0"
                            v-model="dataCol.surname"
                            required
                        />
                    </div>
                    <div
                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm font-medium text-gray-500 text-right">
                            รายละเอียด
                        </dt>
                        <input
                            type="text"
                            class="p-2 block w-full rounded-md border py-1.5 text-gray-900 shadow-sm sm:text-sm hover:ring-2 hover:ring-pink-200 hover:ring-inset outline-0"
                            v-model="dataCol.detail"
                            required
                        />
                    </div>
                </dl>
            </div>

            <div class="flex justify-end mt-4">
                <router-link to="/collap" class="mr-2"
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

export default {
    mounted() {},
    data() {
        return {
            previewImage: "",
            file: null,
            dataCol: {
                pic: "",
                name: "",
                surname: "",
                detail: "",
            },
        };
    },
    methods: {
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

        async sendCollap() {
            if (this.file != null) {
                let formData = new FormData(); //สร้าง FromData เพื่อรองรับข้อมูลประเภท File
                formData.append("file", this.file[0]);

                try {
                    await this.$store.dispatch("uploadPicCollap", formData);
                } catch (err) {
                    console.log(err);
                }
                this.dataCol.pic = this.$store.getters.getPicName;
            }

            try {
                await this.$store.dispatch("storeCollap", this.dataCol);
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "บันทึกข้อมูลเรียบร้อย",
                    showConfirmButton: false,
                    timer: 1500,
                });
                this.$router.push({ name: "collap" });
            } catch (err) {
                console.log(err);
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
</style>
