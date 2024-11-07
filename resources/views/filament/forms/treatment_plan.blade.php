<div>
    <div class="border border-gray-600">
        <div class="border border-gray-600 text-center text-gray-700 font-semibold">
            TREATMENT PLAN
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Patient Concern</h1>
            <p>{{ $getRecord()->patient_concern }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Short Term Goals</h1>
            <p>{{ $getRecord()->short_term_goals }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Long Term Goals</h1>
            <p>{{ $getRecord()->long_term_goals }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Current Sleeping Patterns</h1>
            <p>{{ $getRecord()->current_sleeping_patterns }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Current Exercise Patterns</h1>
            <p>{{ $getRecord()->current_exercise_patterns }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Medications</h1>
            <p>{{ $getRecord()->medications }}</p>
        </div>
        <div class="border border-gray-600  text-gray-700 p-3 font-semibold">
            <h1 class="text-sm font-normal">Interventions</h1>
            <p>{{ $getRecord()->interventions }}</p>
        </div>
        <div class="grid grid-cols-4">
            <div class="border border-gray-600  text-gray-700 p-2 font-semibold">
                <h1 class="text-sm font-normal">Doctor's Name</h1>
                <p>{{ $getRecord()->doctor->firstname . ' ' . $getRecord()->doctor->lastname }}</p>
            </div>
            <div class="border border-gray-600  text-gray-700 p-2 font-semibold">

            </div>
            <div class="border border-gray-600  text-gray-700 p-2 font-semibold">

            </div>
            <div class="border border-gray-600  text-gray-700 p-2 font-semibold">
                <h1 class="text-sm font-normal">Date</h1>
                <p>{{ \Carbon\Carbon::parse($getRecord()->created_at)->format('F d, Y') }}</p>
            </div>

        </div>
    </div>
</div>
