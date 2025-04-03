<div class="flex h-screen w-full gap-2 right-0 justify-evently flex-col items-center rounded-lg">
    <form action="/dashboard/search/createConversation" method="get"
        class="w-full flex flex-col gap-4 p-8 rounded-md pt-9 bg-zinc-50 shadow-md">
        @csrf
        <h1 class="text-3xl text-right">Crear grupo</h1>
        <p class="text-left">Añadir</p>
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
        class="w-full flex flex-col gap-4 p-8 rounded-md  bg-zinc-50 shadow-md">
        @csrf
        <h1 class="text-3xl text-right">Editar grupo</h1>
        <p class="text-left p-2">Grupos</p>
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
        <p class="text-left p-2">Añadir</p>
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