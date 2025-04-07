<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalType extends Model
{
    protected $table = 'professional_types';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public function professional()
    {
        return $this->hasMany(HealthcareProfessional::class, 'professional_type_id');
    }
}
