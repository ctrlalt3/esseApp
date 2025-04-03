<div class="flex h-screen w-full gap-5 right-0 flex-col justify-center items-center rounded-lg ">
    <div
        class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll">
        
        @foreach ($conversations as $conversation)
        <div class="w-full  bg-zinc-50 rounded-md">
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