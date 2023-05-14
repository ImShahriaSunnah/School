<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteClass extends Model
{
    use HasFactory;

    protected $guarded = [
    ];


    /**
     * Relation with Mark Type
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markTypes()
    {
        return $this->hasMany(MarkType::class, 'institute_classes_id', 'id');
    }


    /**
     * relation with section
     */
    public function section()
    {
        return $this->hasMany(Section::class, 'class_id')->select('id','class_id','section_name');
    }
}
