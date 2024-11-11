<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public static function generatePatientId()
    {
        // Get the last patient ID from the database
        $lastPatient = self::orderBy('id', 'desc')->first();

        // Generate a new patient ID
        if ($lastPatient) {
            $lastId = (int) substr($lastPatient->patient_id, 1); // Assuming the ID is like "001"
            $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Increment and pad with zeros
        } else {
            $newId = '001'; // Start from 001 if no patients exist
        }

        return $newId;
    }

}
