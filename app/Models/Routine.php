<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    public $fillable = [
        'school_id',
        'subject_id',
        'class_id',
        'section_id',
        'teacher_id',
        'note',
        'period_id',
        'shift',
        'day',
    ];


    public function period()
    {
        return $this->belongsTo(ClassPeriod::class, 'period_id');
    }
}
