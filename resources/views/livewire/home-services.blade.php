<div>
    <div class="flex space-x-3 justify-center mt-10">

        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" loop="true">

            @forelse ($services as $item)
                <swiper-slide>
                    <button class=" border-2 border-main font-bold  text-gray-700 p-2 rounded-full uppercase px-4 ">
                        <span>{{ $item->name }}</span>
                    </button>
                </swiper-slide>

            @empty
                No Services Available...
            @endforelse

        </swiper-container>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</div>
