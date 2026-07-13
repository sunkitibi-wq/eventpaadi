<x-layouts::app :title="__('Dashboard')">
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ __('Overview') }}</h1>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('A quick summary of your content and engagement.') }}</p>
        </div>

        <!-- Metric Cards -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Published Posts -->
            <div class="flex items-center gap-4 rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-sky-100 text-sky-600 dark:bg-sky-900/50 dark:text-sky-400">
                    <flux:icon.newspaper class="size-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">{{ __('Published Posts') }}</p>
                    <p class="text-2xl font-bold text-neutral-900 dark:text-white">{{ number_format($metrics['total_published']) }}</p>
                </div>
            </div>

            <!-- Drafts -->
            <div class="flex items-center gap-4 rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-100 text-amber-600 dark:bg-amber-900/50 dark:text-amber-400">
                    <flux:icon.pencil-square class="size-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">{{ __('Drafts') }}</p>
                    <p class="text-2xl font-bold text-neutral-900 dark:text-white">{{ number_format($metrics['total_drafts']) }}</p>
                </div>
            </div>

            <!-- Comments -->
            <div class="flex items-center gap-4 rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/50 dark:text-emerald-400">
                    <flux:icon.chat-bubble-left-right class="size-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">{{ __('Total Comments') }}</p>
                    <p class="text-2xl font-bold text-neutral-900 dark:text-white">{{ number_format($metrics['total_comments']) }}</p>
                </div>
            </div>

            <!-- Likes -->
            <div class="flex items-center gap-4 rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-rose-100 text-rose-600 dark:bg-rose-900/50 dark:text-rose-400">
                    <flux:icon.heart class="size-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">{{ __('Total Likes') }}</p>
                    <p class="text-2xl font-bold text-neutral-900 dark:text-white">{{ number_format($metrics['total_likes']) }}</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity Grid -->
        <div class="grid gap-6 lg:grid-cols-2">
            <!-- Recent Posts -->
            <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="border-b border-neutral-200 bg-neutral-50 px-6 py-4 dark:border-neutral-800 dark:bg-zinc-900">
                    <div class="flex items-center justify-between">
                        <h2 class="font-semibold text-neutral-900 dark:text-white">{{ __('Recent Posts') }}</h2>
                        <a href="{{ route('posts.index') }}" class="text-sm font-medium text-sky-600 hover:text-sky-500 dark:text-sky-400 dark:hover:text-sky-300">{{ __('View all') }}</a>
                    </div>
                </div>
                <div class="divide-y divide-neutral-200 dark:divide-neutral-800">
                    @forelse($recentPosts as $post)
                        <div class="flex items-center justify-between px-6 py-4">
                            <div>
                                <a href="{{ route('posts.show', $post) }}" class="font-medium text-neutral-900 hover:underline dark:text-white">{{ $post->title }}</a>
                                <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $post->status === 'published' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-sm text-neutral-500 dark:text-neutral-400">
                            {{ __('No posts created yet.') }}
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Comments -->
            <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
                <div class="border-b border-neutral-200 bg-neutral-50 px-6 py-4 dark:border-neutral-800 dark:bg-zinc-900">
                    <h2 class="font-semibold text-neutral-900 dark:text-white">{{ __('Recent Comments') }}</h2>
                </div>
                <div class="divide-y divide-neutral-200 dark:divide-neutral-800">
                    @forelse($recentComments as $comment)
                        <div class="px-6 py-4">
                            <div class="mb-1 flex items-center justify-between text-xs">
                                <span class="font-medium text-neutral-900 dark:text-white">{{ $comment->user?->name ?? $comment->guest_name }}</span>
                                <span class="text-neutral-500 dark:text-neutral-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mb-2 text-sm text-neutral-600 line-clamp-2 dark:text-neutral-300">"{{ $comment->content }}"</p>
                            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                                {{ __('On:') }} <a href="{{ route('blog.show', $comment->post) }}#comments" class="text-sky-600 hover:underline dark:text-sky-400">{{ Str::limit($comment->post->title, 40) }}</a>
                            </p>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-sm text-neutral-500 dark:text-neutral-400">
                            {{ __('No comments received yet.') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
