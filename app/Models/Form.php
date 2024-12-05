<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    
    protected $fillable = [
        /*'course_id',
        'user_id',*/ //ANCHOR - m-m relationship columns for another table
        'user_id',
        'f_name',
        'l_name',
        'email',
        'birthday',
        'season',
        'length',
        'class',
        'reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
