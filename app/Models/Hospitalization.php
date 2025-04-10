<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalization extends Model
{
    use HasFactory;

    protected $table = 'hospitalizations';

    protected $fillable = [
        'patient_id',
        'unit_id',
        'bed_id',
        'responsible_professional_id',
        'admission_date',
        'discharge_date',
        'notes',
    ];

    public $timestamps = true;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function unit()
    {
        return $this->belongsTo(HealthcareUnit::class);
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function responsibleProfessional()
    {
        return $this->belongsTo(HealthcareProfessional::class, 'responsible_professional_id');
    }
}
