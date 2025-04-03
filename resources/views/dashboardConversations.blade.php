<div class="flex h-screen w-full gap-5  flex-col justify-center items-center rounded-lg ">
    @if (!isset($messages))
        <div class="flex flex-col rounded-lg shadow-sm justify-around w-full h-screen bg-zinc-50">
            <div class="p-3 text-center flex flex-col-reverse gap-6 overflow-hidden align-bottom justify-items-end">
                <div class="text-left p-3 rounded-l-md">
                    <p>Conversacion Vacia</p>
                </div>
            @else
                <form action="/dashboard/sendMessage/{{ $messages[0]->conversation_id }}" method="get"
                    class="flex flex-col rounded-lg shadow-sm justify-around  w-full h-96 bg-zinc-50">
                    <div class="h-1/6 items-left p-5">
                        <a href="/dashboard" class="flex gap-3  px-5">
                            <div class="bg-green-400 shadow-md w-10 rounded-3xl font-bold text-center text-green-500">x
                            </div>
                            @foreach ($conversations as $conversation)
                                @if ($conversation->id == $messages[0]->conversation_id)
                                    <p class="drop-shadow-sm">{{ $conversation->title }}</p>
                                @endif
                            @endforeach
                        </a>
                    </div>
                    <div id="chat-container"
                        class="h-5/6 p-4 text-center flex flex-col gap-6 overflow-y-scroll scroll-smooth scroll-pb-8">
                        @foreach ($messages as $message)
                            @if (auth()->user()->id != $message->user_id)
                                @foreach ($users as $user)
                                    @if ($user->id == $message->user_id)
                                        <div class="mr-10 bg-zinc-200 shadow-md text-left p-4 rounded-md">
                                            <a href="#" class="flex gap-4 pb-2 align-center">
                                                <div
                                                    class="bg-zinc-300 shadow-md w-8 h-8 rounded-3xl text-center font-bold">
                                                </div>
                                                <p class="drop-shadow-sm text-center h-8">{{ $user->name }}</b></p>
                                            </a>
                                            <p>{{ $message->content }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="bg-green-400 shadow-md text-right ml-10 p-l-5 p-5 rounded-md">
                                    <p>{{ $message->content }}</p>
                                </div>
                            @endif
                        @endforeach
                        <div class="w-full flex justify-center">
                            <div class="w-full bg-zinc-50 py-3 rounded-r-md flex justify-evenly">
                                <input type="text" name="message" id=""
                                    class="w-8/12 rounded-sm p-x-2 p-1 ">
                                <input type="submit" value="Enviar"
                                    class="w-3/12 rounded-md cursor-pointer bg-green-400 text-green-700 p-1 px-4 ">
                            </div>
                        </div>
    @endif
</div>
</form>
<form action="#"
    class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll bg-zinc-100">
    @foreach ($conversations as $conversation)
        <a href="/dashboard/{{ $conversation->id }}"
            class="w-full p-8 justify-center rounded-sm bg-zinc-50 flex flex-col gap-3">
            <div class="flex justify-between">
                <div class="bg-green-400 shadow-md w-10 rounded-3xl font-bold text-center text-green-500">+</div>
                <p class="drop-shadow-sm">{{ $conversation->title }}</p>
                <p class="font-light">Abrir conversación</p>
            </div>
        </a>
    @endforeach
</form>
</div>
</div>
<div>

</div>
</div>
