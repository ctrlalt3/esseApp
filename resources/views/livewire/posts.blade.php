<div class="flex flex-col w-4/6 items-center overflow-hidden overflow-y-scroll h-screen">
    @foreach ($posts as $post)
        <div class="pt-4 pr-4 w-full">
            <div class="p-5 bg-zinc-200 shadow-lg sm:rounded-lg">
                @foreach ($users as $user)
                    @if ($user->id == $post->user_id)
                        <div class="flex gap-4 p-3 align-center">
                            <div class="bg-zinc-400 shadow-md w-8 h-8 rounded-3xl text-center font-bold"></div>
                            <a href="/dashboard/userProfile/{{ $user->id }}" class="drop-shadow-sm h-8">
                                {{ $user->name }} · Hace {{ $post->date }} día
                            </a>
                        </div>
                    @endif
                @endforeach
                <p class="p-3">{{ $post->title }}</p>
                <p class="p-3">{{ $post->content }}</p>
                <!-- Componente de Like -->
                @livewire('like-button', ['post' => $post])
                <!-- Componente de Like -->
                @livewire('comments', ['post' => $post])
            </div>
        </div>
    @endforeach
</div>
