<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relation with Institute Class
    public function class()
    {
        return $this->belongsTo(InstituteClass::class, 'class_id', 'id');
    }

    //Relation with Subject Class
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    //Relation with Terms
    public function term()
    { 
        return $this->belongsTo(Term::class, 'term_id');
    }
}
