<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'url'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    
    
    
}
