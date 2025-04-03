<div class="flex items-center space-x-2">
    <button wire:click="toggleLike" class="text-red-500">
        @if ($isLiked)
            ❤️
        @else
            🤍
        @endif
    </button>
    <span>{{ $likesCount }} likes</span>
</div>
