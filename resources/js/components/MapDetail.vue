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
                            :src="path + mapDetail.pic"
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
                                    moment(mapDetail.created_at).format(
                                        "d MMM YYYY"
                                    )
                                }}
                                โดย
                            </span>
                            {{ mapDetail.created_by }}
                        </div>
                    </div>

                    <div class="my-8" v-if="user" @click="showModal()">
                        <div
                            class="flex justify-center border border-2 border-dashed border-amber-300 hover:border-amber-400 py-12 mb-1 cursor-pointer"
                        >
                            <h1 class="pr-8 text-6xl text-amber-400">
                                {{ rec1 }}
                            </h1>
                            <h1 class="pr-8 text-6xl text-amber-400">
                                {{ rec2 }}
                            </h1>
                            <h1 class="pr-8 text-6xl text-rose-400">
                                {{ rec3 }}
                            </h1>
                        </div>
                        <span class="flex justify-end text-gray-300 italic"
                            >** Click ที่กรอบเพื่อเพิ่มเลขเสี่ยงโชค</span
                        >
                    </div>

                    <h1 class="mb-6 text-3xl font-bold">
                        {{ mapDetail.title }}
                    </h1>

                    <p class="indent-8" v-html="mapDetail.detail"></p>
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

    <!-- Modal Show -->
    <transition name="fade" mode="out-in">
        <div
            class="relative z-10"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
            v-show="isModalShow"
        >
            <div
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            ></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                    >
                        <form @submit.prevent="sendNum()">
                            <div class="bg-white px-4 pt-5 sm:p-4 sm:pb-2">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-200 sm:mx-0 sm:h-10 sm:w-10"
                                    >
                                        <box-icon
                                            name="plus"
                                            color="#fff"
                                        ></box-icon>
                                    </div>
                                    <div
                                        class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full"
                                    >
                                        <label
                                            id="listbox-label"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                        >
                                            เลขมงคล :
                                            <span class="text-gray-400 italic"
                                                >** ไม่เกิน 3 หลัก</span
                                            ></label
                                        >
                                        <input
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            required
                                            v-model="dataNum.number"
                                            @keypress="onlyNumber"
                                        />
                                    </div>
                                </div>
                                <transition name="fade" mode="out-in">
                                    <div
                                        class="flex justify-center mt-1 text-red-400"
                                        v-show="showErr"
                                    >
                                        ** {{ this.err }} **
                                    </div>
                                </transition>
                            </div>

                            <div
                                class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                            >
                                <button
                                    type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-green-500 px-3 py-2 text-sm text-white shadow-sm hover:bg-green-600 sm:ml-3 sm:w-auto"
                                >
                                    ส่งข้อมูล
                                </button>
                                <button
                                    type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm text-gray-900 shadow-sm hover:bg-gray-200 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                    @click="closeModal()"
                                >
                                    ออก
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import "boxicons";
import Swal from "sweetalert2";
import moment from "moment"; //format date thai
import "moment/dist/locale/th";
import axios from "axios";
moment.locale("th");

export default {
    mounted() {
        this.getMap();
        this.getRecord();
    },
    data() {
        return {
            path: "/storage/maps/",
            mapDetail: "",
            moment: moment,
            user: "",
            isModalShow: false,
            showErr: false,
            err: "",
            dataNum: {
                id: this.$route.params.id,
                number: "",
                type: "",
                today: moment().format("YYYY-MM-DD"),
                start: "",
                end: "",
            },
            recordList: "",
            rec1: "",
            rec2: "",
            rec3: "",
        };
    },
    methods: {
        getMap() {
            axios
                .get("/api/mapDetail/" + this.$route.params.id)
                .then((response) => {
                    this.mapDetail = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getRecord() {
            this.chkDay(this.dataNum.today);
            axios
                .post("/api/getRecord", this.dataNum)
                .then((response) => {
                    this.recordList = response.data;
                    this.rec1 = response.data.count_1[0].number;
                    if (response.data.count_1.length > 1) {
                        this.rec2 = response.data.count_1[1].number;
                    }
                    this.rec3 = response.data.count_2[0].number;              
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        showModal() {
            this.isModalShow = true;
        },
        closeModal() {
            this.isModalShow = false;
        },
        async sendNum() {
            var check = this.dataNum.number.length;
            if (check < 2 || check > 3) {
                this.err = "ข้อมูลต้องไม่น้อยกว่า 2 หลัก และไม่เกิน 3 หลัก";
                this.showErr = true;
            } else {
                this.dataNum.type = check;

                try {
                    await this.$store.dispatch("storeRecord", this.dataNum);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "บันทึกข้อมูลเรียบร้อย",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.isModalShow = false;
                    this.getRecord();
                } catch (err) {
                    console.log(err);
                    Swal.fire({
                        icon: "error",
                        title: "ผิดพลาด",
                        text: "เพิ่มข้อมูลไม่ได้ กรุณาติดต่อเจ้าหน้าที่",
                        timer: 1500,
                    });
                }
            }
        },
        onlyNumber($event) {
            //Check ข้อมูลต้องตัวเลขเท่านั้น
            let keyCode = $event.keyCode ? $event.keyCode : $event.which;
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) {
                // 46 is dot
                $event.preventDefault();
            }
        },
        chkDay(day) {
            var check = moment().format("YYYY-MM-15");
            if (day <= check) {
                this.dataNum.start = moment().format("YYYY-MM-01");
                this.dataNum.end = check;
            } else {
                this.dataNum.start = moment().format("YYYY-MM-16");
                this.dataNum.end = moment().format("YYYY-MM-31");
            }
        },
    },
    computed: {
        user() {
            return this.$store.getters.user;
        },
    },
};
</script>
