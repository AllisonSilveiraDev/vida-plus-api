<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'id', 
        'first_name', 
        'last_name', 
        'birth_date',
        'cpf', 
        'rg', 
        'phone',
        'address', 
        'gender', 
        'marital_status', 
        'blood_type',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
