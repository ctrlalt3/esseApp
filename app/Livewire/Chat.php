<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::latest()->get(),
            'users' => User::all()
        ]);
    }
}
