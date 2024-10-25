<div class="p-6  min-h-screen">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($appointments as $appointment)
            <x-filament::card class="shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex flex-col justify-between h-full">

                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $appointment->service->name }}</h3>
                        <p class="text-gray-600">Appointment Date:
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y') }}</p>
                        <p class="text-gray-600">Time:
                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</p>
                        <p class="text-gray-600 mb-4">Status:
                            <span
                                class="font-semibold {{ $appointment->status === 'approved' ? 'text-green-600' : ($appointment->status === 'declined' ? 'text-red-600' : 'text-yellow-500') }}">
                                {{ ucfirst($appointment->status) ?? 'Pending' }}
                            </span>
                        </p>
                    </div>


                    <div class="flex justify-between items-center mt-4">
                        <span
                            class="text-xl font-semibold text-gray-800">₱{{ number_format($appointment->total_fee, 2) }}</span>
                        @if ($appointment->status == 'pending')
                            <button
                                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                View Details
                            </button>
                        @endif
                    </div>
                </div>
            </x-filament::card>
        @endforeach
    </div>
</div>
