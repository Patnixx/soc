<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSyllab extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function syllab()
    {
        return $this->belongsTo(Syllab::class);
    }
}
