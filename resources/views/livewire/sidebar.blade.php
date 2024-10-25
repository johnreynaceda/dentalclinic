<div>
    @switch(auth()->user()->user_type)
        @case('admin')
            <nav class="flex-1 space-y-1 ">
                <p class="px-4 pt-6 text-xs font-semibold text-gray-300 uppercase">
                    Analytics
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('admin.dashboard') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            <span class="ml-3">
                                Home
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="px-4 pt-8 text-xs font-semibold text-gray-300 uppercase">
                    MANAGEMENT
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('admin.doctors') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('admin.doctors') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar-clock">
                                <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                                <path d="M16 2v4" />
                                <path d="M8 2v4" />
                                <path d="M3 10h5" />
                                <path d="M17.5 17.5 16 16.3V14" />
                                <circle cx="16" cy="16" r="6" />
                            </svg>
                            <span class="ml-3">
                                Doctors Schedule
                            </span>
                        </a>
                    </li>
                    <li>
                        <div x-data="{ open: false }">
                            <button
                                class="inline-flex items-center justify-between w-full px-4 py-2 mt-1 text-sm text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main group"
                                @click="open = ! open">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-square-library">
                                    <rect width="18" height="18" x="3" y="3" rx="2" />
                                    <path d="M7 7v10" />
                                    <path d="M11 7v10" />
                                    <path d="m15 7 2 10" />
                                </svg>
                                <span class="ml-4"> Appointments </span>
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    class="inline size-5 ml-auto transition-transform duration-200 transform group-hover:text-accent rotate-0">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="p-2 pl-6 -px-px" x-show="open" @click.outside="open = false" style="display: none;">
                                <ul>
                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                                            href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-calendar-fold">
                                                <path d="M8 2v4" />
                                                <path d="M16 2v4" />
                                                <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                                                <path d="M3 10h18" />
                                                <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                                            </svg>
                                            <span class="ml-3">
                                                Schedule
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                                            href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text">
                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                <path d="M10 9H8" />
                                                <path d="M16 13H8" />
                                                <path d="M16 17H8" />
                                            </svg>
                                            <span class="ml-3">
                                                Records
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-receipt-text">
                                <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
                                <path d="M14 8H8" />
                                <path d="M16 12H8" />
                                <path d="M13 16H8" />
                            </svg>
                            <span class="ml-3">
                                Billing
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('admin.services') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('admin.services') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-app-window">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="M10 4v4" />
                                <path d="M2 8h20" />
                                <path d="M6 4v4" />
                            </svg>
                            <span class="ml-3">
                                Services
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="px-4 pt-10 text-xs font-semibold text-gray-300 uppercase">
                    ACCOUNTS
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('admin.users') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('admin.users') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-user-cog">
                                <circle cx="18" cy="15" r="3" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                                <path d="m21.7 16.4-.9-.3" />
                                <path d="m15.2 13.9-.9-.3" />
                                <path d="m16.6 18.7.3-.9" />
                                <path d="m19.1 12.2.3-.9" />
                                <path d="m19.6 18.7-.4-1" />
                                <path d="m16.8 12.3-.4-1" />
                                <path d="m14.3 16.6 1-.4" />
                                <path d="m20.7 13.8 1-.4" />
                            </svg>
                            <span class="ml-3">
                                Users
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        @break

        @case('secretary')
            <nav class="flex-1 space-y-1 ">
                <p class="px-4 pt-6 text-xs font-semibold text-gray-300 uppercase">
                    Analytics
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('secretary.dashboard') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('secretary.dashboard') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            <span class="ml-3">
                                Home
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="px-4 pt-8 text-xs font-semibold text-gray-300 uppercase">
                    MANAGEMENT
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('secretary.doctors') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('secretary.doctors') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar-clock">
                                <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                                <path d="M16 2v4" />
                                <path d="M8 2v4" />
                                <path d="M3 10h5" />
                                <path d="M17.5 17.5 16 16.3V14" />
                                <circle cx="16" cy="16" r="6" />
                            </svg>
                            <span class="ml-3">
                                Doctors Schedule
                            </span>
                        </a>
                    </li>
                    <li>
                        <div x-data="{ open: false }">
                            <button
                                class="inline-flex items-center justify-between w-full px-4 py-2 mt-1 text-sm text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main group"
                                @click="open = ! open">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-square-library">
                                    <rect width="18" height="18" x="3" y="3" rx="2" />
                                    <path d="M7 7v10" />
                                    <path d="M11 7v10" />
                                    <path d="m15 7 2 10" />
                                </svg>
                                <span class="ml-4"> Appointments </span>
                                <svg fill="currentColor" viewBox="0 0 20 20"
                                    :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    class="inline size-5 ml-auto transition-transform duration-200 transform group-hover:text-accent rotate-0">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="p-2 pl-6 -px-px" x-show="open" @click.outside="open = false"
                                style="display: none;">
                                <ul>
                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                                            href="{{ route('secretary.schedule') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-calendar-fold">
                                                <path d="M8 2v4" />
                                                <path d="M16 2v4" />
                                                <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z" />
                                                <path d="M3 10h18" />
                                                <path d="M15 22v-4a2 2 0 0 1 2-2h4" />
                                            </svg>
                                            <span class="ml-3">
                                                Schedule
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                                            href="{{ route('secretary.records') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-file-text">
                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                <path d="M10 9H8" />
                                                <path d="M16 13H8" />
                                                <path d="M16 17H8" />
                                            </svg>
                                            <span class="ml-3">
                                                Records
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm  text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                                            href="{{ route('secretary.appointments') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-file-text">
                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                <path d="M10 9H8" />
                                                <path d="M16 13H8" />
                                                <path d="M16 17H8" />
                                            </svg>
                                            <span class="ml-3">
                                                Appointment
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('secretary.billing') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('secretary.billing') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-receipt-text">
                                <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
                                <path d="M14 8H8" />
                                <path d="M16 12H8" />
                                <path d="M13 16H8" />
                            </svg>
                            <span class="ml-3">
                                Billing
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('secretary.services') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95 "
                            href="{{ route('secretary.services') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-app-window">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="M10 4v4" />
                                <path d="M2 8h20" />
                                <path d="M6 4v4" />
                            </svg>
                            <span class="ml-3">
                                Services
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="px-4 pt-10 text-xs font-semibold text-gray-300 uppercase">
                    ACCOUNTS
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('secretary.users') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:text-main hover:scale-95"
                            href="{{ route('secretary.users') }}" x-navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-user-cog">
                                <circle cx="18" cy="15" r="3" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                                <path d="m21.7 16.4-.9-.3" />
                                <path d="m15.2 13.9-.9-.3" />
                                <path d="m16.6 18.7.3-.9" />
                                <path d="m19.1 12.2.3-.9" />
                                <path d="m19.6 18.7-.4-1" />
                                <path d="m16.8 12.3-.4-1" />
                                <path d="m14.3 16.6 1-.4" />
                                <path d="m20.7 13.8 1-.4" />
                            </svg>
                            <span class="ml-3">
                                Users
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        @break

        @default
    @endswitch
</div>
