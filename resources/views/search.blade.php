<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            scrollbar-width: none;
        }
        *::-webkit-scrollbar {

            display: none;
        }
    </style>
</head>

<body class="flex bg-zinc-300 text-stone-800 overflow-hidden">
    <div class="flex overflow-hidden justify-between">
        <div class="flex p-4 w-1/9 h-screen right-0 flex-col justify-center items-center rounded-lg">
            <div class="flex p-4 h-screen w-full right-0 flex-col shadow-lg items-center rounded-lg bg-zinc-200">
                <div class="flex w-100 h-full flex-col justify-between gap-4">
                    <div
                        class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard">svg</a>
                    </div>
                    <div
                        class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">""Buscar""</a>
                    </div>
                    <div
                        class="p-4 py-6 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-300">
                        <a href="/dashboard/search/">"Añadir"</a>
                    </div>
                    <div
                        class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">Perfil</a>
                    </div>
                    <div
                        class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">"Buscar"</a>
                    </div>
                    <div
                        class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard/userProfile">{{ auth()->user()->name }}</a>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="flex pt-4 h-screen w-3/6 right-0 flex-col items-center rounded-lg">
        <div class="flex h-screen w-full gap-3  right-0 justify-evently flex-col items-center rounded-lg">
            <form action="/dashboard/search/createConversation" method="get"
                class="w-full flex flex-col gap-4 p-5 rounded-md pt-9 bg-zinc-200">
                @csrf
                <h1 class="text-3xl text-right">Nueva Conversacion</h1>
                <p class="text-right">Usuarios</p>
                <div class="overflow-x-scroll overflow-hidden flex gap-3">
                    @foreach ($users as $user)
                        <div class="flex justify-between items-center">
                            <input id="user-{{ $user->id }}" type="checkbox" value="{{ $user->id }}"
                                name="users[{{ $user->id }}][]" class="hidden peer">
                            <label for="user-{{ $user->id }}"
                                class=" text-center py-2 px-4 w-max rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                            peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                <p class="w-max">{{ $user->name }}</p>
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
            <form action="/dashboard/search/editConversation" method="get"
                class="w-full flex flex-col gap-4 p-5 rounded-md  bg-zinc-200">
                @csrf
                <h1 class="text-3xl text-right">Editar Conversacion</h1>
                <p class="text-right p-2">Conversaciones</p>
                <div class="overflow-x-scroll overflow-hidden flex gap-3">
                    @foreach ($conversations as $conversation)
                        <div class="flex justify-between items-center">
                            {{-- <input id="conversation-{{ $conversation->id }}" type="checkbox" value="{{ $conversation->id }}" name="{{ $user->id }}"
                            class="hidden peer"> --}}
                            <a href="/dashboard/search/editConversation/{{ $conversation->id }}"
                                class=" text-center py-2 px-4  rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                            peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                <p class="w-max">{{ $conversation->title }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <p class="text-right p-2">Usuarios</p>
                <div class="overflow-x-scroll overflow-hidden flex gap-3">
                        @foreach ($users as $user)
                            <div class="flex justify-between items-center">
                                <input id="edited-{{ $user->id }}" type="checkbox" value="{{ $user->id }}"
                                    name="users[{{ $user->id }}][]" class="hidden peer">
                                <label for="edited-{{ $user->id }}"
                                    class=" text-center py-2 px-4 rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                                peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                    <p class="w-max">{{ $user->name }}</p>
                                </label>
                            </div>
                        @endforeach
                </div>
                <div class="flex gap-2">
                    <input type="text" name="title" id="search" class="p-3 w-4/6 rounded-lg"
                        placeholder="Título conversación" required>
                    <button type="submit" class="p-3 w-2/6 rounded-lg bg-green-500 text-green-900">Editar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex p-4 w-2/6 h-6/6 right-0 flex-col justify-start items-center rounded-lg">
        <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg ">
            <div
                class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll">
                
                @foreach ($conversations as $conversation)
                <div class="w-full  bg-zinc-200 rounded-md">
                    <a href="/dashboard/{{ $conversation->id }}"
                        class="w-full p-4 pt-8 justify-center rounded-sm flex flex-col gap-3">
                        <div class="flex justify-between">
                            <p class="drop-shadow-sm">{{ $conversation->title }}</p>
                            <p class="font-light">Abrir conversación</p>
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
</body>

</html>
