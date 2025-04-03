@extends('template')
@section('title', 'dashboard')
@section('content')
<div class="flex overflow-hidden justify-between">
    <div id="sidebar" class="flex p-4 h-screen w-1/8 right-0 flex-col justify-center items-center rounded-lg">
        @include('sidebar')
    </div>
    <div id="posts" class="flex flex-col w-4/6 items-center overflow-hidden overflow-y-scroll h-screen pb-4">
        @include('dashboardPost')
    </div>
    <div id="messages" class="flex pt-4 pr-4 h-screen w-4/6  flex-col justify-between items-center rounded-lg">
        @include('dashboardConversations')
    </div>  
</div>
<script>
    window.onload = function() {
        const chatContainer = document.getElementById('chat-container');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    };
</script>
@endsection
