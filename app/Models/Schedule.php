<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'patient_id',
        'unit_id',
        'date',
        'start_time',
        'end_time',
        'status_id',
    ];

    public function professional()
    {
        return $this->belongsTo(HealthcareProfessional::class, 'professional_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function unit()
    {
        return $this->belongsTo(HealthcareUnit::class, 'unit_id');
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'status_id');
    }
}
