<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'syllab_id'];

    public function syllab()
    {
        return $this->belongsTo(Syllab::class);
    }
}
