<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $table = 'supplies';

    protected $fillable = [
        'unit_id',
        'name',
        'status',
        'quantity',
    ];

    
    public $timestamps = true;

    public function unit()
    {
        return $this->belongsTo(HealthcareUnit::class);
    }
}
