<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareUnit extends Model
{
    use HasFactory;

    protected $table = 'healthcare_units';

    protected $fillable = [
        'name',
        'cnpj',
        'type_id',
        'address',
        'phone',
        'is_archived',
    ];

    public $timestamps = true;

    public function type()
    {
        return $this->belongsTo(UnitType::class);
    }

}
