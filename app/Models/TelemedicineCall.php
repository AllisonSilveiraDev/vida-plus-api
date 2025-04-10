<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelemedicineCall extends Model
{
    use HasFactory;

    protected $table = 'telemedicine_calls';

    protected $fillable = [
        'appointment_id',
        'room_url',
        'token',
        'date',
        'start_time',
        'end_time',
    ];

    public $timestamps = true;

    public function appointment()
    {
        return $this->belongsTo(MedicalAppointment::class);
    }


    public function hasStarted(): bool
    {
        return !is_null($this->start_time);
    }

    public function hasEnded(): bool
    {
        return !is_null($this->end_time);
    }
}
