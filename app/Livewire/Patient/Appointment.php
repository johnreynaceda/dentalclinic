<?php

namespace App\Livewire\Patient;

use App\Models\Appointment as AppointmentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Appointment extends Component
{
    public $appointments;

    public function mount()
    {

        $this->appointments = AppointmentModel::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.patient.appointment', [
            'appointments' => $this->appointments
        ]);
    }
}
