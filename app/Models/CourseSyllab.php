<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSyllab extends Model
{
    use HasFactory;

    protected $fillable = ['is_locked', 'course_id', 'syllab_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function syllab()
    {
        return $this->belongsTo(Syllab::class);
    }
}
