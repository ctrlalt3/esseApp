@extends('template')
@section('title','search')
@section('content')
    <div class="flex overflow-hidden justify-between">
        <div id="sidebar" class="flex p-4 w-1/9 h-screen right-0 flex-col justify-center items-center rounded-lg">
            @include('sidebar')
        </div>
    </div>
    <div class="flex pt-4 h-screen w-3/6 right-0 flex-col items-center rounded-lg">
        @include('groups')
    </div>
    <div class="flex p-4 w-5/12 h-6/6 right-0 flex-col justify-start items-center rounded-lg">
        @include('conversations')
    </div>
</body>

</html>
