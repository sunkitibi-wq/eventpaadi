<x-layouts::app :title="$post->title">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ $post->title }}</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Post details and publication settings.') }}</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-4 py-2 text-sm text-neutral-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-white/5">
                    {{ __('Edit post') }}
                </a>

                <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-medium text-slate-900 transition hover:bg-slate-200 dark:bg-zinc-900 dark:text-neutral-200 dark:hover:bg-zinc-800">
                    {{ __('Back to posts') }}
                </a>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
            <div class="space-y-4 text-sm text-neutral-600 dark:text-neutral-300">
                <div><strong>{{ __('Status') }}:</strong> {{ ucfirst($post->status) }}</div>
                <div><strong>{{ __('Published') }}:</strong> {{ $post->published_at?->format('F j, Y H:i') ?? __('Never') }}</div>
                <div><strong>{{ __('Slug') }}:</strong> {{ $post->slug }}</div>
            </div>

            <div class="mt-6 space-y-4">
                <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-4 dark:border-neutral-700 dark:bg-zinc-900">
                    <h2 class="text-base font-semibold text-neutral-900 dark:text-white">{{ __('Excerpt') }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-300">{{ $post->excerpt }}</p>
                </div>

                <div class="prose prose-slate max-w-none dark:prose-invert">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
