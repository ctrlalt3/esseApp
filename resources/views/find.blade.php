@extends('template')
@section('title', 'find')
@section('content')
<div class="flex overflow-hidden justify-between">
    @include('sidebar')
</div>
<div class="flex p-4 h-screen w-4/6 right-0 flex-col justify-start items-center rounded-lg">
    @include('dashboardPost')
</div>
<div class="flex p-4  h-6/6 w-2/6 right-0 flex-col justify-start items-center rounded-lg">
    @include('dashboardConversations')
</div>
@endsection
