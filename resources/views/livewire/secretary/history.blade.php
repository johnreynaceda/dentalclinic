<div>
    <div class="p-6">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Patient ID</th>
                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Full Name</th>
                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="border-b border-gray-300 px-6 py-4">{{ $patient->patient_number }}</td>
                        <td class="border-b border-gray-300 px-6 py-4">{{ $patient->first_name . ' ' . $patient->last_name }}</td>
                        <td class="border-b border-gray-300 px-6 py-4">
                            <button class="bg-transparent border-0 p-0 cursor-pointer text-green-600 hover:text-green-800" wire:click="selectPatient({{ $patient->user_id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:opacity-75 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5C7 4.5 2.73 9.03 1 12c1.73 2.97 6 7.5 11 7.5s9.27-4.53 11-7.5c-1.73-2.97-6-7.5-11-7.5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 lg:w-2/3 printable-modal">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold">Appointment History</h3>
                    <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <div class="p-4">
                    @if(collect($appointments)->isNotEmpty())
                        <table class="min-w-full border border-gray-300 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Appointment ID</th>
                                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Date</th>
                                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Time</th>
                                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Total Fee</th>
                                    <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-sm font-medium uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr class="hover:bg-gray-100 transition duration-200">
                                    <td class="border-b border-gray-300 px-6 py-4">{{ $appointment->id }}</td>
                                    <td class="border-b border-gray-300 px-6 py-4">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</td>
                                    <td class="border-b border-gray-300 px-6 py-4">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}</td>
                                    <td class="border-b border-gray-300 px-6 py-4">{{ ucfirst($appointment->total_fee) }}</td>
                                    <td class="border-b border-gray-300 px-6 py-4">{{ ucfirst($appointment->status) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center py-4 text-gray-500">No appointments found for this patient.</p>
                    @endif
                </div>
                <div class="flex justify-end p-4 border-t">
                    <button onclick="printModal()" class="bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-200">
                        Print
                    </button>
                </div>
            </div>
        </div>

        <div class="fixed inset-0 bg-black opacity-30"></div>
    @endif

    </div>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable-modal, .printable-modal * {
                visibility: visible;
            }
            .printable-modal {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>

    <script>
        function printModal() {
            window.print();
        }
    </script>

</div>
