<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudentFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "fees_details"  => "json"
    ];
}
