<?php

use App\Http\Controllers\ProfileController;
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
});


Route::prefix('secretary')->middleware(['auth', 'verified'])->group(function(){
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
});

Route::prefix('patient')->middleware(['auth', 'verified'])->group(function(){
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
