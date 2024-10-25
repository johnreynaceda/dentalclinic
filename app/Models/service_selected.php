<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_selected extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }


}
