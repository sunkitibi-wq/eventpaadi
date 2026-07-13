<x-layouts::app :title="__('Users')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ __('Users') }}</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Manage registered users and authors.') }}</p>
            </div>

            <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center rounded-xl bg-sky-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-sky-500">
                {{ __('Create user') }}
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700 dark:border-emerald-700/40 dark:bg-emerald-950/20 dark:text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-700/40 dark:bg-red-950/20 dark:text-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white text-sm shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800">
                <thead class="bg-neutral-50 text-left text-xs uppercase tracking-wide text-neutral-500 dark:bg-zinc-900 dark:text-neutral-400">
                    <tr>
                        <th class="px-4 py-3">{{ __('Name') }}</th>
                        <th class="px-4 py-3">{{ __('Email') }}</th>
                        <th class="px-4 py-3">{{ __('Joined') }}</th>
                        <th class="px-4 py-3">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 bg-white dark:divide-neutral-800 dark:bg-zinc-950">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="font-medium text-neutral-900 dark:text-white">{{ $user->name }}</div>
                            </td>
                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-300">{{ $user->email }}</td>
                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-300">{{ $user->created_at->format('M j, Y') }}</td>
                            <td class="px-4 py-4 space-x-2 text-sm">
                                <a href="{{ route('users.edit', $user) }}" class="rounded-lg border border-neutral-200 px-3 py-1.5 text-slate-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-white/5">{{ __('Edit') }}</a>
                                
                                @if (auth()->id() !== $user->id)
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-red-700 transition hover:bg-red-100 dark:border-red-700/40 dark:bg-red-950/20 dark:text-red-300 dark:hover:bg-red-900/30">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                @else
                                    <span class="inline-block px-3 py-1.5 text-neutral-400 italic">{{ __('(You)') }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-8 text-center text-neutral-500 dark:text-neutral-400" colspan="4">
                                {{ __('No users found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $users->links() }}
        </div>
    </div>
</x-layouts::app>
