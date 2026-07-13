<div class="space-y-6">
    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="name">{{ __('Name') }}</label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $user->name ?? '') }}"
            required
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="email">{{ __('Email') }}</label>
        <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email', $user->email ?? '') }}"
            required
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <hr class="border-neutral-200 dark:border-neutral-800">

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="password">
            {{ __('Password') }}
            @if(isset($user))
                <span class="text-xs font-normal text-neutral-500">({{ __('Leave blank to keep current password') }})</span>
            @endif
        </label>
        <input
            id="password"
            name="password"
            type="password"
            {{ !isset($user) ? 'required' : '' }}
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('password')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="password_confirmation">{{ __('Confirm Password') }}</label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            {{ !isset($user) ? 'required' : '' }}
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
    </div>
</div>
