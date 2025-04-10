<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';

    protected $fillable = [
        'professional_id',
        'patient_id',
        'issue_date',
        'prescription_text',
        'prescription_pdf',
    ];
    
    public $timestamps = true;

    public function professional()
    {
        return $this->belongsTo(HealthcareProfessional::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
