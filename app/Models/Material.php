<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'syllab_id', 'parent_id', 'elder_id', 'img_name'];

    public function syllab()
    {
        return $this->belongsTo(Syllab::class);
    }

    public static function getElders()
    {
        return self::whereNull('elder_id')->get();
    }

    public function parents()
    {
        return $this->hasMany(Material::class);
    }

    public function children()
    {
        return $this->hasMany(Material::class);
    }
}
