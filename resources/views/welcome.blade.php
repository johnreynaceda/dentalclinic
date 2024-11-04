<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        [x-cloak] {
            display: none !important;
        }

        swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="fixed top-0 bottom-0 w-full h-full">
        <img src="{{ asset('images/bg.jpg') }}" class="object-cover h-full w-full 2xl:h-auto  opacity-90"
            alt="">
    </div>
    <div class="justify-center w-full mx-auto sticky top-0 z-50 relative bg-main">
        <section class="w-full px-6  antialiased ">
            <div class="mx-auto max-w-7xl">

                <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                    <div
                        class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium  md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
                        <div class="flex items-center justify-start w-1/4 h-full pr-4">
                            <a href="#_" class="flex items-center py-4 space-x-5  md:py-0">
                                <img src="{{ asset('images/gclogo.png') }}" class="h-16" alt="">
                                <span class="text-xl text-white">GC Dental</span>
                            </a>
                        </div>
                        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                            :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                            <div
                                class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                                <a href="#_"
                                    class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">
                                    <img src="{{ asset('images/gclogo.png') }}" class="h-10" alt="">
                                    <span class="text-main">GC DENTAL</span>
                                </a>
                                <div
                                    class="flex flex-col items-start justify-center w-full space-x-6 text-center text-lg  lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                    <a href="#_"
                                        class="inline-block w-full py-2 mx-0 ml-6 text-left text-main 2xl:text-white hover:text-gray-700 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
                                    <a href="#about"
                                        class="inline-block w-full py-2 mx-0  text-left  text-main 2xl:text-white hover:text-gray-700 md:w-auto md:px-0 md:mx-2  lg:mx-3 md:text-center">About
                                        Us</a>
                                    <a href="#services"
                                        class="inline-block w-full py-2 mx-0  text-left text-main 2xl:text-white hover:text-gray-700  md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Services</a>


                                </div>
                                <div class="mt-10 2xl:mt-0">
                                    <a href="{{ route('login') }}"
                                        class="inline-flex items-center w-full px-5 py-3 text-sm font-medium leading-4  bg-white md:w-auto md:rounded-full text-main hover:bg-gray-200 ">Log
                                        In</a>
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center w-full px-5 py-3 text-sm font-medium leading-4  bg-white md:w-auto md:rounded-full text-main hover:bg-gray-200 ">Register
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div @click="showMenu = !showMenu"
                            class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                            <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                </nav>

                <!-- Main Hero Content -->

                <!-- End Main Hero Content -->

            </div>
        </section>
    </div>
    <!-- Main hero section with headline and call to action -->
    <section class="relative opacity-0">
        <div class="px-8 2xl:py-48 py-20 mx-auto md:px-12 lg:px-24 max-w-7xl relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                <div>
                    <p class="text-accent-600 uppercase font-mono font-medium tracking-tight text-xs">
                        Tagline
                    </p>
                    <h1 class="text-4xl font-semibold tracking-tight text-base-900 lg:text-balance mt-4">
                        Transforming the banking experience for a digital future
                    </h1>
                    <p class="text-base font-medium text-base-500 mt-4">
                        The fastest method for working together on staging and temporary
                        environments.
                    </p>
                    <div class="flex flex-wrap items-center gap-2 mx-auto mt-8">
                        <button
                            class="flex items-center justify-center transition-all duration-200 focus:ring-2 transition-shadow focus:outline-none text-white bg-accent-600 hover:bg-accent-700 focus:ring-accent-500/50 h-9 px-4 py-2 text-sm font-medium rounded-md">
                            Get started
                        </button>
                        <button
                            class="flex items-center justify-center transition-all duration-200 focus:ring-2 transition-shadow focus:outline-none text-base-500 bg-white hover:text-accent-500 ring-1 ring-base-200 focus:ring-accent-500 h-9 px-4 py-2 text-sm font-medium rounded-md">
                            Learn more
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <img class="object-cover h-full border shadow rounded-2xl" src="/images/dashboardLight.svg"
                        alt="#_" />
                </div>
            </div>
            <div
                class="mx-auto grid mt-10 grid-cols-4 items-center gap-x-8 gap-y-10 sm:grid-cols-6 sm:gap-x-10 lg:-mx-6 lg:grid-cols-5">
                <img class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/1.svg" alt="#_"
                    width="158" height="48" /><img class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain"
                    src="/brands/2.svg" alt="#_" width="158" height="48" /><img
                    class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/3.svg" alt="#_"
                    width="158" height="48" /><img
                    class="col-span-2 sm:col-start-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/4.svg"
                    alt="#_" width="158" height="48" /><img
                    class="col-span-2 col-start-2 sm:col-start-auto lg:col-span-1 max-h-12 w-full object-contain"
                    src="/brands/5.svg" alt="#_" width="158" height="48" />
            </div>
        </div>
    </section>
    <!-- Feature section highlighting key benefits or services -->

    <!-- Testimonials section displaying customer feedback -->

    <!-- Pricing section with available plans and details -->
    <section id="about" class="bg-white bg-opacity-90 mb-10 relative" x-data="{ duration: 'monthly' }">
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-screen-xl relative">
            <div class="max-w-xl text-center mx-auto">

                <h1 class="text-4xl font-semibold tracking-tight text-base-900 lg:text-balance mt-4">
                    About Us
                </h1>


            </div>
            <section class="px-2 py-20 b md:px-0">
                <div class="space-y-40 hidden 2xl:block">
                    <div class="container items-center max-w-7xl  mx-auto xl:px-5">
                        <div class="flex space-x-10">
                            <div class="w-full md:w-1/2">
                                <div class="w-full h-96 overflow-hidden rounded-md shadow-xl sm:rounded-xl"
                                    data-rounded="rounded-xl" data-rounded-max="rounded-full">
                                    <img src="{{ asset('images/bg1.jpg') }}"
                                        class="transition-transform duration-300 shadow-xl ease-in-out transform hover:scale-110 h-full object-cover">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 md:px-3">
                                <div
                                    class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                                    <h1
                                        class="text-4xl font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                                        GC DENTAL
                                    </h1>
                                    <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                                        branch of dentistry focuses on resolving problems or injuries to the mouth,
                                        teeth,
                                        and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                                        teeth,
                                        as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                                        When
                                        complications arise during routine tooth extraction, surgical extraction is
                                        required. In such circumstances, the dentist would have to administer a general
                                        anesthetic to the patient. There are two types of surgical extractions that are
                                        frequently used.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container items-center max-w-7xl  mx-auto xl:px-5">
                        <div class="flex space-x-10">
                            <div class="w-full md:w-1/2 md:px-3">
                                <div
                                    class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                                    <h1
                                        class="text-4xl font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                                        VISION
                                    </h1>
                                    <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                                        branch of dentistry focuses on resolving problems or injuries to the mouth,
                                        teeth,
                                        and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                                        teeth,
                                        as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                                        When
                                        complications arise during routine tooth extraction, surgical extraction is
                                        required. In such circumstances, the dentist would have to administer a general
                                        anesthetic to the patient. There are two types of surgical extractions that are
                                        frequently used.</p>

                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="w-full h-96 overflow-hidden rounded-md shadow-xl sm:rounded-xl"
                                    data-rounded="rounded-xl" data-rounded-max="rounded-full">
                                    <img src="{{ asset('images/bg1.jpg') }}"
                                        class="transition-transform duration-300 shadow-xl ease-in-out transform hover:scale-110 h-full object-cover">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="container items-center max-w-7xl  mx-auto xl:px-5">
                        <div class="flex space-x-10">
                            <div class="w-full md:w-1/2">
                                <div class="w-full h-96 overflow-hidden rounded-md shadow-xl sm:rounded-xl"
                                    data-rounded="rounded-xl" data-rounded-max="rounded-full">
                                    <img src="{{ asset('images/bg1.jpg') }}"
                                        class="transition-transform duration-300 shadow-xl ease-in-out transform hover:scale-110 h-full object-cover">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 md:px-3">
                                <div
                                    class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                                    <h1
                                        class="text-4xl font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                                        MISSION
                                    </h1>
                                    <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                                        branch of dentistry focuses on resolving problems or injuries to the mouth,
                                        teeth,
                                        and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                                        teeth,
                                        as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                                        When
                                        complications arise during routine tooth extraction, surgical extraction is
                                        required. In such circumstances, the dentist would have to administer a general
                                        anesthetic to the patient. There are two types of surgical extractions that are
                                        frequently used.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="2xl:hidden space-y-20">
                    <div>
                        <img src="{{ asset('images/bg1.jpg') }}" class="rounded-xl shadow-xl" alt="">
                        <h1
                            class="text-4xl mt-5 font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            GC DENTAL
                        </h1>
                        <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                            branch of dentistry focuses on resolving problems or injuries to the mouth,
                            teeth,
                            and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                            teeth,
                            as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                            When
                            complications arise during routine tooth extraction, surgical extraction is
                            required. In such circumstances, the dentist would have to administer a general
                            anesthetic to the patient. There are two types of surgical extractions that are
                            frequently used.</p>
                    </div>
                    <div>
                        <img src="{{ asset('images/bg1.jpg') }}" class="rounded-xl shadow-xl" alt="">
                        <h1
                            class="text-4xl mt-5 font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            VISION
                        </h1>
                        <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                            branch of dentistry focuses on resolving problems or injuries to the mouth,
                            teeth,
                            and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                            teeth,
                            as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                            When
                            complications arise during routine tooth extraction, surgical extraction is
                            required. In such circumstances, the dentist would have to administer a general
                            anesthetic to the patient. There are two types of surgical extractions that are
                            frequently used.</p>
                    </div>
                    <div>
                        <img src="{{ asset('images/bg1.jpg') }}" class="rounded-xl shadow-xl" alt="">
                        <h1
                            class="text-4xl mt-5 font-extrabold tracking-tight text-main sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            MISSION
                        </h1>
                        <p class="mx-auto text-gray-500 sm:max-w-md text-justify  md:max-w-3xl">This
                            branch of dentistry focuses on resolving problems or injuries to the mouth,
                            teeth,
                            and jaw. Oral surgery is frequently used to remove damaged teeth and wisdom
                            teeth,
                            as well as to prepare the mouth for dentures and to treat jaw abnormalities.
                            When
                            complications arise during routine tooth extraction, surgical extraction is
                            required. In such circumstances, the dentist would have to administer a general
                            anesthetic to the patient. There are two types of surgical extractions that are
                            frequently used.</p>
                    </div>

                </div>
            </section>

        </div>
    </section>

    <section id="services" class="bg-white bg-opacity-90 relative" x-data="{ duration: 'monthly' }">
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-screen-xl relative">
            <div class="max-w-xl text-center mx-auto">

                <h1 class="text-4xl font-semibold tracking-tight text-base-900 lg:text-balance mt-4">
                    Our Services
                </h1>
                <p class="text-base font-medium text-base-500 mt-4 lg:text-balance">
                    Choose a plan that works the best for you and your team. Start small,
                    upgrade when you need to.
                </p>

            </div>
            <livewire:home-services />
        </div>
    </section>

    <section id="contact" class="bg-white mt-10 bg-opacity-90 relative" x-data="{ duration: 'monthly' }">
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-screen-xl relative">

            <div class="grid sm:grid-cols-2 items-start gap-16  p-4 mx-auto max-w-4xl  font-[sans-serif]">
                <div>
                    <h1 class="text-gray-800 text-3xl font-extrabold">Let's Talk</h1>
                    <p class="text-sm text-gray-500 mt-4">We’re here to help! If you have any questions or concerns
                        please don’t hesitate to reach out. Our friendly team is ready to assist you</p>

                    <div class="mt-12">
                        <h2 class="text-gray-800 text-base font-bold">Email</h2>
                        <ul class="mt-4 space-y-3">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] h-10 w-10 rounded-full text-main flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                        viewBox="0 0 479.058 479.058">
                                        <path
                                            d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                                <a href="javascript:void(0)" class="text-main text-sm ml-4">
                                    <small class="block">Mail</small>
                                    <strong>GCDental@gmail.com</strong>
                                </a>
                            </li>
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] h-10 w-10 rounded-full  flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                                <a href="javascript:void(0)" class="text-main text-sm ml-4">
                                    <small class="block">Phone Number</small>
                                    <strong>09123456789</strong>
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>

                {{-- <form class="ml-auto space-y-4">
                    <input type='text' placeholder='Name'
                        class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-blue-500 focus:bg-transparent" />
                    <input type='email' placeholder='Email'
                        class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-blue-500 focus:bg-transparent" />
                    <input type='text' placeholder='Subject'
                        class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-blue-500 focus:bg-transparent" />
                    <textarea placeholder='Message' rows="6"
                        class="w-full rounded-md px-4 bg-gray-100 text-gray-800 text-sm pt-3 outline-blue-500 focus:bg-transparent"></textarea>
                    <button type='button'
                        class="text-white bg-main hover:bg-blue-600 tracking-wide rounded-md text-sm px-4 py-3 w-full !mt-6">Send</button>
                </form> --}}
            </div>
        </div>
    </section>
    <!-- Frequently Asked Questions section -->
    {{-- <section class="relative opacity-0">
        <div class="px-8 py-10 mx-auto md:px-12 lg:px-24 max-w-7xl relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">

                <div class="lg:col-span-2">
                    <img class="object-cover h-full border shadow rounded-2xl" src="/images/dashboardLight.svg"
                        alt="#_" />
                </div>
            </div>
            <div
                class="mx-auto grid mt-10 grid-cols-4 items-center gap-x-8 gap-y-10 sm:grid-cols-6 sm:gap-x-10 lg:-mx-6 lg:grid-cols-5">
                <img class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/1.svg"
                    alt="#_" width="158" height="48" /><img
                    class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/2.svg"
                    alt="#_" width="158" height="48" /><img
                    class="col-span-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/3.svg"
                    alt="#_" width="158" height="48" /><img
                    class="col-span-2 sm:col-start-2 lg:col-span-1 max-h-12 w-full object-contain" src="/brands/4.svg"
                    alt="#_" width="158" height="48" /><img
                    class="col-span-2 col-start-2 sm:col-start-auto lg:col-span-1 max-h-12 w-full object-contain"
                    src="/brands/5.svg" alt="#_" width="158" height="48" />
            </div>
        </div>
    </section> --}}
    <!-- Footer section with links, contact info, and social media -->
    <section class="relative bg-main">
        <div class="px-8 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl relative">
            {{-- <div class="grid items-end grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <h3 class="tracking-tight text-xl font-medium text-base-900">
                        Get started with our app today
                    </h3>
                    <p class="text-base font-medium text-base-500 mt-2 lg:text-balance">
                        Streamline your workflow and collaborate seamlessly on staging and
                        temporary environments
                    </p>
                </div>
                <div class="flex flex-col lg:flex-row items-center gap-2 sm:ml-auto">
                    <button
                        class="flex items-center justify-center transition-all duration-200 focus:ring-2 transition-shadow focus:outline-none text-base-500 bg-white hover:text-accent-500 ring-1 ring-base-200 focus:ring-accent-500 h-9 px-4 py-2 text-sm font-medium rounded-md gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-apple size-4"
                            slot="left-icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M8.286 7.008c-3.216 0 -4.286 3.23 -4.286 5.92c0 3.229 2.143 8.072 4.286 8.072c1.165 -.05 1.799 -.538 3.214 -.538c1.406 0 1.607 .538 3.214 .538s4.286 -3.229 4.286 -5.381c-.03 -.011 -2.649 -.434 -2.679 -3.23c-.02 -2.335 2.589 -3.179 2.679 -3.228c-1.096 -1.606 -3.162 -2.113 -3.75 -2.153c-1.535 -.12 -3.032 1.077 -3.75 1.077c-.729 0 -2.036 -1.077 -3.214 -1.077z">
                            </path>
                            <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2"></path>
                        </svg>
                        <span>Download on App Store</span>
                    </button>
                    <button
                        class="flex items-center justify-center transition-all duration-200 focus:ring-2 transition-shadow focus:outline-none text-base-500 bg-white hover:text-accent-500 ring-1 ring-base-200 focus:ring-accent-500 h-9 px-4 py-2 text-sm font-medium rounded-md gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid size-4"
                            slot="left-icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M4 3.71v16.58a.7 .7 0 0 0 1.05 .606l14.622 -8.42a.55 .55 0 0 0 0 -.953l-14.622 -8.419a.7 .7 0 0 0 -1.05 .607z">
                            </path>
                            <path d="M15 9l-10.5 11.5"></path>
                            <path d="M4.5 3.5l10.5 11.5"></path>
                        </svg>
                        <span>Download on Google Play</span>
                    </button>
                </div>
            </div>
            <div class="grid pt-6 mt-6 border-t grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-24">
                <div class="space-y-4">
                    <nav aria-labelledby="footer-heading-0">
                        <h3 class="tracking-tight text-base font-medium text-base-500">
                            Company
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    About
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Mission
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Leadership Team
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    History
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="space-y-4">
                    <nav aria-labelledby="footer-heading-1">
                        <h3 class="tracking-tight text-base font-medium text-base-500">
                            Services
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Marketing
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Analytics
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Commerce
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Insights
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="space-y-4">
                    <nav aria-labelledby="footer-heading-2">
                        <h3 class="tracking-tight text-base font-medium text-base-500">
                            Resources
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Documentation
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Guides
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Webinars
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    White Papers
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="space-y-4">
                    <nav aria-labelledby="footer-heading-3">
                        <h3 class="tracking-tight text-base font-medium text-base-500">
                            Support &amp; Legal
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    API Status
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Live Chat
                                </a>
                            </li>
                            <li>
                                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300"
                                    href="#">
                                    Email Support
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> --}}
            <div class="pt-6 mt-12 border-t flex flex-col md:flex-row items-center justify-between">
                <a class="text-base-600 font-medium text-sm md:text-base hover:text-accent-500 duration-300 w-full sm:w-auto flex gap-3 items-center"
                    href="#_">
                    <img class="h-7 2xl:h-12" src="{{ asset('images/gclogo.png') }}" alt="#_" />
                    <span class="text-white">GC DENTAL</span>
                </a>
                <p class="text-sm font-normal text-base-500">
                    Copyright © 2024 Oxbow UI. All rights reserved.
                </p>
            </div>
        </div>
    </section>
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script> --}}
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
