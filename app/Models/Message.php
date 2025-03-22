<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    Use HasFactory;

    protected $fillable = [
        'conversation_id',
        'user_id',
        'content',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function conversations()
    {
        return $this->belongsTo(Conversation::class);
    }
}
