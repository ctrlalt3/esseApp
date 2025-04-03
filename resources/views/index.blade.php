@extends('template')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-3 grid-rows-3 gap-4 h-screen p-6 bg-gray-100">
        <!-- Sidebar -->
    
        <!-- Image Carousel -->
        <div class="col-span-2 row-span-2 flex flex-col justify-center items-center rounded-lg shadow-lg overflow-hidden relative">
            <div class="w-full h-full relative">
                <div class="carousel w-full h-full flex transition-transform duration-500 ease-in-out">
                    @foreach($posts as $post)
                        <div class="w-full flex-shrink-0">
                            <img src="{{ $post->url }}" class="w-full h-full object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Info Cards -->
        <div class="col-span-1 row-span-1 bg-zinc-50 p-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
            <h2 class="text-xl font-semibold text-gray-700">Publicaciones</h2>
            <p class="text-gray-600">{{ count($posts) }}</p>
        </div>
        <div class="col-span-1 row-span-1 bg-zinc-50 p-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
            <h2 class="text-xl font-semibold text-gray-700">Usuarios</h2>
            <p class="text-gray-600">{{count($users)}}</p>
        </div>
        <div class="col-span-1 row-span-1 bg-zinc-50 p-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
            @if(auth()->user())
                <h2 class="text-xl font-semibold text-gray-700">Bienvenido de nuevo</h2>
                <p class="text-gray-600">
                    {{ auth()->user()->name }}
                </p>
            @else
                <h2 class="text-xl font-semibold text-gray-700">Bienvenido</h2>
                <p class="text-gray-600">Nos alegra verte</p>
            @endif
        </div>
        <div class="col-span-2 row-span-1 bg-zinc-50 p-6 rounded-lg shadow-lg flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">Bienvenido al Dashboard</h1>
                <p class="text-center text-gray-600">Gestiona tu perfil y tus publicaciones aquí.</p>
                <a href="/login" class="mt-4 px-6 py-2 bg-green-400 text-green-700 rounded-md cursor-pointer shadow-md hover:bg-green-500 hover:text-white transition-all">Inicia sesión</a>
        </div>
        {{-- <div id="main" class="flex w-full flex-col justify-center items-center p-4">
            <div class="flex flex-col items-center w-full gap-5 p-6 bg-zinc-50 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold">Bienvenido al Dashboard</h1>
                <p class="text-center text-gray-600">Gestiona tu perfil y tus publicaciones aquí.</p>
                
                <a href="/login" class="mt-4 px-6 py-2 bg-green-400 text-green-700 rounded-md cursor-pointer shadow-md hover:bg-green-500 hover:text-white transition-all">Inicia sesión</a>
            </div>
        </div> --}}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let index = 0;
            const slides = document.querySelectorAll(".carousel div");
            function showNextSlide() {
                slides.forEach((slide, i) => {
                    slide.style.transform = `translateX(-${index * 100}%)`;
                });
                index = (index + 1) % slides.length;
            }
            setInterval(showNextSlide, 1000);
        });
    </script>
@endsection
