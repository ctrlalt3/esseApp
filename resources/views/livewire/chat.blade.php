<div class="flex flex-col w-full h-screen bg-zinc-200 rounded-lg shadow-sm">
    @if (!$selectedConversation)
        <div class="flex justify-center items-center h-full">
            <p class="text-gray-600">Conversación vacía</p>
        </div>
    @else
        <div class="h-1/6 p-5"> 
            <a href="#" class="flex gap-3 px-5">
                <div class="bg-green-400 shadow-md w-10 rounded-3xl font-bold text-center text-green-500">+</div>
                <p class="drop-shadow-sm">{{ $selectedConversation->title }}</p>
            </a>
        </div>
        <div id="chat-container" class="h-5/6 p-4 flex flex-col gap-6 overflow-y-scroll">
            @foreach ($messages as $message)
                @if(auth()->user()->id != $message->user_id)
                    <div class="mr-10 bg-zinc-300 shadow-md text-left p-4 rounded-r-md">
                        <p>{{ $message->content }}</p>
                    </div>
                @else
                    <div class="ml-10 bg-zinc-300 shadow-md text-right p-4 rounded-l-md">
                        <p>{{ $message->content }}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full flex justify-center">
            <div class="w-full bg-zinc-200 py-3 flex justify-evenly">
                <input type="text" wire:model="newMessage" class="w-8/12 rounded-sm p-1" placeholder="Escribe un mensaje...">
                <button wire:click="sendMessage" class="w-3/12 rounded-md cursor-pointer bg-green-400 text-green-700 p-1 px-4">Enviar</button>
            </div>
        </div>
    @endif

    <div class="flex flex-col gap-5 overflow-y-scroll">
        @foreach ($conversations as $conversation)
            <a href="#" wire:click="selectConversation({{ $conversation->id }})" class="w-full p-4 bg-zinc-200 flex justify-between rounded-sm">
                <p class="drop-shadow-sm">{{ $conversation->title }}</p>
                <p class="font-light">Abrir conversación</p>
            </a>
        @endforeach
    </div>
</div>
