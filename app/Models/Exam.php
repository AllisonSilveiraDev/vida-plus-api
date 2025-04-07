<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'patient_id',
        'unit_id',
        'name',
        'scheduled_date',
        'performed_date',
        'result',
        'status_id',
    ];


    public function professional()
    {
        return $this->belongsTo(HealthcareProfessional::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function unit()
    {
        return $this->belongsTo(HealthcareUnit::class);
    }

    public function status()
    {
        return $this->belongsTo(ExamStatus::class);
    }
}
