<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'appointment_status';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public function medicalAppointment()
    {
        return $this->hasMany(MedicalAppointment::class, 'appointment_type_id');
    }
}
