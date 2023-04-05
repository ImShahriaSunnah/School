<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
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
}
