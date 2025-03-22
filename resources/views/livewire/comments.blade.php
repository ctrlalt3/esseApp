<details class="transition-all duration-300 ease-in-out">
    <summary class="p-5 cursor-pointer hover:text-whit">
        {{ count($post->comments) }} comentarios
    </summary>
    @foreach ($comments as $comment)
        <div class="p-5 pb-4 flex flex-col gap-4 m-3 shadow-md bg-zinc-300 rounded-lg">
            @foreach ($users as $user)
                @if ($user->id == $comment->user_id)
                    <a href="#" class="flex gap-4 align-center">
                        <div class="bg-zinc-400 shadow-md w-8 h-8 rounded-3xl text-center font-bold"></div>
                        <p class="drop-shadow-sm text-center h-8">{{ $user->name }} · Hace {{ $post->date }} días</p>
                    </a>
                    <p class="pb-4 pl-10">{{ $comment->comment }}</p>
                @endif
            @endforeach
        </div>
    @endforeach
</details>
