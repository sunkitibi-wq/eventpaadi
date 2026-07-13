<x-layouts::eventpaadi :title="$post->title">
    <article class="py-20 bg-surface-bright px-margin-desktop">
        <div class="max-w-3xl mx-auto space-y-12">
            <!-- Navigation -->
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-primary font-label-md hover:translate-x-[-4px] transition-transform">
                <span class="material-symbols-outlined text-[18px]">west</span> Back to Blog
            </a>

            <!-- Header -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 text-caption text-on-surface-variant">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                        {{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">person</span>
                        EventPaadi Editorial
                    </span>
                </div>
                
                <h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight">
                    {{ $post->title }}
                </h1>
                
                @if($post->excerpt)
                    <p class="font-body-lg text-body-lg text-on-surface-variant border-l-4 border-primary pl-4 py-1 italic leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                @endif

                @if($post->featured_image)
                    <div class="mt-8 mb-8 rounded-2xl overflow-hidden shadow-md border border-outline-variant/50 bg-surface-container">
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[500px] object-cover">
                    </div>
                @endif

                <!-- Social Sharing -->
                @php
                    $shareUrl = urlencode(request()->url());
                    $shareTitle = urlencode($post->title);
                @endphp
                <div class="flex items-center gap-4 pt-4">
                    <span class="text-sm font-medium text-on-surface-variant">Share:</span>
                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" rel="noopener noreferrer" class="text-on-surface-variant hover:text-primary transition-colors" title="Share on X">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 22.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.008 5.976H5.078z"></path></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener noreferrer" class="text-on-surface-variant hover:text-primary transition-colors" title="Share on Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                    </a>
                    <button onclick="navigator.clipboard.writeText('{{ urldecode($shareUrl) }}'); alert('Link copied to clipboard!');" class="text-on-surface-variant hover:text-primary transition-colors" title="Copy Link (For Instagram/WhatsApp)">
                        <span class="material-symbols-outlined text-[20px]">link</span>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="font-body-md text-on-surface/90 leading-loose space-y-6 pt-4 border-t border-outline-variant">
                {!! $post->content !!}
            </div>

            <!-- Reaction Buttons -->
            <livewire:post-reaction :post="$post" />

            <!-- Comments Section -->
            <div class="mt-16 pt-8 border-t border-outline-variant space-y-12">
                <div>
                    <h3 class="text-2xl font-semibold text-on-surface mb-6">Comments ({{ $post->comments()->where('is_approved', true)->count() }})</h3>
                    
                    @if(session('success'))
                        <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-6">
                        @forelse($post->comments()->where('is_approved', true)->latest()->get() as $comment)
                            <div class="bg-surface p-6 rounded-xl border border-outline-variant/50 shadow-sm">
                                <div class="flex items-center gap-3 mb-3 text-sm">
                                    <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($comment->user?->name ?? $comment->guest_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-on-surface">{{ $comment->user?->name ?? $comment->guest_name }}</div>
                                        <div class="text-on-surface-variant text-xs">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <p class="text-on-surface/90 text-sm leading-relaxed">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-on-surface-variant text-sm italic">No comments yet. Be the first to share your thoughts!</p>
                        @endforelse
                    </div>
                </div>

                <!-- Comment Form -->
                @if(\App\Models\Setting::get('allow_comments', 'true') === 'true')
                    <div class="bg-surface-dim p-6 sm:p-8 rounded-2xl border border-outline-variant/30">
                        <h4 class="text-lg font-semibold text-on-surface mb-4">Leave a Comment</h4>
                        <form action="{{ route('comments.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            
                            @guest
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="guest_name" class="block text-sm font-medium text-on-surface-variant mb-1">Name</label>
                                        <input type="text" name="guest_name" id="guest_name" required value="{{ old('guest_name') }}" class="w-full rounded-lg border-outline-variant bg-surface px-4 py-2.5 text-sm focus:border-primary focus:ring-primary shadow-sm">
                                        @error('guest_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label for="guest_email" class="block text-sm font-medium text-on-surface-variant mb-1">Email</label>
                                        <input type="email" name="guest_email" id="guest_email" required value="{{ old('guest_email') }}" class="w-full rounded-lg border-outline-variant bg-surface px-4 py-2.5 text-sm focus:border-primary focus:ring-primary shadow-sm">
                                        @error('guest_email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @else
                                <div class="text-sm text-on-surface-variant mb-4">
                                    Commenting as <span class="font-medium text-on-surface">{{ auth()->user()->name }}</span>
                                </div>
                            @endguest

                            <div>
                                <label for="content" class="block text-sm font-medium text-on-surface-variant mb-1">Your Comment</label>
                                <textarea name="content" id="content" rows="4" required class="w-full rounded-lg border-outline-variant bg-surface px-4 py-3 text-sm focus:border-primary focus:ring-primary shadow-sm">{{ old('content') }}</textarea>
                                @error('content') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-2.5 text-sm font-medium text-on-primary transition hover:bg-primary/90 shadow-sm" style="background-color: var(--color-primary); color: var(--color-on-primary);">
                                Post Comment
                            </button>
                        </form>
                    </div>
                @else
                    <div class="bg-surface-dim p-6 rounded-2xl border border-outline-variant/30 text-center">
                        <p class="text-on-surface-variant italic">Comments are currently disabled by the administrator.</p>
                    </div>
                @endif
            </div>
        </div>
    </article>
</x-layouts::eventpaadi>
