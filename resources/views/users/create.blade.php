<x-layouts::app :title="__('Create User')">
    <div class="mx-auto max-w-2xl space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-neutral-900 dark:text-white">{{ __('Create User') }}</h1>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Add a new user to the platform.') }}</p>
            </div>
            <a href="{{ route('users.index') }}" class="text-sm font-medium text-sky-600 hover:text-sky-500 dark:text-sky-400">{{ __('Back to users') }}</a>
        </div>

        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-zinc-950">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                @include('users.partials.form')

                <div class="mt-8 flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-sky-600 px-6 py-2.5 text-sm font-medium text-white transition hover:bg-sky-500">
                        {{ __('Create User') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
