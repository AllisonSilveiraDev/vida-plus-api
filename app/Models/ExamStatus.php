<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamStatus extends Model
{
    protected $table = 'exam_status';

    protected $fillable = [
        'descriptive_id',
        'name',
        'description',
    ];

    public $timestamps = false;

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }
}
