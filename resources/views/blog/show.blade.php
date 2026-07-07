<x-layouts::eventpaadi :title="$post->title">
    <article class="py-20 bg-surface-bright px-margin-desktop">
        <div class="max-w-3xl mx-auto space-y-12">
            <!-- Navigation -->
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-primary font-label-md hover:translate-x-[-4px] transition-transform">
                <span class="material-symbols-outlined text-[18px]">west</span> Back to Blog
            </a>

            <!-- Header -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 text-caption text-on-surface-variant">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">calendar_month</span>
                        {{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">person</span>
                        EventPaadi Editorial
                    </span>
                </div>
                
                <h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight">
                    {{ $post->title }}
                </h1>
                
                @if($post->excerpt)
                    <p class="font-body-lg text-body-lg text-on-surface-variant border-l-4 border-primary pl-4 py-1 italic leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                @endif
            </div>

            <!-- Content -->
            <div class="font-body-md text-on-surface/90 leading-loose space-y-6 pt-4 border-t border-outline-variant">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </article>
</x-layouts::eventpaadi>
