<?php

namespace App\Livewire\Patient;

use App\Models\appointment as AppointmentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Appointment extends Component
{
    public $appointmentss = [];
    public $openModal = false;

    public $payments;

    public function mount()
    {

        $this->appointmentss = AppointmentModel::where('user_id', Auth::id())->get();
    }


    public function openBill($id){
        $this->payments = AppointmentModel::where('id', $id)->first();

        // dd($this->payments);
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.patient.appointment', [
            'appointments' => $this->appointmentss
        ]);
    }
}
