<?php

namespace App\Livewire\Admin;

use App\Models\appointment;
use Carbon\Carbon;
use Livewire\Component;

class ScheduleList extends Component
{
    public $events = [];

    public function mount(){
        $this->events = appointment::where('status', 'approved')->get()->map(
            function($event) {
                return [
                    'title' => $event->user->name,
                    'start' => Carbon::parse($event->appointment_date . ' ' . $event->appointment_time)->toDateTimeString(),
                    'end' => Carbon::parse($event->appointment_date . ' ' . $event->appointment_time)->addHours(1)->toDateTimeString(), // Assuming a 1-hour duration; adjust as needed
                    'extendedProps' => [
                        'description' => Carbon::parse($event->appointment_date)->format('F d, Y') . ' ' . Carbon::parse($event->appointment_time)->format('h:i A'),
                    ],
                ];
            }
        );
    }

    public function render()
    {
        return view('livewire.admin.schedule-list');
    }
}
