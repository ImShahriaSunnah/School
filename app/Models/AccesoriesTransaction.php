<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoriesTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Class()
    {
        return $this->belongsTo(InstituteClass::class,'class_id','id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }


}
