<x-patient-layout>
    <div>
        <div class="my-6">
            <h1 class="text-2xl font-semibold text-gray-900">Doctor's Schedule</h1>
            <p class="text-sm leading-5 text-gray-500">View any of their schdule and book new ones.</p>
        </div>
        <div class="bg-white rounded-3xl mx-auto max-w-4xl p-5">
            <ul role="list" class="divide-y divide-gray-100">
                @foreach (\App\Models\Doctor::get() as $item)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <svg class="w-12 h-12 text-main" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 16 16"
                                fill="currentColor">
                                <path fill="currentColor"
                                    d="M14 11.3c-1-1.9-2-1.6-3.1-1.7 0.1 0.3 0.1 0.6 0.1 1 1.6 0.4 2 2.3 2 3.4v1h-2v-1h1c0 0 0-2.5-1.5-2.5s-1.5 2.4-1.5 2.5h1v1h-2v-1c0-1.1 0.4-3.1 2-3.4 0-0.6-0.1-1.1-0.2-1.3-0.2-0.1-0.4-0.3-0.4-0.6 0-0.6 0.8-0.4 1.4-1.5 0 0 0.9-2.3 0.6-4.3h-1c0-0.2 0.1-0.3 0.1-0.5s0-0.3-0.1-0.5h0.8c-0.3-1-1.3-1.9-3.2-1.9 0 0 0 0 0 0s0 0 0 0 0 0 0 0c-1.9 0-2.9 0.9-3.3 2h0.8c0 0.2-0.1 0.3-0.1 0.5s0 0.3 0.1 0.5h-1c-0.2 2 0.6 4.3 0.6 4.3 0.6 1 1.4 0.8 1.4 1.5 0 0.5-0.5 0.7-1.1 0.8-0.2 0.2-0.4 0.6-0.4 1.4 0 0.4 0 0.8 0 1.2 0.6 0.2 1 0.8 1 1.4 0 0.7-0.7 1.4-1.5 1.4s-1.5-0.7-1.5-1.5c0-0.7 0.4-1.2 1-1.4 0-0.3 0-0.7 0-1.2s0.1-0.9 0.2-1.3c-0.7 0.1-1.5 0.4-2.2 1.7-0.6 1.1-0.9 4.7-0.9 4.7h13.7c0.1 0-0.2-3.6-0.8-4.7zM6.5 2.5c0-0.8 0.7-1.5 1.5-1.5s1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5-1.5-0.7-1.5-1.5z">
                                </path>
                                <path fill="currentColor"
                                    d="M5 13.5c0 0.276-0.224 0.5-0.5 0.5s-0.5-0.224-0.5-0.5c0-0.276 0.224-0.5 0.5-0.5s0.5 0.224 0.5 0.5z">
                                </path>
                            </svg>
                            <div class="min-w-0 flex-auto">
                                <p class=" font-semibold text-xl leading-6 uppercase text-gray-900">
                                    {{ $item->lastname . ', ' . $item->firstname }}</p>
                                <p class="mt-1 truncate text-sm leading-5 text-gray-500">{{ $item->specialization }}
                                </p>
                                <p class="mt-1 2xl:hidden block  leading-5 text-main">
                                    {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $item->branch }}</p>
                            <p class="mt-1  leading-5 text-main">
                                {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-patient-layout>
