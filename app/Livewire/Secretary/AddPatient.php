<?php

namespace App\Livewire\Secretary;

use App\Models\Patient;
use Livewire\Component;

class AddPatient extends Component
{
    public $first_name;
    public $last_name;
    public $age;
    public $gender;
    public $address;
    public $contact_number;
    public $email;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'address' => 'required|string|max:255',
        'contact_number' => 'required|string|max:15',
    ];

    public function submit()
    {
        $this->validate();

        Patient::create([
            'patient_number' => Patient::generatePatientId(),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', 'Patient added successfully.');
        $this->reset();
        return redirect()->route('secretary.appointments');
    }

    public function render()
    {
        return view('livewire.secretary.add-patient');
    }
}
