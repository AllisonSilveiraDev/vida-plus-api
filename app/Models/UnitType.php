<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    protected $table = 'unit_types';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public $timestamps = false;

    public function healthcareUnits()
    {
        return $this->hasMany(HealthcareUnit::class, 'type_id');
    }
}
