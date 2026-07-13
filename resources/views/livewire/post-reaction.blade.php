<div class="flex items-center gap-4 py-6 border-y border-outline-variant my-8">
    <span class="text-on-surface-variant font-medium text-sm">Was this helpful?</span>
    
    <div class="flex items-center gap-2">
        <!-- Like Button -->
        <button 
            wire:click="toggleReaction(true)" 
            class="flex items-center gap-2 px-4 py-2 rounded-full border transition-all duration-200 
                {{ $userReaction === true 
                    ? 'bg-primary text-on-primary border-primary shadow-sm' 
                    : 'bg-surface border-outline-variant text-on-surface-variant hover:bg-surface-dim' }}"
            title="Like"
        >
            <span class="material-symbols-outlined text-[20px] {{ $userReaction === true ? 'fill-current' : '' }}">thumb_up</span>
            <span class="font-medium text-sm">{{ $likesCount }}</span>
        </button>

        <!-- Dislike Button -->
        <button 
            wire:click="toggleReaction(false)" 
            class="flex items-center gap-2 px-4 py-2 rounded-full border transition-all duration-200 
                {{ $userReaction === false 
                    ? 'bg-error text-on-error border-error shadow-sm' 
                    : 'bg-surface border-outline-variant text-on-surface-variant hover:bg-surface-dim' }}"
            title="Dislike"
        >
            <span class="material-symbols-outlined text-[20px] {{ $userReaction === false ? 'fill-current' : '' }}">thumb_down</span>
            <span class="font-medium text-sm">{{ $dislikesCount }}</span>
        </button>
    </div>
</div>
