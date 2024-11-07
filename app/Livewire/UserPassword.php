<?php

namespace App\Livewire;

use Livewire\Component;

class UserPassword extends Component
{
    public $password;
    public $modal = false;
    public function render()
    {
        return view('livewire.user-password');
    }

    public function updatePassword(){
        auth()->user()->update([
            'password' => bcrypt($this->password),
        ]);

        if (auth()->user()->user_type == 'patient') {
            auth()->user()->notify(new \App\Notifications\PasswordNotification());
        }

        sweetalert()->success('Your account password has been updated.');
    }
}
