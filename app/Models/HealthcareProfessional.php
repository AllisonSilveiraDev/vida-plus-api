<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareProfessional extends Model
{
    use HasFactory;

    protected $table = 'healthcare_professionals';

    protected $fillable = [
        'license_number',
        'cpf',
        'rg',
        'phone',
        'address',
        'gender',
        'professional_type_id',
        'specialty',
        'is_validated',
        'is_archived',
        'user_id',
    ];

    public function professionalType()
    {
        return $this->belongsTo(ProfessionalType::class, 'professional_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
