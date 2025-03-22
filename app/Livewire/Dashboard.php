<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $posts;
    public $users;
    public $conversations;
    public $messages;
    public $newMessage;
    public $selectedConversationId;

    public function mount()
    {
        $this->posts = Post::with('comments')->get();
        $this->users = User::all();
        $this->conversations = Conversation::with('messages')->get();
        $this->messages = [];
    }

    public function loadMessages($conversationId)
    {
        $this->selectedConversationId = $conversationId;
        $this->messages = Message::where('conversation_id', $conversationId)->get();
    }

    public function sendMessage()
    {
        if (!$this->selectedConversationId || !$this->newMessage) return;

        Message::create([
            'conversation_id' => $this->selectedConversationId,
            'user_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages($this->selectedConversationId);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
