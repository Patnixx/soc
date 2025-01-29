<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'horsepower',
        'cubage',
        'drive',
        'gearbox',
        'mileage',
    ];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
