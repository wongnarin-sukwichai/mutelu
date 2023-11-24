<template>
    <transition name="slide-fade">
        <div v-if="user">
            <div class="bg-lime-400 bg-opacity-5 text-center py-4 lg:px-4">
                <div
                    class="p-2 bg-lime-600 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert"
                >
                    <span
                        class="flex rounded-full bg-lime-500 uppercase px-2 py-1 text-xs font-bold mr-3"
                        ><i class="fas fa-check"></i
                    ></span>
                    <span class="mr-2 text-left flex-auto text-white"
                        >ยินดีต้อนรับสมาชิกเข้าสู่ระบบ</span
                    >
                </div>
            </div>

            <div class="w-full justify-center mt-8">
                <div
                    class="box-border h-16 w-full border-4 border-gray-300 border-dashed hover:border-gray-400 cursor-pointer"
                >
                    <router-link
                        to="/map"
                        class="flex justify-center p-4 text-gray-500 font-semibold"
                    >
                        <i class="fas fa-map pr-2"></i>ไปยังแผนที่
                    </router-link>
                </div>
            </div>

            <div class="w-full justify-center mt-8">
                <div
                    class="box-border h-16 w-full border-4 border-gray-300 border-dashed hover:border-gray-400 cursor-pointer"
                >
                    <router-link
                        to="/home"
                        class="flex justify-center p-4 text-gray-500 font-semibold"
                    >
                        <i class="fas fa-house-lock pr-2"></i>ไปยังระบบหลังบ้าน
                    </router-link>
                </div>
            </div>
        </div>
    </transition>

    <div class="bg-white rounded-lg">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <!-- Map Detail -->
            <center>
                <div class="google-maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61288.662905121535!2d103.249047!3d16.243998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3122a6a4f3069f8b%3A0xf02b541f28931c0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lih4Lir4Liy4Liq4Liy4Lij4LiE4Liy4Lih!5e0!3m2!1sth!2sth!4v1689667666621!5m2!1sth!2sth"
                        width="1200"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </center>

            <!-- Post -->
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-gray-200 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <article
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div
                        class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                    >
                        <img
                            src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="h-full w-full object-cover object-center"
                        />
                    </div>
                    <div class="flex items-center gap-x-4 text-xs mt-4">
                        <time datetime="2020-03-16" class="text-gray-500"
                            >Mar 16, 2020</time
                        >
                        <a
                            href="#"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >Marketing</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Boost your conversion rate
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
                        >
                            Illo sint voluptas. Error voluptates culpa eligendi.
                            Hic vel totam vitae illo. Non aliquid explicabo
                            necessitatibus unde. Sed exercitationem placeat
                            consectetur nulla deserunt vel. Iusto corrupti
                            dicta.
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img
                            src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt=""
                            class="h-10 w-10 rounded-full bg-gray-50"
                        />
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Michael Foster
                                </a>
                            </p>
                            <p class="text-gray-600">Co-Founder / CTO</p>
                        </div>
                    </div>
                </article>

                <!-- More posts... -->
            </div>

            <!-- Category -->
            <div class="mx-auto max-w-2xl py-8 sm:py-12 lg:max-w-none lg:py-16">
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold text-gray-900">
                        เรื่องราวความเชื่อ/ภูมิปัญญา/อาถรรพ์
                    </h2>
                    <h2
                        class="justify-end text-blue-500 cursor-pointer hover:text-blue-600"
                    >
                        อ่านทั้งหมด <i class="fas fa-angles-right"></i>
                    </h2>
                </div>

                <div
                    class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0"
                >
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                        >
                            <img
                                src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="h-full w-full object-cover object-center"
                            />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Desk and Office
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">
                            Work from home accessories
                        </p>
                    </div>
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                        >
                            <img
                                src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                                alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                                class="h-full w-full object-cover object-center"
                            />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Self-Improvement
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">
                            Journals and note-taking
                        </p>
                    </div>
                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64"
                        >
                            <img
                                src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg"
                                alt="Collection of four insulated travel bottles on wooden shelf."
                                class="h-full w-full object-cover object-center"
                            />
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Travel
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">
                            Daily commute essentials
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team -->
            <section class="text-center">
                <h2 class="mb-12 text-3xl font-bold">เครือข่ายความร่วมมือ</h2>

                <div
                    class="lg:gap-xl-12 grid gap-x-6 md:grid-cols-3 xl:grid-cols-4"
                >
                    <div class="mb-12">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.jpg"
                            class="mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20"
                            alt=""
                            style="max-width: 100px"
                        />

                        <p class="mb-2 font-bold">John Doe</p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            Co-founder
                        </p>
                    </div>

                    <div class="mb-12">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/5.jpg"
                            class="mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20"
                            alt=""
                            style="max-width: 100px"
                        />

                        <p class="mb-2 font-bold">Lisa Ferrol</p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            Web designer
                        </p>
                    </div>

                    <div class="mb-12">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/6.jpg"
                            class="mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20"
                            alt=""
                            style="max-width: 100px"
                        />
                        <p class="mb-2 font-bold">Maria Smith</p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            Senior consultant
                        </p>
                    </div>
                    <div class="mb-12">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/7.jpg"
                            class="mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20"
                            alt=""
                            style="max-width: 100px"
                        />
                        <p class="mb-2 font-bold">Agatha Bevos</p>
                        <p class="text-neutral-500 dark:text-neutral-300">
                            Co-founder
                        </p>
                    </div>
                </div>
            </section>
            <!-- Section: Design Block -->

            <!-- Contact -->
            <div class="my-4 mx-auto md:px-6">
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
                                                support@example.com
                                            </p>
                                            <p class="text-neutral-500">
                                                +1 234-567-89
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
                                                sales@example.com
                                            </p>
                                            <p class="text-neutral-500">
                                                +1 234-567-89
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
                                                press@example.com
                                            </p>
                                            <p class="text-neutral-500">
                                                +1 234-567-89
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

export default {
    mounted() {},
    data() {
        return {
            dataCont: {
                name: "",
                email: "",
                detail: "",
            },
        };
    },
    methods: {
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
    },
};
</script>
