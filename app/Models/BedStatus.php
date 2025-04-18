<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedStatus extends Model
{
    use HasFactory;

    protected $table = 'bed_status';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public $timestamps = false;

    public function bed()
    {
        return $this->hasMany(Bed::class, 'status_id');
    }
}
