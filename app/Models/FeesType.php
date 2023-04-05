<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fees()
    {
        return $this->hasMany(StudentFee::class, 'fees_type_id', 'id');
    }
}
