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
            'posts' => Post::latest()->get(),
            'users' => User::all()
        ]);
    }
}
