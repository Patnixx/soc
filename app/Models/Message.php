<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'title',
        'content',
        'is_read',
        'is_deleted',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
