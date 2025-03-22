<div class="flex p-4 h-screen w-1/8 flex-col items-center rounded-lg">
    <div class="flex p-4 h-screen w-full flex-col shadow-lg items-center rounded-lg bg-zinc-200">
        <div class="flex w-100 h-full flex-col justify-between gap-4">
            <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer text-center w-100 rounded-lg bg-zinc-300">
                <a href="/dashboard">"Logo"</a>
            </div>
            <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer text-center w-100 rounded-lg bg-zinc-200">
                <a href="/dashboard/find">"Buscar"</a>
            </div>
            <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer text-center w-100 rounded-lg bg-zinc-200">
                <a href="/dashboard/search">"Añadir"</a>
            </div>
            <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer text-center w-100 rounded-lg bg-zinc-200">
                <a href="#">Perfil</a>
            </div>
            <div class="p-4 py-6 hover:bg-zinc-300 cursor-pointer text-center w-100 rounded-lg bg-zinc-200">
                <a href="/dashboard/userProfile">{{ auth()->user()->name }}</a>
            </div>
        </div>
    </div>
</div>
