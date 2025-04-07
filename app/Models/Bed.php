<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'bed_number',
        'status_id',
    ];

    public function unit()
    {
        return $this->hasOne(HealthcareUnit::class, 'unit_id');
    }

    public function status()
    {
        return $this->hasOne(BedStatus::class, 'status_id');
    }
}
