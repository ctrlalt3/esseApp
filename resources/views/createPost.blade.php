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
<body class="bg-zinc-100 text-stone-800">
    <div class="flex overflow-hidden">
        <div class="flex p-4 h-screen w-1/8 right-0 flex-col justify-center items-center rounded-lg">
            @include('sidebar')
        </div> 
        <div id="posts" class="flex flex-col w-4/6 items-center overflow-hidden overflow-y-scroll h-screen p-4">
            <div class="flex  pt-4 pr-4 h-full w-full bg-zinc-50 rounded-md shadow-lg p-6">
                <form action="/dashboard/createPost" method="POST" class="flex w-full flex-col gap-4 p-4 rounded-lg" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-3xl text-center">Publicar</h1>
                    <label class="text-gray-700 font-semibold">Título:</label>
                    <input type="text" name="title" class="border p-2 rounded-lg shadow-sm" placeholder="Ingrese un título" required>

                    <label class="text-gray-700 font-semibold">Subir imagen:</label>
                    <input type="file" name="file" class=" p-2 rounded-lg ">
                    
                    
                    <label class="text-gray-700 font-semibold">Contenido:</label>
                    <textarea name="content" class="border p-2 rounded-lg shadow-sm h-96" placeholder="Escribe tu contenido aquí..." required></textarea>
                    
                    <input type="submit" value="Enviar" class="bg-green-400  font-bold py-2 px-4 rounded-lg cursor-pointer transition duration-300 text-white">
                </form>
            </div>
        </div>
        <div id="posts" class="flex flex-col w-4/6 items-center overflow-hidden overflow-y-scroll h-screen p-4"> 
            <div class="flex pt-4 pr-4 h-full w-full bg-zinc-50 rounded-md shadow-lg p-6">
                @if(isset($post_user))                    
                <form action="/dashboard/updatePost/{{$post_user->id}}" method="POST" class="flex w-full flex-col gap-4 p-4 rounded-lg" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-3xl text-center">Editar publicación</h1>
                    <div class="overflow-x-scroll overflow-hidden flex gap-3 p-8">
                        @foreach (Auth::user()->posts as $post)
                        @if($post->id == $post_user->id)
                            <div class="flex justify-between items-center">
                                <a href="{{$post->id}}" 
                                    class="text-center py-2 px-4 w-max rounded-md border border-black bg-black text-white cursor-pointer transition-all hover:bg-white hover:border-gray-400 hover:text-gray-800
                                    peer-checked:bg-white peer-checked:text-gray-800 peer-checked:border-gray-400">
                                    <p class="w-">{{ $post->title }}</p>
                                </a>
                                
                            </div>
                        @else
                            <div class="flex justify-between items-center">
                                <a href="{{$post->id}}" 
                                    class="text-center py-2 px-4 w-max rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                                    peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                    <p class="w-">{{ $post->title }}</p>
                                </a>
                            </div>
                        @endif
                        @endforeach
                    </div>
                    <label class="text-gray-700 font-semibold">Editar Título:</label>
                    <input type="text" name="title" class="border p-2 rounded-lg shadow-sm" value="{{$post_user->title}}" placeholder="Ingrese un título" required>

                    <img class="w-64" src="{{$post_user->url}}" alt="">

                    <label class="text-gray-700 font-semibold">Reemplazar Imagen:</label>
                    <input type="file" name="file" class=" p-2 rounded-lg ">
                    
                    
                    <label class="text-gray-700 font-semibold">Editar Contenido:</label>
                    <input type="text" name="content" class="border p-2 rounded-lg shadow-sm" placeholder="Escribe tu contenido aquí..." required value="{{$post_user->content}}"></input>
                @else
                    <form action="#" method="POST" class="flex w-full flex-col gap-4 p-4 rounded-lg" enctype="multipart/form-data">
                        @csrf
                        <h1 class="text-3xl text-center">Editar publicación</h1>
                        <div class="overflow-x-scroll overflow-hidden flex gap-3 p-2">
                            @foreach (Auth::user()->posts as $post)
                                <div class="flex justify-between items-center">
                                    <a href="editPost/{{$post->id}}" 
                                        class="text-center py-2 px-4 w-max rounded-md border border-gray-400 bg-white text-gray-800 cursor-pointer transition-all hover:bg-black hover:border-black hover:text-white
                                        peer-checked:bg-black peer-checked:text-white peer-checked:border-black">
                                        <p class="w-">{{ $post->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <label class="text-gray-700 font-semibold">Título:</label>
                        <input type="text" name="title" class="border p-2 rounded-lg shadow-sm" placeholder="Ingrese un título" required>
    
                        <label class="text-gray-700 font-semibold">Subir imagen:</label>
                        <input type="file" name="file" class=" p-2 rounded-lg ">
                        
                        
                        <label class="text-gray-700 font-semibold">Contenido:</label>
                        <textarea name="content" class="border p-2 rounded-lg shadow-sm h-80" placeholder="Escribe tu contenido aquí..." required></textarea>
                    @endif
                    
                    <input type="submit" value="Enviar" class="bg-green-400  font-bold py-2 px-4 rounded-lg cursor-pointer transition duration-300 text-white">
                </form>
            </div>
        </div>
    </div>
</body>
</html>