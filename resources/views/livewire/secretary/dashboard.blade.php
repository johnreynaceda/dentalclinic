<div class="container mx-auto py-8">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-lg font-bold text-gray-700">Total Doctors</h2>
            <p class="text-4xl font-extrabold text-blue-500">{{ App\Models\Doctor::count() }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-lg font-bold text-gray-700">Total Services</h2>
            <p class="text-4xl font-extrabold text-blue-500">{{ App\Models\Service::count() }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-lg font-bold text-gray-700">Total Users</h2>
            <p class="text-4xl font-extrabold text-blue-500">{{ App\Models\User::count() }}</p>
        </div>
    </div>
</div>
