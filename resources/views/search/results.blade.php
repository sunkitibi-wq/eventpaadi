<x-layouts::eventpaadi>
    <x-slot:title>Search Results for "{{ $query }}"</x-slot:title>

    <div class="bg-surface-container-lowest py-20 min-h-[60vh]">
        <div class="w-full max-w-container-max mx-auto px-margin-desktop">
            <h1 class="font-headline-lg text-headline-lg text-primary mb-2">Search Results</h1>
            <p class="font-body-lg text-on-surface-variant mb-12">Showing results for "<strong>{{ $query }}</strong>"</p>

            @if($posts->isEmpty() && $pages->isEmpty())
                <div class="py-12 text-center bg-surface-container rounded-2xl border border-outline-variant">
                    <span class="material-symbols-outlined text-6xl text-on-surface-variant mb-4">search_off</span>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">No results found</h3>
                    <p class="text-on-surface-variant">We couldn't find anything matching your query. Please try different keywords.</p>
                </div>
            @else
                <div class="space-y-16">
                    @if($pages->isNotEmpty())
                        <div>
                            <h2 class="font-headline-md text-headline-md text-on-surface mb-6 border-b border-outline-variant pb-2">Pages</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($pages as $page)
                                    <article class="flex flex-col bg-surface-bright rounded-2xl shadow-sm border border-outline-variant overflow-hidden hover:shadow-md transition-shadow">
                                        <div class="p-6 flex flex-col flex-grow">
                                            <div class="flex items-center gap-2 mb-3 text-primary text-sm font-medium">
                                                <span class="material-symbols-outlined text-sm">find_in_page</span> Page
                                            </div>
                                            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-3 line-clamp-2">
                                                <a href="{{ url($page->slug === 'home' ? '/' : '/' . $page->slug) }}" class="hover:text-primary transition-colors">{{ $page->title }}</a>
                                            </h2>
                                            @php
                                                $pageText = '';
                                                $contentArray = $page->content;
                                                if (is_array($contentArray)) {
                                                    array_walk_recursive($contentArray, function($item) use (&$pageText) {
                                                        if (is_string($item)) $pageText .= ' ' . $item;
                                                    });
                                                } else {
                                                    $pageText = (string) $contentArray;
                                                }
                                            @endphp
                                            <p class="text-on-surface-variant font-body-md mb-4 line-clamp-3 flex-grow">{{ $page->excerpt ?? Str::limit(strip_tags($pageText), 100) }}</p>
                                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-outline-variant">
                                                <a href="{{ url($page->slug === 'home' ? '/' : '/' . $page->slug) }}" class="text-secondary font-label-md hover:underline flex items-center gap-1">View Page <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                            <div class="mt-8">
                                {{ $pages->appends(['q' => $query])->links() }}
                            </div>
                        </div>
                    @endif

                    @if($posts->isNotEmpty())
                        <div>
                            <h2 class="font-headline-md text-headline-md text-on-surface mb-6 border-b border-outline-variant pb-2">Blog Posts</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($posts as $post)
                                    <article class="flex flex-col bg-surface-bright rounded-2xl shadow-sm border border-outline-variant overflow-hidden hover:shadow-md transition-shadow">
                                        @if($post->featured_image)
                                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                        @else
                                            <div class="w-full h-48 bg-surface-container flex items-center justify-center text-on-surface-variant">
                                                <span class="material-symbols-outlined text-4xl">article</span>
                                            </div>
                                        @endif
                                        <div class="p-6 flex flex-col flex-grow">
                                            <div class="flex items-center gap-2 mb-3 text-secondary text-sm font-medium">
                                                <span class="material-symbols-outlined text-sm">article</span> Post
                                            </div>
                                            <h2 class="font-headline-sm text-headline-sm text-on-surface mb-3 line-clamp-2">
                                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary transition-colors">{{ $post->title }}</a>
                                            </h2>
                                            <p class="text-on-surface-variant font-body-md mb-4 line-clamp-3 flex-grow">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-outline-variant">
                                                <span class="text-sm text-on-surface-variant">{{ $post->created_at->format('M j, Y') }}</span>
                                                <a href="{{ route('blog.show', $post->slug) }}" class="text-secondary font-label-md hover:underline flex items-center gap-1">Read More <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                            <div class="mt-8">
                                {{ $posts->appends(['q' => $query])->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layouts::eventpaadi>
