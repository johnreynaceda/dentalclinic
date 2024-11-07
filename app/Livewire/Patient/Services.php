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
            'appointmentTime' => 'required|date_format:H:i',
            'branch' => 'required',
        ]);

        if (empty($this->selectedServiceIds)) {
            session()->flash('error', 'Please select at least one service.');
            return;
        }

        if (!$this->isValidTime($this->appointmentTime)) {
            $this->addError('appointmentTime', 'The appointment time must be between 8:00 AM and 6:00 PM.');
            return;
        }

        // Check if the appointment time and date is already approved
        $existingAppointment = Appointment::where('appointment_date', $this->appointmentDate)
            ->where('appointment_time', $this->appointmentTime)
            ->where('branch', $this->branch)
            ->where('status', 'approved')
            ->exists();

        if ($existingAppointment) {
            $this->addError('appointmentDate', 'An appointment at this date and time is already approved.');
            return;
        }

        DB::beginTransaction();
        
        try {
            // Get selected services and calculate total fee
            $selectedServices = Service::whereIn('id', $this->selectedServiceIds)->get();
            $totalFee = $selectedServices->sum('price');

            // Create appointment
            $appointment = Appointment::create([
                'user_id' => Auth::id(),
                'patient_id' => Auth::user()->patient->id,
                'appointment_date' => $this->appointmentDate,
                'appointment_time' => $this->appointmentTime,
                'branch' => $this->branch,
                'total_fee' => $totalFee,
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

            DB::commit();

            // Reset state after successful submission
            $this->reset(['appointmentDate', 'appointmentTime', 'selectedServiceIds', 'showModal']);

            session()->flash('success', 'Appointment successfully submitted!');
            return redirect()->route('patient.appointment');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred while submitting the appointment. Please try again.');
        }
    }

    private function isValidTime($time)
    {
        // Define the start and end times
        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(18, 0);
        $appointmentTime = Carbon::createFromFormat('H:i', $time);

        return $appointmentTime->between($start, $end);
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
