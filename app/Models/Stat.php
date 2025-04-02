<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theory_count',
        'virtual_practice_count',
        'practice_count',
        'kpp_count',
        'exam_count',
        'ended_courses_count',
        'ended_virtual_practice_count',
        'ended_practice_count',
        'ended_theory_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
