<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Appointment extends Model
{
    use HasTranslations;

    protected $table = 'appointments';

    protected $fillable = ['name'];

    protected $translatable = ['name'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'appointment_doctor', 'appointment_id', 'doctor_id');
    }
}
