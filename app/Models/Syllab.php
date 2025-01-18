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
}
