<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email_verified_at',
        'email',
        'password',
        'role_id',
        'professional_id',
        'patient_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roleTypes()
    {
        return $this->hasMany(RoleType::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function auditLog()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function healthcareProfessional()
    {
        return $this->hasOne(HealthcareProfessional::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
