<div>
    <div x-data="{
        dropdownOpen: false
    }" class="relative">

        <button @click="dropdownOpen=true"
            class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
            <img src="{{ asset('images/gclogo.png') }}"
                class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
            <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                <span>{{ auth()->user()->name }}</span>
                <span class="text-xs font-light text-gray-700">{{ auth()->user()->email }}</span>
            </span>
            <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </button>

        <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="ease-out duration-200"
            x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
            class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
            <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();"
                        class="relative flex cursor-pointer select-none hover:bg-red-200 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        <span>Log out</span>
                        <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
