<?php

namespace App\Livewire;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;
    public $isLiked;
    public $likesCount;

    public function mount($post)
    {
        $this->post = $post;
        $this->isLiked = false;
        $this->likesCount = $post->likes()->count();
    }   

    public function render()
    {
        return view('livewire.like-button');
    }
}
