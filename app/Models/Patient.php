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

        $lastPatient = self::orderBy('id', 'desc')->first();


        if ($lastPatient) {
            $lastId = (int) substr($lastPatient->patient_id, -3);
            $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = '001';
        }

        return 'PT-' . $newId;
    }

}
