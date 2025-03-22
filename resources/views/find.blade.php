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
                    <div class="p-4 py-6 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-300">
                        <a href="/dashboard/search/">"Añadir"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">""Buscar""</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">Perfil</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">"Buscar"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">{{ auth()->user()->name }}</a>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    <div class="flex p-4 h-screen w-4/6 right-0 flex-col justify-start items-center rounded-lg">
        <div class="flex bg-zinc-200 h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg">
            <form action="/dashboard/search" method="POST" class="w-4/6 flex flex-col gap-4">
                @csrf
                <input type="text" name="search" id="search" class="p-4 w-4/6 rounded-lg" placeholder="Título conversación">
                <input type="text" name="search" id="search" class="p-4 w-4/6 rounded-lg" placeholder="Título conversación">
                <button type="submit" class="p-4 w-1/6 rounded-lg bg-zinc-300">Añadir</button>
            </form>
        </div>
    </div>
    <div class="flex p-4  h-6/6 w-2/6 right-0 flex-col justify-start items-center rounded-lg">
        <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg ">
            <form action="#" class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll">
                @foreach ($conversations as $conversation)
                    <a href="/dashboard/{{$conversation->id}}" class="w-full p-8 justify-center rounded-sm bg-zinc-200 flex flex-col gap-3">
                        <div class="flex justify-between">
                            <p class="drop-shadow-sm">{{$conversation->title}}</p>
                            <p class="font-light">Abrir conversación</p>    
                        </div>
                    </a>
                @endforeach
            </form> 
        </div>
    </div>
</body>
</html>