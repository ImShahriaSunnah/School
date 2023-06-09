<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineAdmission extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Classrelation(){
        return $this->belongsTo(InstituteClass::class,'class_id','id');

    }
}
