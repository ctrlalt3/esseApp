<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { scrollbar-width: none; }
        *::-webkit-scrollbar { display: none; }
    </style>
    @livewireStyles
</head>
<body class="bg-zinc-300 text-stone-800">
    <div class="flex overflow-hidden justify-between">
        <!-- Sidebar -->
        @livewire('sidebar')
        <!-- Lista de Publicaciones -->
        @livewire('posts')
        <!-- Chat -->
        @livewire('chat')
    </div>
    <script>
        window.onload = function() {
            const chatContainer = document.getElementById('chat-container');
            if (chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight;
        };
    </script>
    @livewireScripts
</body>
</html>



{{-- <!DOCTYPE html>
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
    @livewireStyles
</head>
<body class=" bg-zinc-300 text-stone-800">
    <div class="flex overflow-hidden justify-between">
        <div class="flex p-4 h-screen w-1/8 right-0 flex-col justify-center items-center rounded-lg">
            <div class="flex p-4 h-screen w-full right-0 flex-col shadow-lg items-center rounded-lg bg-zinc-200">
                <div class="flex w-100 h-full flex-col justify-between gap-4">
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-300">
                        <a href="/dashboard">"Logo"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard/find">""Buscar""</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard/search">"Añadir"</a>
                    </div>
                    
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">Perfil</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="#">"Buscar"</a>
                    </div>
                    <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer transition-all duration-400 ease-in-out text-center w-100 rounded-lg bg-zinc-200">
                        <a href="/dashboard/userProfile">{{ auth()->user()->name }}</a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="flex flex-col w-4/6 items-center overflow-hidden overflow-y-scroll h-screen">
            @foreach ($posts as $post)
            <div class="pt-4 pr-4 w-full">
                <div class="p-5  bg-zinc-200 shadow-lg sm:rounded-lg ">
                    @foreach ($users as $user)
                        @if ($user->id == $post->user_id)
                            <div href="#" class="flex gap-4 p-3 align-center">
                                <div class="bg-zinc-400 shadow-md w-8  h-8 rounded-3xl text-center font-bold"></div>   
                                <a href="/dashboard/userProfile/{{$user->id}}"  class="drop-shadow-sm text-center h-8">{{ $user->name }}</b> · Hace {{ $post->date }} días</a>
                            </div>
                        @endif
                    @endforeach
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
        <div class="flex pt-4 pr-4 h-screen w-4/6  flex-col justify-start items-center rounded-lg">
            <div class="flex h-screen w-full gap-5  flex-col justify-center items-center rounded-lg ">
                @if (!isset($messages))
                <div class="flex flex-col rounded-lg shadow-sm justify-around w-full h-screen bg-zinc-200">
                    <div class="p-3 text-center flex flex-col-reverse gap-6 overflow-hidden align-bottom justify-items-end"> 
                            <div class="bg-zinc-200 text-right p-3 rounded-l-md">
                                <p>Conversacion Vacia</p>
                            </div>
                        @else
                        <form action="/dashboard/sendMessage/{{$messages[0]->conversation_id}}" method="get" class="flex flex-col rounded-lg shadow-sm justify-around  w-full h-96 bg-zinc-200">
                            <div class="h-1/6 items-left p-5">
                        <a href="#" class="flex gap-3  px-5">
                            <div class="bg-green-400 shadow-md w-10 rounded-3xl font-bold text-center text-green-500">+</div>
                                @foreach ($conversations as $conversation)
                                    @if($conversation->id == $messages[0]->conversation_id)
                                            <p class="drop-shadow-sm">{{$conversation->title}}</p>
                                    @endif
                                @endforeach
                        </a>
                    </div>      
                    <div id="chat-container" class="h-5/6 p-4 text-center flex flex-col gap-6 overflow-y-scroll scroll-smooth scroll-pb-8">
                            @foreach ($messages as $message)
                                @if(auth()->user()->id != $message->user_id)
                                    @foreach ($users as $user)
                                        @if ($user->id == $message->user_id)
                                            <div class="mr-10 bg-zinc-300 shadow-md text-left p-4 rounded-r-md">
                                                <a href="#" class="flex gap-4 pb-2 align-center">
                                                    <div class="bg-zinc-400 shadow-md w-8 h-8 rounded-3xl text-center font-bold"></div>   
                                                    <p class="drop-shadow-sm text-center h-8">{{ $user->name }}</b></p>
                                                </a>
                                                <p>{{$message->content}}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                <div class="bg-zinc-300 shadow-md text-right ml-10 p-l-5 p-5 rounded-l-md">
                                        <p>{{$message->content}}</p>
                                    </div> 
                                @endif
                            @endforeach
                           
                        @endif
                    </div>
                    <div class="w-full flex justify-center">
                        <div class="w-full bg-zinc-200 py-3 rounded-r-md flex justify-evenly">
                            <input type="text" name="message" id="" class="w-8/12 rounded-sm p-x-2 p-1 ">
                            <input type="submit" value="Enviar" class="w-3/12 rounded-md cursor-pointer bg-green-400 text-green-700 p-1 px-4 ">
                        </div>
                    </div>
                </form>
                <form action="#" class="flex flex-col gap-5 rounded-lg  justify-around items-center w-full overflow-hidden overflow-y-scroll">
                    @foreach ($conversations as $conversation)
                        <a href="/dashboard/{{$conversation->id}}" class="w-full p-8 justify-center rounded-sm bg-zinc-200 flex flex-col gap-3">
                            <div class="flex justify-between">
                                <div class="bg-green-400 shadow-md w-10 rounded-3xl font-bold text-center text-green-500">+</div>
                                <p class="drop-shadow-sm">{{$conversation->title}}</p>
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
        </div>  
    <script>
        // Asegurarse de que el contenedor está scrolleado hasta el fondo al cargar la página
        window.onload = function() {
            const chatContainer = document.getElementById('chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        };
    </script>
    @livewireScripts
</body>

</html> --}}
