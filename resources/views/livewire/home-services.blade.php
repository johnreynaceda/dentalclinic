<div>
    <div class="flex space-x-3 justify-center mt-10">
        @forelse ($services as $item)
            <button
                class="hover:bg-main border-2 border-main  text-gray-700 p-2 rounded-full uppercase px-4 hover:text-white">
                <span>{{ $item->name }}</span>
            </button>
        @empty
            No Services Available...
        @endforelse
    </div>

</div>
