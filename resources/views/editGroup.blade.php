@extends('template')
@section('title', 'dashboard')
@section('content')
<div class="flex overflow-hidden justify-between">
    <div class="flex p-4 w-1/9 h-screen right-0 flex-col justify-center items-center rounded-lg">
        @include('sidebar')
    </div>
</div>
<div class="flex pt-4 h-screen w-3/6 right-0 flex-col items-center rounded-lg">
    <div class="flex h-screen w-full gap-6  right-0 justify-evently flex-col items-center rounded-lg">
        <form action="/dashboard/search/createConversation" method="get"
            class="w-full flex flex-col gap-4 shadow-sm rounded-md p-8 bg-zinc-50">
            <h1 class="text-3xl text-right">Nueva Conversacion</h1>
            <p class="text-left">Añadir</p>
            <div class="overflow-x-scroll overflow-hidden flex gap-3">
                @foreach ($users as $user)
                    <div class="flex justify-between items-center">
                        <input id="user-{{ $user->id }}" type="checkbox" value="{{ $user->id }}"
                            name="users[{{ $user->id }}][]" class="hidden peer">
                        <label for="user-{{ $user->id }}"
                            class=" text-center py-2 px-4 w-max rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                        peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                            <p class="w-">{{ $user->name }}</p>
                        </label>
                    </div>
                @endforeach
            </div>
            <input type="text" name="message" id="search" class="p-3 w-6/6 rounded-lg"
                placeholder="Escribe el primer mensaje" required>
            <div class="flex gap-2">
                <input type="text" name="title" id="search" class="p-3 w-4/6 rounded-lg"
                    placeholder="Título conversación" required>
                <button type="submit" class="p-3 w-2/6 rounded-lg bg-green-500 text-green-900">Crear</button>
            </div>
        </form>
        <form action="/dashboard/search/updateConversation/{{ $conversationUser->id }}" method="get"
            class="w-full flex flex-col gap-4 p-8 shadow-sm rounded-md  bg-zinc-50">
            <h1 class="text-3xl text-right">Editar Conversacion</h1>
            <p class="text-left p-2">Título</p>
            <div class="overflow-x-scroll overflow-hidden flex gap-3">
                @foreach ($conversations as $conversation)
                    @if ($conversation->id == $conversationUser->id)
                        <div class="flex justify-between items-center">
                            {{-- <input id="conversation-{{ $conversation->id }}" type="checkbox" value="{{ $conversation->id }}" name="{{ $user->id }}"
                            class="hidden peer"> --}}
                            <a href="/dashboard/search/editConversation/{{ $conversation->id }}"
                                class=" text-center py-2 px-4  rounded-md border border-gray-400 bg-black text-white cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                            peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                <p class="w-max">{{ $conversation->title }}</p>
                            </a>
                        </div>
                    @else
                        <div class="flex justify-between items-center">
                            {{-- <input id="conversation-{{ $conversation->id }}" type="checkbox" value="{{ $conversation->id }}" name="{{ $user->id }}"
                            class="hidden peer"> --}}
                            <a href="/dashboard/search/editConversation/{{ $conversation->id }}"
                                class=" text-center py-2 px-4  rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white">
                                <p class="w-max">{{ $conversation->title }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <p class="text-left p-2">Añadir</p>
            <div class="overflow-x-scroll overflow-hidden flex gap-3">
                @if ($conversationUsers)
                    @foreach ($users as $user)
                        @if (!$conversationUsers->contains('id', $user->id))
                            <div class="flex justify-between items-center">
                                <input id="edited-{{ $user->id }}" type="checkbox" value="{{ $user->id }}"
                                    name="users[{{ $user->id }}][]" class="hidden peer">
                                <label for="edited-{{ $user->id }}"
                                    class="text-center py-2 px-4 rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                    <p class="w-max">{{ $user->name }}</p>
                                </label>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="flex gap-2">
                <input type="text" name="title" id="search" class="p-3 w-4/6 rounded-lg"
                    placeholder="Editar título">
                <button type="submit" class="p-3 w-2/6 rounded-lg bg-green-500 text-green-900">Editar</button>
            </div>
        </form>
    </div>
</div>
<div class="flex p-4 w-5/12 h-6/6 right-0 flex-col justify-start items-center rounded-lg">
    <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg">
        <div class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll pb-4">
            @foreach ($conversations as $conversation)
            <div class="w-full shadow-sm bg-zinc-50 rounded-md mx-16">
                <a href="/dashboard/{{ $conversation->id }}"
                    class="w-full p-4 pt-8 justify-center rounded-sm flex flex-col gap-3">
                    <div class="flex w-full justify-between">
                        <p class="drop-shadow-sm">{{ $conversation->title }}</p>
                        <p class=" font-light">Abrir conversación</p>
                    </div>
                </a>
                    @foreach ($conversation->users as $user)
                        @if($user->id != auth()->user()->id)
                            <div class="flex p-4 justify-between w-full px-5">
                                <p class="font-light">{{ $user->name }}</p>
                                <a class="font-light " href="/dashboard/deleteParticipant/{{$conversation->id}}/{{$user->id}}">Borrar</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

