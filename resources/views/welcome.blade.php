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
    <div class="fixed">
        <img src="{{ asset('images/bg.jpg') }}" class="object-cover opacity-90" alt="">
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
                                    <svg class="w-auto h-5" viewBox="0 0 355 99" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <path
                                                d="M119.1 87V66.4h19.8c34.3 0 34.2-49.5 0-49.5-11 0-22 .1-33 .1v70h13.2zm19.8-32.7h-19.8V29.5h19.8c16.8 0 16.9 24.8 0 24.8zm32.6-30.5c0 9.5 14.4 9.5 14.4 0s-14.4-9.5-14.4 0zM184.8 87V37.5h-12.2V87h12.2zm22.8 0V61.8c0-7.5 5.1-13.8 12.6-13.8 7.8 0 11.9 5.7 11.9 13.2V87h12.2V61.1c0-15.5-9.3-24.2-20.9-24.2-6.2 0-11.2 2.5-16.2 7.4l-.8-6.7h-10.9V87h12.1zm72.1 1.3c7.5 0 16-2.6 21.2-8l-7.8-7.7c-2.8 2.9-8.7 4.6-13.2 4.6-8.6 0-13.9-4.4-14.7-10.5h38.5c1.9-20.3-8.4-30.5-24.9-30.5-16 0-26.2 10.8-26.2 25.8 0 15.8 10.1 26.3 27.1 26.3zM292 56.6h-26.6c1.8-6.4 7.2-9.6 13.8-9.6 7 0 12 3.2 12.8 9.6zm41.2 32.1c14.1 0 21.2-7.5 21.2-16.2 0-13.1-11.8-15.2-21.1-15.8-6.3-.4-9.2-2.2-9.2-5.4 0-3.1 3.2-4.9 9-4.9 4.7 0 8.7 1.1 12.2 4.4l6.8-8c-5.7-5-11.5-6.5-19.2-6.5-9 0-20.8 4-20.8 15.4 0 11.2 11.1 14.6 20.4 15.3 7 .4 9.8 1.8 9.8 5.2 0 3.6-4.3 6-8.9 5.9-5.5-.1-13.5-3-17-6.9l-6 8.7c7.2 7.5 15 8.8 22.8 8.8z"
                                                id="a"></path>
                                        </defs>
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="currentColor">
                                                <path d="M19.742 49h28.516L68 83H0l19.742-34z"></path>
                                                <path d="M26 69h14v30H26V69zM4 50L33.127 0 63 50H4z"></path>
                                            </g>
                                            <g fill-rule="nonzero">
                                                <use fill="currentColor" xlink:href="#a"></use>
                                                <use fill="currentColor" xlink:href="#a"></use>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <div
                                    class="flex flex-col items-start justify-center w-full space-x-6 text-center text-lg  lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                    <a href="#_"
                                        class="inline-block w-full py-2 mx-0 ml-6 text-left text-white hover:text-gray-200 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
                                    <a href="#_"
                                        class="inline-block w-full py-2 mx-0  text-left  text-white hover:text-gray-200 md:w-auto md:px-0 md:mx-2  lg:mx-3 md:text-center">About
                                        Us</a>
                                    <a href="#_"
                                        class="inline-block w-full py-2 mx-0  text-left text-white hover:text-gray-200  md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Services</a>
                                    <a href="#_"
                                        class="inline-block w-full py-2 mx-0 text-left  text-white hover:text-gray-200 md:w-auto md:px-0 md:mx-2  lg:mx-3 md:text-center">Contact</a>

                                </div>
                                <div
                                    class="flex flex-col items-start space-x-3 justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">

                                    <a href="{{ route('login') }}"
                                        class="inline-flex items-center w-full px-5 py-3 text-sm font-medium leading-4  bg-white md:w-auto md:rounded-full text-main hover:bg-gray-200 ">Log
                                        In</a>
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center w-full px-5 py-3 text-sm font-medium leading-4  bg-white md:w-auto md:rounded-full text-main hover:bg-gray-200 ">Sign
                                        Up</a>
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
        <div class="px-8 py-48 mx-auto md:px-12 lg:px-24 max-w-7xl relative">
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
                    width="158" height="48" /><img
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
    </section>
    <!-- Feature section highlighting key benefits or services -->

    <!-- Testimonials section displaying customer feedback -->

    <!-- Pricing section with available plans and details -->
    <section class="bg-white bg-opacity-90 mb-10 relative" x-data="{ duration: 'monthly' }">
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-screen-xl relative">
            <div class="max-w-xl text-center mx-auto">

                <h1 class="text-4xl font-semibold tracking-tight text-base-900 lg:text-balance mt-4">
                    About Us
                </h1>
                <p class="text-base font-medium text-base-500 mt-4 lg:text-balance">
                    The most well-known type of oral surgery is tooth extraction.
                </p>

            </div>
            <section class="px-2 py-32 b md:px-0">
                <div class="space-y-40">
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
                                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                                        <a href="#_"
                                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-main rounded-md sm:mb-0 hover:bg-gray-700 sm:w-auto"
                                            data-primary="indigo-600" data-rounded="rounded-md">
                                            Contact Us

                                        </a>

                                    </div>
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
                                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                                        <a href="#_"
                                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-main rounded-md sm:mb-0 hover:bg-gray-700 sm:w-auto"
                                            data-primary="indigo-600" data-rounded="rounded-md">
                                            Read More

                                        </a>

                                    </div>
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
                                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                                        <a href="#_"
                                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-main rounded-md sm:mb-0 hover:bg-gray-700 sm:w-auto"
                                            data-primary="indigo-600" data-rounded="rounded-md">
                                            Read More

                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <section class="bg-white bg-opacity-90 relative" x-data="{ duration: 'monthly' }">
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
    <!-- Frequently Asked Questions section -->
    <section class="relative opacity-0">
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
    </section>
    <!-- Footer section with links, contact info, and social media -->
    <section class="relative bg-main">
        <div class="px-8 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl relative">
            <div class="grid items-end grid-cols-1 sm:grid-cols-2 gap-4">
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
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
