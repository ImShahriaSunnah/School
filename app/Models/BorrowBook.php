<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowBook extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function bookRelation(){
    return $this->belongsTo(LibraryBookInfo::class, 'book_id','id');
    }
    public function studentRelation(){
    return $this->belongsTo(User::class,'Student_id','id');
    }
}
