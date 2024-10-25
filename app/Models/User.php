<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
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


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function patient(){
        return $this->hasOne(Patient::class,);
    }
}
