<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'price',
        'button_text',
        'student',
        'teachers',
        'message',
        'description',
        'status',
        'seo_title',
        'seo_keyword',
        'seo_description',
    ];
}
