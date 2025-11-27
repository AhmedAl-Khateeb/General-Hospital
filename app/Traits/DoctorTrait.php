<?php

namespace App\Traits;

use App\Helpers\MediaHelper;
use App\Models\Appointment;

trait DoctorTrait
{
    public function image()
    {
        return MediaHelper::mediaRelationship($this, 'image');
    }


    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_doctor', 'doctor_id', 'appointment_id');
    }
}
