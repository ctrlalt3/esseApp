<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::with('comments', 'likes')->latest()->get(),
            'users' => User::all()
        ]);
    }
}
