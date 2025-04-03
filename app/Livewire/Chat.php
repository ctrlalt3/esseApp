<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $messages = [];
    public $conversations;
    public $selectedConversation;
    public $newMessage;

    protected $listeners = ['messageSent' => 'loadMessages'];

    public function mount()
    {
        $this->conversations = Conversation::all();
        $this->selectedConversation = $this->conversations->first() ?? null;

        if ($this->selectedConversation) {
            $this->loadMessages();
        }
    }

    public function loadMessages()
    {
        if ($this->selectedConversation) {
            $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
                ->get();
        }
    }

    public function sendMessage()
    {
        if (!$this->newMessage) {
            return;
        }

        Message::create([
            'user_id' => Auth::id(),
            'conversation_id' => $this->selectedConversation->id,
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();
        $this->emit('messageSent');
    }

    public function selectConversation($conversationId)
    {
        $this->selectedConversation = Conversation::find($conversationId);
        $this->loadMessages();
    }

    public function render()
{
    return view('livewire.chat', [
        'messages' => $this->messages,
        'conversations' => $this->conversations,
        'selectedConversation' => $this->selectedConversation,
    ]);
}
}
