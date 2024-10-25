<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|string|max:3',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $patient_id = User::generatePatientId();


        $user = User::create([
            'name' => $request->first_name. ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'patient',
        ]);

        $count = Patient::count();

        Patient::create([
            'patient_number' => $this->generateCode('P-', $count+1),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }


    function generateCode($prefix, $number) {
        // Ensure the number is zero-padded to 4 digits
        $formattedNumber = str_pad($number, 4, '0', STR_PAD_LEFT);

        // Concatenate the prefix and the formatted number
        return $prefix . $formattedNumber;
    }
}
