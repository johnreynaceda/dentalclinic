<div x-data>
    <div class="bg-white p-10 rounded-3xl">
        <div class="flex space-x-3 border-b pb-2 items-center text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-heart-pulse">
                <path
                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                <path d="M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27" />
            </svg>
            <span class="font-bold text-4xl">
                {{ $patient->patient_number }}
            </span>
        </div>
        <div class="mt-5 grid grid-cols-4 gap-5">
            <div>
                <h1 class="text-sm">Fullname</h1>
                <h1 class="font-semibold uppercase text-main">{{ $patient->user->name }}</h1>
            </div>
            <div>
                <h1 class="text-sm">Age</h1>
                <h1 class="font-semibold uppercase text-main">{{ $patient->age }}</h1>
            </div>
            <div>
                <h1 class="text-sm">Gender</h1>
                <h1 class="font-semibold uppercase text-main">{{ $patient->gender }}</h1>
            </div>
            <div>
                <h1 class="text-sm">Address</h1>
                <h1 class="font-semibold uppercase text-main">{{ $patient->address }}</h1>
            </div>
            <div>
                <h1 class="text-sm">Contact Number</h1>
                <h1 class="font-semibold uppercase text-main">{{ $patient->contact_number }}</h1>
            </div>

        </div>
    </div>
    <div class="grid grid-cols-2 mt-10 gap-5">
        <div class="space-y-5">
            <div class="bg-white p-2 rounded-2xl">
                <livewire:treatment-plan />
            </div>
            <div class="bg-white p-5 rounded-2xl">
                <div>
                    <h1 class="font-bold text-xl text-main">ATTACHMENTS</h1>
                    <div class="mt-2">
                        {{ $this->form }}
                    </div>
                    <button wire:click="uploadForm"
                        class="w-full bg-main py-1 rounded-xl text-white hover:scale-95 mt-1">Upload</button>
                </div>
                <div class="mt-2 border-t pt-3" wire:ignore>
                    <swiper-container class="mySwiper" effect="cards" grab-cursor="true">
                        @foreach ($attachments as $item)
                            <swiper-slide class="rounded-2xl h-40">
                                <a href="{{ Storage::url($item->attachment_path) }}" target="_blank"
                                    class="bg-main h-40 rounded-2xl relative overflow-hidden">
                                    <img src="{{ Storage::url($item->attachment_path) }}"
                                        class="h-full object-cover w-full " alt="">
                                </a>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
                </div>
            </div>
        </div>
        <div class="  bg-white  rounded-2xl">
            <div class="flex justify-between items-center border-b px-5 py-5 ">
                <h1 class="font-bold text-2xl text-main">APPOINTMENT HISTORY</h1>
                <button
                    class="bg-gray-700 px-5 py-2 hover:bg-gray-500 text-white rounded-2xl flex space-x-2 font-semibold"
                    @click="printOut($refs.printContainer.outerHTML);">
                    <span>Print</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-printer-check">
                        <path d="M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5" />
                        <path d="m16 19 2 2 4-4" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2" />
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                    </svg>
                </button>
            </div>
            <div class=" h-96 py-5 px-10">
                <div x-ref="printContainer">
                    <table class="min-w-full divide-y border border-gray-500 divide-gray-500">
                        <thead>
                            <tr class="text-gray-700">
                                <th class="px-5 py-3  font-medium text-left uppercase">PATIENT NUMBER</th>
                                <th class="px-5 py-3  font-medium text-left uppercase">DATE & TIME</th>
                                <th class="px-5 py-3  font-medium text-left uppercase">TOTAL FEE</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-500">
                            @forelse ($appointments as $item)
                                <tr class="text-gray-600">
                                    <td class="px-5 py-2  font-medium whitespace-nowrap">
                                        {{ $item->patient->patient_number }}
                                    </td>

                                    <td class="px-5 py-2  font-medium whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y') . ' ' . \Carbon\Carbon::parse($item->appointment_time)->format('h:i A') }}
                                    </td>
                                    <td class="px-5 py-2  font-medium whitespace-nowrap">
                                        &#8369;{{ number_format($item->total_fee, 2) }}
                                    </td>

                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
