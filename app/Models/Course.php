<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
        'description',
        'class',
        'length',
        'season',
        'status',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function occasions()
    {
        return $this->hasMany(Occasion::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'course_material')
                    ->withPivot('is_unlocked')
                    ->withTimestamps();
    }
}
