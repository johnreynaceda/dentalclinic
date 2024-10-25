{{-- <div x-data="{ open: false, action: '', appointmentId: null }">
    <div class="container mx-auto py-8">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Patient ID</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">First Name</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Last Name</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Age</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Gender</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Address</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Contact Number</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Service</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Date</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Time</th>
                    <th class="px-6 py-3 text-left text-gray-600 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $appointment->user->patient_id }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->first_name }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->last_name }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->age }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->gender }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->address }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->contact_number }}</td>
                        <td class="px-6 py-4">{{ $appointment->service->name }}</td>
                        <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                        <td class="px-6 py-4">{{ $appointment->appointment_time }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button
                                @click="open = true; action = 'approved'; appointmentId = {{ $appointment->id }}"
                                class="px-4 py-2 rounded transition duration-150"
                                :class="{
                                    'bg-green-500 text-white hover:bg-green-600': !['approved', 'declined'].includes('{{ $appointment->status }}'),
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': ['approved', 'declined'].includes('{{ $appointment->status }}')
                                }"
                                :disabled="{{ $appointment->status === 'approved' || $appointment->status === 'declined' }}">
                                Approve
                            </button>
                            <button
                                @click="open = true; action = 'declined'; appointmentId = {{ $appointment->id }}"
                                class="px-4 py-2 rounded transition duration-150"
                                :class="{
                                    'bg-red-500 text-white hover:bg-red-600': !['approved', 'declined'].includes('{{ $appointment->status }}'),
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': ['approved', 'declined'].includes('{{ $appointment->status }}')
                                }"
                                :disabled="{{ $appointment->status === 'approved' || $appointment->status === 'declined' }}">
                                Decline
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div x-show="open" @click.away="open = false" class="fixed inset-0 flex items-center justify-center z-50" style="background: rgba(0, 0, 0, 0.5);">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Are you sure?</h2>
                <p class="mb-4" x-text="action === 'approved' ? 'Do you want to approve this appointment?' : 'Do you want to decline this appointment?'"></p>
                <div class="flex justify-end space-x-2">
                    <button @click="open = false" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition duration-150">
                        Cancel
                    </button>
                    <button @click="action === 'approved' ? @this.approve(appointmentId) : @this.decline(appointmentId); open = false" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-150">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div>
    <div class="bg-white p-10 rounded-xl">
        {{ $this->table }}
    </div>
</div>
