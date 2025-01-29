<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'car_id',
        'image_name',
    ];

    use HasFactory;

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
