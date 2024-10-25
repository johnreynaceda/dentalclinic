{{-- <div x-data="{ showModal: false }">

    <button
        class="mb-4 px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600"
        @click="showModal = true">
        Add Record
    </button>


    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50" style="background: rgba(0, 0, 0, 0.5);" @click.away="showModal = false">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-2/3 lg:w-1/2">
            <h2 class="text-lg font-semibold mb-4">Add New Appointment</h2>
            <form @submit.prevent="showModal = false">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="first_name" class="block text-gray-700">First Name</label>
                        <input type="text" id="first_name" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-gray-700">Last Name</label>
                        <input type="text" id="last_name" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="age" class="block text-gray-700">Age</label>
                        <input type="number" id="age" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="gender" class="block text-gray-700">Gender</label>
                        <select id="gender" class="border rounded w-full py-2 px-3" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700">Address</label>
                        <input type="text" id="address" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="contact_number" class="block text-gray-700">Contact Number</label>
                        <input type="tel" id="contact_number" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="service" class="block text-gray-700">Service</label>
                        <input type="text" id="service" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="date" class="block text-gray-700">Date</label>
                        <input type="date" id="date" class="border rounded w-full py-2 px-3" required>
                    </div>
                    <div>
                        <label for="time" class="block text-gray-700">Time</label>
                        <input type="time" id="time" class="border rounded w-full py-2 px-3" required>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="showModal = false" class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <div class="mt-6">
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
    </div>
</div> --}}

<div class="bg-white p-10  rounded-2xl">
    {{ $this->table }}
</div>
