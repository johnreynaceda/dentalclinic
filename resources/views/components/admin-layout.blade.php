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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="fixed">
        <img src="{{ asset('images/bg.jpg') }}" class="opacity-5" alt="">
    </div>
    <div class="flex h-screen overflow-hidden bg-gray-100 ">
        <img src="{{ asset('images/crane1.png') }}" class="fixed -bottom-10 right-0 opacity-20" alt="">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-main relative border-r">
                    <div class="flex flex-col flex-shrink-0  px-4">
                        <a class="text-lg font-semibold flex items-center space-x-3 justify-center tracking-tighter text-white focus:outline-none focus:ring "
                            href="/">
                            <img src="{{ asset('images/gclogo.png') }}" class="h-12" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-5">
                        <livewire:sidebar />
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <div class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class=" bg-white p-4 px-8">
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <div class="min-w-0 flex-1">
                            <h2 class=" font-bold leading-7 text-main sm:truncate sm:text-2xl sm:tracking-tight">
                                GC DENTAL CENTER</h2>
                            <nav class="text-sm mt-1 font-medium text-gray-500" aria-label="breadcrumb">
                                <ol class="flex flex-wrap items-center gap-2">
                                    <li class="flex items-center gap-2">
                                        <a href="#" class="hover:text-black dark:hover:text-white">Home</a>
                                        <span aria-hidden="true">/</span>
                                    </li>

                                    <li class="text-main" aria-current="page">@yield('title')
                                    </li>
                                </ol>
                            </nav>


                        </div>
                        <div class="mt-5 flex lg:ml-4 lg:mt-0">
                            <span class="sm:ml-3">
                                <div x-data="{
                                    dropdownOpen: false
                                }" class="relative">

                                    <button @click="dropdownOpen=true"
                                        class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                        <img src="{{ asset('images/gclogo.png') }}"
                                            class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                                        <span
                                            class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                            <span>{{ auth()->user()->name }}</span>
                                            <span
                                                class="text-xs font-light text-gray-700">{{ auth()->user()->email }}</span>
                                        </span>
                                        <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>

                                    <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                                        x-transition:enter="ease-out duration-200"
                                        x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
                                        class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                                        <div
                                            class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                            <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                            <a href="#_"
                                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="w-4 h-4 mr-2">
                                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span>Profile</span>
                                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                                            </a>

                                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="route('logout')"
                                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                    class="relative flex cursor-pointer select-none hover:bg-red-200 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="w-4 h-4 mr-2">
                                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                        <polyline points="16 17 21 12 16 7"></polyline>
                                                        <line x1="21" x2="9" y1="12"
                                                            y2="12"></line>
                                                    </svg>
                                                    <span>Log out</span>
                                                    <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </span>


                        </div>
                    </div>

                </div>
                <main class="mx-auto max-w-7xl py-10">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
