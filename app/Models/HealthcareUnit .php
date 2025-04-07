<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj',
        'type_id',
        'address',
        'phone',
    ];

    public function type()
    {
        return $this->belongsTo(UnitType::class);
    }

}
