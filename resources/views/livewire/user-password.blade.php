<div x-data="{ modalOpen: @entangle('modal') }">
    <div @click="modalOpen=true"
        class="relative flex cursor-pointer select-none hover:bg-green-200 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            class="w-4 h-4 mr-2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-square-asterisk">
            <rect width="18" height="18" x="3" y="3" rx="2" />
            <path d="M12 8v8" />
            <path d="m8.5 14 7-4" />
            <path d="m8.5 10 7 4" />
        </svg>
        <span>Change Password</span>
    </div>

    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
            x-cloak>
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
                class="absolute inset-0 w-full h-full bg-black bg-opacity-50"></div>
            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold">Change Password</h3>
                    <button @click="modalOpen=false"
                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-auto">
                    <div class="mt-5">
                        <div class="w-full max-w-xs mx-auto">
                            <input type="password" placeholder="Enter your new password" wire:model="password"
                                class="flex w-full h-10 px-3 py-2  bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
                        </div>
                    </div>
                    <div class="mt-10 grid place-content-center">
                        <button wire:click="updatePassword"
                            class="bg-main hover:bg-gray-600 px-4 py-1 rounded-xl text-white">
                            <span>Update Password</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
