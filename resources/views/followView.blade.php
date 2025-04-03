@extends('template')
@section('title','followView')
@section('content')
<div class="flex overflow-hidden justify-between">
    <div id="sidebar" class="flex p-4 w-1/9 h-screen right-0 flex-col justify-center items-center rounded-lg">
        @include('sidebar')
    </div>
</div>
<div id="posts" class="flex p-4 h-screen w-5/6 flex-col justify-start items-center rounded-lg">
    <div class="flex h-screen w-2/3 gap-5 flex-col justify-center items-center rounded-lg">
        <div class="flex w-full h-1/6 bg-zinc-50 rounded-md p-1 top-0 justify-around">
            <div class=" p-2">
                <div class="bg-zinc-200 shadow-md w-20 h-20 rounded-full text-center font-bold"></div>
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
        <div class=" w-full h-full overflow-y-scroll flex bg-zinc-50">
            <div class="w-full h-full overflow-y-scroll flex flex-col gap-4 rounded-lg">
                @if($users)
                        @foreach ($users as $user)
                        @if(!auth()->user()->following->contains($user->id))
                            <div class="flex gap-4 p-9 align-center justify-between bg-zinc-50">
                                <div class="bg-zinc-200 shadow-md w-10  h-10 rounded-3xl text-center font-bold"></div>   
                                <p class="p-2"  class="drop-shadow-sm text-center h-8">{{ $user->name }}</p>
                                    <a class="p-2" href="/dashboard/followUser/{{$user->id}}">Seguir</a>
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
</div>
{{-- <div class="flex pt-4 pr-4 h-screen w-3/6 right-0 flex-col justify-start items-center rounded-lg">
    <div class="flex h-screen w-full gap-5  right-0 flex-col justify-center items-center rounded-lg pb-8 bg-zinc-50">
       
    </div>
</div> --}}
@endsection