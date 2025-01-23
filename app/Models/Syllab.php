<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllab extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'route'];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('is_locked')->withTimestamps();
    }
}
