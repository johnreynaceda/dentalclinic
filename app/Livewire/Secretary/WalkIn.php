<?php

namespace App\Livewire\Secretary;
use App\Models\appointment;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalkIn extends Component
{
    public $appointmentDate;
    public $appointmentTime;
    public $selected_category;
    public $selectedServiceIds = [];

    public $branch;
    public $showModal = false;

    public function toggleService($serviceId)
    {
        if (in_array($serviceId, $this->selectedServiceIds)) {
            $this->selectedServiceIds = array_diff($this->selectedServiceIds, [$serviceId]);
        } else {
            $this->selectedServiceIds[] = $serviceId;
        }
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function submitAppointment()
{

    $this->validate([
        'appointmentDate' => 'required|date',
        'appointmentTime' => 'required',
        'branch' => 'required',
    ]);

    if (empty($this->selectedServiceIds)) {

        session()->flash('error', 'Please select at least one service.');
        return;
    }


    $selectedServices = Service::whereIn('id', $this->selectedServiceIds)->get();
    $totalFee = $selectedServices->sum('price');


    $appointment = Appointment::create([
        'user_id' => auth()->user()->id,
        'patient_id' => auth()->user()->patient->id,
        'appointment_date' => $this->appointmentDate,
        'appointment_time' => $this->appointmentTime,
        'branch' => $this->branch,
        'total_fee' => $totalFee,
        'service_id' => $this->selectedServiceIds[0] ?? null,
    ]);


    foreach ($this->selectedServiceIds as $serviceId) {
        DB::table('service_selecteds')->insert([
            'appointment_id' => $appointment->id,
            'service_id' => $serviceId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    $this->reset(['appointmentDate', 'appointmentTime', 'selectedServiceIds', 'showModal']);

    session()->flash('success', 'Appointment successfully submitted!');

    //return redirect()->route('patient.appointment');

}
    public function render()
    {
        $selectedServices = Service::whereIn('id', $this->selectedServiceIds)->get();
        $totalFee = $selectedServices->sum('price');

        return view('livewire.secretary.walk-in', [
            'services' => Service::when($this->selected_category, function ($query) {
                $query->where('service_category_id', $this->selected_category);
            })->get(),
            'categories' => ServiceCategory::all(),
            'selectedServices' => $selectedServices,
            'totalFee' => $totalFee,
        ]);

    }
}
