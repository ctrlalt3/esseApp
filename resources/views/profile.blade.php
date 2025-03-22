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
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard">"Logo"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard/find">""Buscar""</a>
                    </div>
                    <div class="p-4 py-6 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200 hover:bg-zinc-300">
                        <a href="/dashboard/search/">"Añadir"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">Perfil</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">"Buscar"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-300">
                        <a href="/dashboard/userProfile">{{ auth()->user()->name }}</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="flex p-4 h-screen w-3/6 flex-col justify-start items-center rounded-lg">
        <div class="flex h-screen w-full gap-5 flex-col justify-center items-center rounded-lg">
            <div class="flex w-full h-1/6 bg-zinc-200 rounded-md p-1 top-0 justify-around">
                <div class=" p-2">
                    <div class="bg-zinc-400 shadow-md w-20 h-20 rounded-full text-center font-bold"></div>
                </div>
                <div class="flex gap-12 p-2">
                        <a class="flex flex-col justify-center cursor-pointer">
                            <p class="text-center">{{count(auth()->user()->posts)}}</p>
                            <p> Publicaciones</p> 
                        </a>
                        <a class="flex flex-col justify-center cursor-pointer">
                            <p class="text-center">{{count(auth()->user()->following)}}</p>
                            <p> Siguiendo</p>
                        </a>
                        <a class="flex flex-col justify-center cursor-pointer">
                            <p class="text-center">{{count(auth()->user()->followers)}}</p>
                            <p> Seguidores</p>
                        </a>
                    </div>
            </div>
            <div class="h-max overflow-y-scroll flex flex-col gap-4">
                @foreach (auth()->user()->posts as $post)
                    <div class="flex flex-col w-full gap-3">
                        <div class="p-5 bg-zinc-200 shadow-lg sm:rounded-lg ">
                                    <a href="#" class="flex gap-4 p-3 align-center">
                                        <div class="bg-zinc-400 shadow-md w-8  h-8 rounded-3xl text-center font-bold"></div>   
                                        <p class="drop-shadow-sm text-center h-8">{{ auth()->user()->name }}</b> · Hace {{ $post->date }} días</p>
                                    </a>
                            <p class="p-3"> {{ $post->title }}</p>
                            <p class="p-3">{{ $post->content }}</p>
                            <details class="transition-all duration-300 ease-in-out">
                                <summary class="p-5 cursor-pointer hover:text-whit">
                                    {{ count($post->comments) }} comentarios
                                </summary>
                                @foreach ($post->comments as $comment)
                                <div class="p-5 pb-4 flex flex-col gap-4 m-3 shadow-md bg-zinc-300  rounded-lg">
                                        @foreach ($users as $user)
                                            @if ($user->id == $comment->user_id)
                                                <a href="#" class="flex gap-4  align-center">
                                                    <div class="bg-zinc-400 shadow-md w-8  h-8 rounded-3xl text-center font-bold"></div>   
                                                    <p class="drop-shadow-sm text-center h-8">{{ $user->name }}</b> · Hace {{ $post->date }} días</p>
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
        <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg bg-zinc-200">
            <form action="#" class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll">
                
            </form> 
        </div>
    </div>
</body>
</html>