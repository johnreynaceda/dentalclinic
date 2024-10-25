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

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .appoint-button {
            background-color: #3B82F6;
            color: white;
            border-radius: 0.375rem;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .appoint-button:hover {
            background-color: #2563EB;
        }
    </style>


    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="fixed">
        <img src="{{ asset('images/bg.jpg') }}" class="opacity-5" alt="">
    </div>

    {{-- <div class="relative z-10 bg-main border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between item-center h-16">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <a href="/">
                            <img src="{{ asset('images/gclogo.png') }}" class="h-10" alt="Logo">
                        </a>
                    </div>
                    <div class="flex space-x-8">
                        <a href="/" class="text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/appointments"
                            class="text-white px-3 py-2 rounded-md text-sm font-medium">Appointment</a>
                        <a href="{{ route('patient.services') }}"
                            class="text-white px-3 py-2 rounded-md text-sm font-medium hover:text-gray-500">Services</a>
                    </div>
                </div>

                <div class="flex items-center relative">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-white px-3 py-2 rounded-md text-sm font-medium hover:text-gray-500">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}

    <section class="relative w-full px-8 text-gray-700 sticky top-0 bg-main z-20 body-font"
        data-tails-scripts="//unpkg.com/alpinejs" {!! $attributes ?? '' !!}>
        <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
            <a href="#_"
                class="relative z-10 flex space-x-2 items-center w-auto text-2xl font-bold leading-none text-white select-none">
                <img src="{{ asset('images/gclogo.png') }}" class="h-12" alt="">
                <span>GC DENTAL</span>
            </a>

            <nav
                class="top-0 left-0 z-0 flex items-center justify-center w-full h-full py-5 -ml-0 space-x-5 text-base md:-ml-5 md:py-0 md:absolute">
                <a href="{{ route('patient.dashboard') }}"
                    class="relative font-medium leading-6 transition duration-150 ease-out text-white hover:text-gray-900">
                    <span class="block">Home</span>
                </a>
                <a href="{{route('patient.appointment')}}"
                    class="relative font-medium leading-6 transition duration-150 ease-out text-white hover:text-gray-900">
                    <span class="block">Appointment</span>
                </a>
                <a href="{{ route('patient.services') }}"
                    class="relative font-medium leading-6 transition duration-150 ease-out text-white hover:text-gray-900">
                    <span class="block">Services</span>
                </a>

            </nav>

            <div class="relative z-10 inline-flex items-center space-x-3 md:ml-5 lg:justify-end">
                <livewire:userdropdown />
            </div>
        </div>
    </section>


    <div class="flex flex-col min-h-screen relative z-10">
        <div class="flex-1">
            <div class="relative flex-1 overflow-y-auto focus:outline-none">
                <main class="mx-auto max-w-7xl py-10">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>


    @vite('resources/js/app.js')
</body>

</html>
