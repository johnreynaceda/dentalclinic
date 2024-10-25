<div>
    <div>
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-3 gap-10 relative">
        <div class="col-span-2">

            <div class="mb-10 flex space-x-4 items-center">
                <button wire:click="$set('selected_category', null)"
                    class="{{ $selected_category == null ? 'bg-main text-white' : '' }} rounded-2xl p-2 px-4 border-main hover:bg-main hover:text-white border-2">
                    <span>All</span>
                </button>
                @forelse ($categories as $item)
                    <button wire:click="$set('selected_category', {{ $item->id }})"
                        class="{{ $selected_category == $item->id ? 'bg-main text-white' : '' }} rounded-2xl p-2 px-4 border-main hover:bg-main hover:text-white border-2">
                        <span>{{ $item->name }}</span>
                    </button>
                @empty
                    <p>No categories available</p>
                @endforelse
            </div>


            <div class="containner mx-auto">
                <div class="space-y-3">
                    @foreach ($services as $item)
                        <div class="flex px-4 bg-white rounded-xl items-start space-x-3 py-6">
                            <input type="checkbox" wire:click="toggleService({{ $item->id }})"
                                class="border-gray-300 rounded h-5 w-5"
                                {{ in_array($item->id, $selectedServiceIds) ? 'checked' : '' }} />
                            <div class="flex flex-col">
                                <h1 class="text-gray-700 font-medium leading-none">{{ $item->name }}</h1>
                                <h1 class="mt-1">&#8369;{{ number_format($item->price) }}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Selected Services and Total Fee -->      <div>
            <div class="border rounded-3xl flex flex-col bg-white p-5 h-[40rem]">
                <div class="flex-1 space-y-4">
                    <h3 class="text-xl font-semibold">Selected Services</h3>
                    @forelse ($selectedServices as $service)
                        <div class="flex justify-between">
                            <span>{{ $service->name }}</span>
                            <span>&#8369;{{ number_format($service->price) }}</span>
                        </div>
                    @empty
                        <p>No services selected</p>
                    @endforelse
                    <div class="flex justify-between font-semibold mt-4 border-t pt-2">
                        <span>Total Fee</span>
                        <span>&#8369;{{ number_format($totalFee) }}</span>
                    </div>
                </div>
                <button wire:click="openModal"
                    class="w-full bg-main p-2.5 rounded-2xl text-white font-semibold text-lg hover:bg-gray-600">
                    <span>Continue</span>
                </button>
            </div>
        </div>
    </div>


    <div x-data="{ open: @entangle('showModal') }" x-show="open" class="fixed inset-0 flex items-center justify-center z-50"
        style="display: none;">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg mx-auto">
            <h3 class="text-lg font-semibold">Confirm Appointment</h3>
            <p>Please enter the appointment date and time:</p>
            <div class="mt-4">
                <label for="appointmentDate" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                <input type="date" wire:model.defer="appointmentDate"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                @error('appointmentDate')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="appointmentTime" class="block text-sm font-medium text-gray-700">Appointment Time</label>
                <input type="time" wire:model.defer="appointmentTime"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                @error('appointmentTime')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">Cancel</button>
                <button wire:click="submitAppointment" class="bg-main text-white p-2 rounded">Confirm</button>
            </div>
        </div>
    </div>
</div>
