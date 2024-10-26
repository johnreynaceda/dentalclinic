<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Patient;
use App\Http\Middleware\Secretary;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
   switch (auth()->user()->user_type) {
    case 'admin':
      return redirect()->route('admin.dashboard');

    case 'secretary':
        return redirect()->route('secretary.dashboard');
    case 'patient':
        return redirect()->route('patient.dashboard');
    default:
        # code...
        break;
   }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/doctors', function () {
        return view('admin.doctors');
    })->name('admin.doctors');
    Route::get('/services', function () {
        return view('admin.services');
    })->name('admin.services');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('admin.category');

    Route::get('/history', function () {
        return view('admin.history');
    })->name('admin.history');

    Route::get('/appointments', function () {
        return view('admin.appointments');
    })->name('admin.appointments');

    Route::get('/records', function () {
        return view('admin.records');
    })->name('admin.records');

    Route::get('/schedule', function () {
        return view('admin.schedule');
    })->name('admin.schedule');

    Route::get('/billing', function () {
        return view('admin.billing');
    })->name('admin.billing');
    Route::get('/patient-view/{id}', function () {
        return view('admin.patient-view');
    })->name('admin.patient-view');
});


Route::prefix('secretary')->middleware(['auth', 'verified', Secretary::class])->group(function(){
    Route::get('/dashboard', function () {
        return view('secretary.dashboard');
    })->name('secretary.dashboard');
    Route::get('/doctors', function () {
        return view('secretary.doctors');
    })->name('secretary.doctors');
    Route::get('/services', function () {
        return view('secretary.services');
    })->name('secretary.services');
    Route::get('/users', function () {
        return view('secretary.users');
    })->name('secretary.users');
    Route::get('/category', function () {
        return view('secretary.category');
    })->name('secretary.category');

    Route::get('/appointments', function () {
        return view('secretary.appointments');
    })->name('secretary.appointments');

    Route::get('/records', function () {
        return view('secretary.records');
    })->name('secretary.records');
    Route::get('/schedule', function () {
        return view('secretary.schedule');
    })->name('secretary.schedule');
    Route::get('/billing', function () {
        return view('secretary.billing');
    })->name('secretary.billing');
    Route::get('/patient-view/{id}', function () {
        return view('secretary.patient-view');
    })->name('secretary.patient-view');

    Route::get('/history', function () {
        return view('secretary.history');
    })->name('secretary.history');
});

Route::prefix('patient')->middleware(['auth', 'verified', Patient::class])->group(function(){
    Route::get('/dashboard', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');

    Route::get('/services', function () {
        return view('patient.services');
    })->name('patient.services');

    Route::get('/appointment', function () {
        return view('patient.appointment');
    })->name('patient.appointment');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
