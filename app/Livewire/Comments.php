<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Comments extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->post->comments,
            'users' => User::all()
        ]);
    }
}
