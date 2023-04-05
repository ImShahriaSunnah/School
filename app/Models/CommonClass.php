<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonClass extends Model
{
    use HasFactory;
    public function classRelation(){
        return $this->belongsTo(IdCard::class, 'idCard_id', 'id');

}
}