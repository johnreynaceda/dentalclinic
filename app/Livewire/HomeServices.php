<?php

namespace App\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class HomeServices extends Component
{
    public $services = [];
    public function render()
    {
        $this->services = ServiceCategory::all();   
        return view('livewire.home-services');
    }
}
