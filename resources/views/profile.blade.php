@extends('template')
@section('title', 'profile')
@section('content')
    <div class="flex overflow-hidden justify-between">
        <div id="sidebar" class="flex p-4 w-1/9 h-screen right-0 flex-col justify-center items-center rounded-lg">
            @include('sidebar')
        </div>
    </div>
    <div id="posts" class="flex p-4 h-screen w-3/6 flex-col justify-start items-center rounded-lg">
        <div class="flex h-screen w-full gap-5 flex-col justify-center items-center rounded-lg">
            <div class="flex w-full h-1/6 bg-zinc-50 rounded-md p-1 top-0 justify-around">
                <div class=" p-2">
                    <div class="bg-zinc-200 shadow-md w-20 h-20 rounded-full text-center font-bold"></div>
                </div>
                <div class="flex gap-12 p-2">
                    <a class="flex flex-col justify-center cursor-pointer">
                        <p class="text-center">{{ count(auth()->user()->posts) }}</p>
                        <p> Publicaciones</p>
                    </a>
                    <a class="flex flex-col justify-center cursor-pointer">
                        <p class="text-center">{{ count(auth()->user()->following) }}</p>
                        <p> Siguiendo</p>
                    </a>
                    <a class="flex flex-col justify-center cursor-pointer">
                        <p class="text-center">{{ count(auth()->user()->followers) }}</p>
                        <p> Seguidores</p>
                    </a>
                </div>
            </div>
            <div class="h-full overflow-y-scroll flex flex-col gap-4 rounded-lg">
                @foreach (auth()->user()->posts as $post)
                    <div class="flex flex-col w-full gap-3">
                        <div class="p-5 bg-zinc-50 shadow-lg sm:rounded-lg">
                            <div class="flex gap-3 p-3 align-center">
                                <div class="bg-zinc-200 shadow-md w-8  h-8 rounded-3xl text-center font-bold"></div>
                                <p class="drop-shadow-sm text-center h-8">{{ auth()->user()->name }}</b> ·</p>
                                <a href="/profile/deletePost/{{ $post->id }}">Eliminar</a>
                            </div>
                            <p class="p-3">{{ $post->content }}</p>
                            <img class="m-2 pr-4" src="{{ $post->url }}" alt="">
                            <div class="flex">
                                @if ($post->likes->contains('user_id', auth()->id()))
                                    <a href="/dashboard/disLikePost/{{ $post->id }}"
                                        class="flex items-center justify-center p-2 gap-1">
                                        <svg aria-label="Me gusta" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor"
                                            height="22" role="img" viewBox="0 0 24 24" width="24">
                                            <title>Me gusta</title>
                                            <path
                                                d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="/dashboard/likePost/{{ $post->id }}"
                                        class="flex items-center justify-center p-2 gap-1">
                                        <svg aria-label="Ya no me gusta" class="x1lliihq x1n2onr6 xxk16z8" fill="red"
                                            height="24" role="img" viewBox="0 0 48 48" width="24">
                                            <title>Ya no me gusta</title>
                                            <path
                                                d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                            </path>
                                        </svg>
                                    </a>
                                @endif
                                <p class="p-3"> {{ $post->title }}</p>
                            </div>
                            <form class="w-full flex gap-2 pt-4 p-2" action="/dashboard/commentPost/{{ $post->id }}">
                                <input type="text" placeholder="Comentar..." name="comment" id=""
                                    class="w-7/12 rounded-sm p-x-2 p-1 ">
                                <input type="submit" value="Comentar"
                                    class="w-2/12 rounded-md cursor-pointer bg-green-400 text-green-700 p-1 px-4 ">
                            </form>
                            <details class="transition-all duration-300 ease-in-out">
                                <summary class="p-5 cursor-pointer hover:text-whit">
                                    {{ count($post->comments) }} comentarios
                                </summary>
                                @foreach ($post->comments as $comment)
                                    <div class="p-5 pb-4 flex flex-col gap-4 m-3 shadow-md bg-zinc-300  rounded-lg">
                                        @foreach ($users as $user)
                                            @if ($user->id == $comment->user_id)
                                                <a href="#" class="flex gap-4  align-center">
                                                    <div
                                                        class="bg-zinc-400 shadow-md w-8  h-8 rounded-3xl text-center font-bold">
                                                    </div>
                                                    <p class="drop-shadow-sm text-center h-8">{{ $user->name }}</b> ·
                                                        Hace {{ $post->date }} días</p>
                                                </a>
                                                <p class="pb-4 pl-10">{{ $comment->comment }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </details>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="flex pt-4 pr-4 h-screen w-3/6 right-0 flex-col justify-start items-center rounded-lg">
        <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg pb-8 ">
            <div class=" w-full h-full overflow-y-scroll flex flex-col gap-5 rounded-md">
                @if($users)
                    @foreach ($users as $user)
                    @if(auth()->user()->following->contains($user->id))
                        <div class="flex gap-4 p-9 align-center justify-between bg-zinc-50">
                            <div class="bg-zinc-200 shadow-md w-10  h-10 rounded-3xl text-center font-bold"></div>   
                            <p class="p-2"  class="drop-shadow-sm text-center h-8">{{ $user->name }}</p>
                                <a class="p-2" href="/dashboard/unfollowUser/{{$user->id}}">Dejar de seguir</a>
                        </div>
                        @endif
                    @endforeach
                @else
                <div  class="flex gap-4 p-3 align-center justify-between bg-zinc-50">
                <p>No tienes amigos</p>
            </div>
                @endif
            </div>
        </div>
    </div>
@endsection
