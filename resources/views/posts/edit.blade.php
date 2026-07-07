<x-layouts::app :title="__('Edit Post')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ __('Edit post') }}</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Update the post content and metadata.') }}</p>
            </div>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
            <form method="POST" action="{{ route('posts.update', $post) }}">
                @csrf
                @method('PUT')

                @include('posts.partials.form')

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center rounded-xl border border-neutral-200 px-4 py-2 text-sm text-neutral-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-white/5">
                        {{ __('Cancel') }}
                    </a>

                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-sky-500">
                        {{ __('Update post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
