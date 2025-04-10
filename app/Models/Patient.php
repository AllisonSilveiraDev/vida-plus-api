<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'birth_date',
        'cpf', 
        'rg', 
        'phone',
        'address', 
        'gender', 
        'marital_status', 
        'blood_type',
        'is_archived',
        'is_validated',
        'user_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
