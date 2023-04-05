<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'id');
    }
}
