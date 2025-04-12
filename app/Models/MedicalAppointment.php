<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;

    protected $table = 'medical_appointments';

    protected $fillable = [
        'patient_id',
        'professional_id',
        'unit_id',
        'schedule_id',
        'appointment_type_id',
        'status_id',
        'is_archived',
    ];

    public $timestamps = true;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function professional()
    {
        return $this->belongsTo(HealthcareProfessional::class);
    }

    public function unit()
    {
        return $this->belongsTo(HealthcareUnit::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class);
    }
}
