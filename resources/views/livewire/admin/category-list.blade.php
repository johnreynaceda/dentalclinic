<div>
    <div class="mb-3 ">
        <a x-navigate
            href="{{ auth()->user()->user_type == 'admin' ? route('admin.services') : route('secretary.services') }}"
            class="flex space-x-1 items-center text-lg font-bold text-gray-700 hover:text-main">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-arrow-big-left">
                <path d="M18 15h-6v4l-7-7 7-7v4h6v6z" />
            </svg>
            <span>Back</span>
        </a>

    </div>
    <div class="bg-white p-10  rounded-2xl">
        {{ $this->table }}
    </div>
</div>
