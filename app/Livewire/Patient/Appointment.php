<?php

namespace App\Livewire\Patient;

use App\Models\appointment as AppointmentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Appointment extends Component
{
    public $appointmentss = [];
    public $openModal = false;

    public $payments;

    public function mount()
    {
        $this->loadAppointments();
    }

    public function loadAppointments()
    {
        $this->appointmentss = AppointmentModel::where('user_id', Auth::id())->get();
    }

    public function cancelAppointment($id)
    {
        $data = AppointmentModel::find($id);

        if ($data) {
            $data->update([
                'status' => 'cancelled'
            ]);

            // Refresh the appointments after updating
            $this->loadAppointments();
        } else {
            Log::info("Appointment with ID $id not found.");
        }
    }

    public function openBill($id)
    {
        $this->payments = AppointmentModel::find($id);
        
        if ($this->payments) {
            $this->openModal = true;
        } else {
            Log::info("Appointment with ID $id not found for billing.");
        }
    }

    public function render()
    {
        return view('livewire.patient.appointment', [
            'appointments' => $this->appointmentss
        ]);
    }
}
