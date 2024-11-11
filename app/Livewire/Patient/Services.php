<?php

namespace App\Livewire\Patient;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Services extends Component
{
    public $appointmentTime;
    public $appointmentDate;

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

    public $timeSlots = [
        '8:00-9:00 am',
        '10:00-11:00 am',
        '12:00-1:00 pm',
        '2:00-3:00 pm',
        '4:00-6:00 pm'
    ];
    public function submitAppointment()
    {
        $this->validate([
            'appointmentDate' => 'required|date|after_or_equal:today',
            'appointmentTime' => 'required',
            'branch' => 'required',
        ], [
            'appointmentDate.after_or_equal' => 'The appointment date cannot be in the past.',
            'appointmentTime.required' => 'Please select a time slot.',
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

        // Insert selected services
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
        return redirect()->route('patient.appointment');
    }

    private function isValidTime($time)
    {
        // Define the start and end times
        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(18, 0);
        $appointmentTime = Carbon::createFromFormat('H:i', $time);

    }

    public function render()
    {
        $selectedServices = Service::whereIn('id', $this->selectedServiceIds)->get();
        $totalFee = $selectedServices->sum('price');

        return view('livewire.patient.services', [
            'services' => Service::when($this->selected_category, function ($query) {
                $query->where('service_category_id', $this->selected_category);
            })->get(),
            'categories' => ServiceCategory::all(),
            'selectedServices' => $selectedServices,
            'totalFee' => $totalFee,
        ]);
    }
}
