<div class="grid gap-6">
    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="title">{{ __('Title') }}</label>
        <input
            id="title"
            name="title"
            type="text"
            value="{{ old('title', $post->title ?? '') }}"
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('title')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="slug">{{ __('Slug') }}</label>
        <input
            id="slug"
            name="slug"
            type="text"
            value="{{ old('slug', $post->slug ?? '') }}"
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('slug')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="featured_image">{{ __('Featured Image') }}</label>
        
        @if(isset($post) && $post->featured_image)
            <div class="mb-4">
                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="h-32 w-auto rounded-lg object-cover border border-neutral-200 dark:border-neutral-700">
            </div>
        @endif

        <input
            id="featured_image"
            name="featured_image"
            type="file"
            accept="image/*"
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        />
        @error('featured_image')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="excerpt">{{ __('Excerpt') }}</label>
        <textarea
            id="excerpt"
            name="excerpt"
            rows="3"
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        >{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="content">{{ __('Content') }}</label>
        <textarea
            id="content"
            name="content"
            rows="8"
            class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
        >{{ old('content', $post->content ?? '') }}</textarea>
        @error('content')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="status">{{ __('Status') }}</label>
            <select
                id="status"
                name="status"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
            >
                <option value="draft" {{ old('status', $post->status ?? 'draft') === 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                <option value="published" {{ old('status', $post->status ?? '') === 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
            </select>
            @error('status')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-200" for="published_at">{{ __('Published at') }}</label>
            <input
                id="published_at"
                name="published_at"
                type="datetime-local"
                value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i') ?? '') }}"
                class="w-full rounded-xl border border-neutral-200 bg-white px-4 py-3 text-sm text-neutral-900 outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 dark:border-neutral-700 dark:bg-zinc-950 dark:text-neutral-100 dark:focus:border-sky-500"
            />
            @error('published_at')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
