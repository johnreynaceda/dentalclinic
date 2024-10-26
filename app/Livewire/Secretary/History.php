<?php

namespace App\Livewire\Secretary;

use App\Models\Patient;
use App\Models\Appointment;
use Livewire\Component;

class History extends Component
{

    public $selectedPatientId = null;
    public $appointments = [];
    public $showModal = false;

    public function selectPatient($patientId)
    {
        $this->selectedPatientId = $patientId;

        $this->appointments = Appointment::where('patient_id', $this->selectedPatientId)->get();


        $this->showModal = true;

    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedPatientId = null;
        $this->appointments = [];
    }

    public function render()
    {
        $patients = Patient::all();

        return view('livewire.secretary.history', [
            'patients' => $patients,
            'appointments' => $this->appointments,
        ]);
    }
}
