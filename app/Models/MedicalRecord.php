<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'notes',
        'diagnosis',
        'requested_exams',
        'prescription_id',
    ];

    public function appointment()
    {
        return $this->belongsTo(MedicalAppointment::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
