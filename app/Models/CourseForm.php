<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseForm extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
