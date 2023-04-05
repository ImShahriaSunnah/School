<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTeacher extends Model
{
    use HasFactory;

    public function class_name()
    {
        return $this->belongsTo(InstituteClass::class,'class_id','id');
    }

    public function section_name()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }

    public function group_name()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function subject_name()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function teacher_name()
    {
        return $this->belongsTo(Teacher::class,'teacher_id','id');
    }

    public function teacher_name2()
    {
        return $this->belongsTo(Teacher::class,'id','teacher_id');
    }
}
