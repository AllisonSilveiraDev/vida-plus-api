<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'notifications_status';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
