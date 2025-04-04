<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    
    Use HasFactory;
    protected $fillable = [
        'title'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
