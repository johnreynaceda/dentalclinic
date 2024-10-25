<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function serviceSelecteds(){
        return $this->belongsToMany(Service::class);
    }

    public function appointmentPayments(){
        return $this->hasMany(AppointmentPayment::class);
    }


}
