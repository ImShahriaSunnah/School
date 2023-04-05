<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'bank_name',
        'account_holder',
        'account_number',
        'account_type',
        'routing',
        'swift',
        'branch',
        'balance'
    ];
}
