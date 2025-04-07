<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    protected $table = 'appointment_types';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public $timestamps = false;
    
    public function medicalAppointment()
    {
        return $this->hasMany(MedicalAppointment::class, 'appointment_type_id');
    }
}
