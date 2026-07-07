<x-layouts::eventpaadi title="Blog">
    <!-- Header Section -->
    <section class="relative py-20 overflow-hidden bg-surface-container-lowest">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #00685b 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop text-center relative z-10 space-y-6">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container font-label-md">MEDIA &amp; INSIGHTS</span>
            <h1 class="font-headline-xl text-headline-xl text-on-surface">The EventPaadi Blog</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Latest trends, professional checklists, vendor strategy, and success stories from the event capital of West Africa.</p>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-20 bg-surface-bright px-margin-desktop max-w-container-max mx-auto">
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($posts as $post)
                    <article class="group bg-surface-container-lowest p-6 rounded-xl border border-outline-variant hover:border-primary hover:shadow-[0px_4px_20px_rgba(46,42,110,0.08)] hover:translate-y-[-4px] transition-all duration-500 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 text-caption text-on-surface-variant mb-4">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                                    {{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}
                                </span>
                                <span class="bg-secondary-container/40 text-on-secondary-container px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    Published
                                </span>
                            </div>
                            <h2 class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">
                                <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                            </h2>
                            <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                        <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center gap-1.5 text-primary font-label-md group-hover:gap-2.5 transition-all">
                            Read Article <span class="material-symbols-outlined text-sm">east</span>
                        </a>
                    </article>
                @endforeach
            </div>
            
            <div class="flex justify-center mt-12">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-surface-container-low rounded-2xl border border-dashed border-outline-variant">
                <span class="material-symbols-outlined text-5xl text-outline mb-4">rss_feed</span>
                <h3 class="font-headline-md text-on-surface mb-2">No articles published yet</h3>
                <p class="text-on-surface-variant max-w-sm mx-auto">Check back soon for high-tier event industry insights and strategic guides.</p>
            </div>
        @endif
    </section>
</x-layouts::eventpaadi>
