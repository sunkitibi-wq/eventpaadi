<x-layouts::app :title="__('Posts')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ __('Posts') }}</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Manage blog posts from the admin backend.') }}</p>
            </div>

            <a href="{{ route('posts.create') }}" class="inline-flex items-center justify-center rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-sky-500">
                {{ __('Create post') }}
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700 dark:border-emerald-700/40 dark:bg-emerald-950/20 dark:text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white text-sm shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800">
                <thead class="bg-neutral-50 text-left text-xs uppercase tracking-wide text-neutral-500 dark:bg-zinc-900 dark:text-neutral-400">
                    <tr>
                        <th class="px-4 py-3">{{ __('Title') }}</th>
                        <th class="px-4 py-3">{{ __('Status') }}</th>
                        <th class="px-4 py-3">{{ __('Published') }}</th>
                        <th class="px-4 py-3">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 bg-white dark:divide-neutral-800 dark:bg-zinc-950">
                    @forelse ($posts as $post)
                        <tr>
                            <td class="px-4 py-4">
                                <a href="{{ route('posts.show', $post) }}" class="font-medium text-sky-600 hover:text-sky-500 dark:text-sky-400 dark:hover:text-sky-300">{{ $post->title }}</a>
                            </td>
                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-300">{{ ucfirst($post->status) }}</td>
                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-300">{{ $post->published_at?->format('F j, Y H:i') ?? __('Never') }}</td>
                            <td class="px-4 py-4 space-x-2 text-sm">
                                <a href="{{ route('posts.edit', $post) }}" class="rounded-lg border border-neutral-200 px-3 py-1.5 text-slate-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-white/5">{{ __('Edit') }}</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-red-700 transition hover:bg-red-100 dark:border-red-700/40 dark:bg-red-950/20 dark:text-red-300 dark:hover:bg-red-900/30">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-8 text-center text-neutral-500 dark:text-neutral-400" colspan="4">
                                {{ __('No posts found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts::app>
