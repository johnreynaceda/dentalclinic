<?php

namespace App\Livewire\Admin;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Appointment;

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

        return view('livewire.admin.history', [
            'patients' => $patients,
            'appointments' => $this->appointments,
        ]);
    }

}
