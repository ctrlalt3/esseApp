<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    Use HasFactory;
    protected $fillable = [
        'follower_id',
        'followed_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
