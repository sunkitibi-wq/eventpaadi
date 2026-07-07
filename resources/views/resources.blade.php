<x-layouts::eventpaadi title="Resources">
    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden bg-surface-container-lowest">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #00685b 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        <div class="px-margin-desktop max-w-container-max mx-auto w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container font-label-md">
                    {{ data_get($page->content, 'hero_badge', 'RESOURCE HUB') }}
                </span>
                <h1 class="font-headline-xl text-headline-xl text-on-surface">
                    {{ data_get($page->content, 'hero_title', 'Insights & Innovation at Your Fingertips.') }}
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">
                    {{ data_get($page->content, 'hero_description', 'Empowering Nigerian event professionals with high-tier digital tools.') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ data_get($page->content, 'hero_primary_btn_link', '#tools') }}" class="bg-primary text-on-primary font-label-md px-8 py-3.5 rounded-lg hover:translate-y-[-2px] transition-all duration-500 shadow-md">
                        {{ data_get($page->content, 'hero_primary_btn_text', 'Explore Tools') }}
                    </a>
                    <a href="{{ data_get($page->content, 'hero_secondary_btn_link', route('blog.index')) }}" class="border border-secondary text-secondary font-label-md px-8 py-3.5 rounded-lg hover:bg-secondary/5 transition-all duration-500">
                        {{ data_get($page->content, 'hero_secondary_btn_text', 'Read the Blog') }}
                    </a>
                </div>
            </div>
            <div class="relative hidden md:block">
                @php
                    $heroImage = data_get($page->content, 'hero_image') ? Storage::url(data_get($page->content, 'hero_image')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuD_Cte2dQN83-08oc6UG5XPHiUo7mCA_ANYfG1LtCfPrm62IS4T-k9XBdJfHvBCOgtCRrrLDtzzaX1tujjSHQmPwVCQDk9QCVRg2xt7izdDihhE965_0sZvNN4okxxurOqWzl62pZ0BslCvYywRznd5RmxcVdMcAuQFsNIwGpOQFFD-C_KVb0vY6z2ME3RsEhr9wWgH98RYcPof_FiTs2iRtg4x2hpx8AW9dWnDSPaV9tFO91uhoTppfKbC6auPErRRGo1F_QInOhs';
                @endphp
                <div class="aspect-video rounded-lg overflow-hidden shadow-2xl glass-card p-4">
                    <div class="w-full h-full bg-cover bg-center rounded-md" data-alt="A professional Nigerian event planner." style="background-image: url('{{ $heroImage }}')"></div>
                </div>
                <!-- Floating Chips for dynamic feel -->
                <div class="absolute -bottom-6 -left-6 glass-card p-4 rounded-lg shadow-xl animate-bounce duration-[3000ms]">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary bg-primary-container p-2 rounded-full">analytics</span>
                        <div>
                            <p class="font-label-md text-on-surface">
                                {{ data_get($page->content, 'hero_floater_title', 'ROI Tracker') }}
                            </p>
                            <p class="text-caption text-on-surface-variant">
                                {{ data_get($page->content, 'hero_floater_desc', 'Live Analytics') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog/Media Feed -->
    <section class="py-24 px-margin-desktop max-w-container-max mx-auto">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-2">
                    {{ data_get($page->content, 'trends_title', 'Latest Trends') }}
                </h2>
                <p class="text-on-surface-variant">
                    {{ data_get($page->content, 'trends_description', 'Stay ahead in the Nigerian event industry.') }}
                </p>
            </div>
            <a href="{{ route('blog.index') }}" class="flex items-center gap-2 text-primary font-label-md hover:underline">
                View all posts <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-desktop">
            <!-- Blog Card 1 -->
            <a href="{{ route('blog.index') }}" class="group cursor-pointer block">
                <div class="relative overflow-hidden rounded-lg aspect-[4/3] mb-4">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="A vibrant luxury wedding reception." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBLUbowsiw3m90xeVnLvSwed-F37SvLYsrKUsTRqbbZyhla_V6krHK1CLebbFxofO2VqKwT5JEDTSU5Ruj1Y1X8QnDfmzGSVWMgAD6Yh_INi7nLj_cxg57iirtS6THF1hTH5QNig_XbcssxAGnRKqjn8CeHTTBPDdBInIe85ZnraKA_8aSzB5uOGZR5AF6KZaS2GUYVTThbZ0yEU3Y1vf6vBzZlXcdRqHOmisuXEFgRiOXVwtdvikWQlqjgtJ4JNkN_1zJXj2EhpsY')"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-surface-bright/90 backdrop-blur text-primary text-caption font-bold px-3 py-1 rounded-full">INDUSTRY REPORT</span>
                    </div>
                </div>
                <h3 class="font-headline-md text-headline-md mb-2 group-hover:text-primary transition-colors">The Evolution of Luxury Weddings in Nigeria</h3>
                <p class="text-on-surface-variant line-clamp-2">How technology and tradition are merging to create unforgettable experiences in Lagos and beyond.</p>
            </a>
            <!-- Blog Card 2 -->
            <a href="{{ route('blog.index') }}" class="group cursor-pointer block">
                <div class="relative overflow-hidden rounded-lg aspect-[4/3] mb-4">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="A high-tech digital workspace." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuChxyFTBaVHA5PvY6nVkS3I2YlFhfoN0_TJBY8tS382nER9iZiTpauiRbtte8i3sKhiG8kVPyUmHcvq_EoWP3s-05wABvwYfLpSVqEb5LVm5yTrzhFjpqbcZz9H21Ns_a9XcZEClPDu-xG-xLHiRgZrrw7UK4kZ_FaBUD6Uvy3s-fRijwhW9hAnvzTlv-ptJi5qRllDVXANUrijGiwZUKkJA57kjQuWeePXLGicUwPo1UxqcyzQgefMU-4D8Eo_UW3YfVLTYXVC7pc')"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-surface-bright/90 backdrop-blur text-secondary text-caption font-bold px-3 py-1 rounded-full">TECH TRENDS</span>
                    </div>
                </div>
                <h3 class="font-headline-md text-headline-md mb-2 group-hover:text-primary transition-colors">Top 5 Digital Tools for Hybrid Events</h3>
                <p class="text-on-surface-variant line-clamp-2">Bridging the gap between physical and virtual attendance for professional conferences.</p>
            </a>
            <!-- Blog Card 3 -->
            <a href="{{ route('blog.index') }}" class="group cursor-pointer block">
                <div class="relative overflow-hidden rounded-lg aspect-[4/3] mb-4">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="Professional vendors collaborating." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuByyyJjqbelLfetyP7CSqj7Af_PbkugvkfSkwXauy9gxtkRhmSzdbcE7ylMSBq8SEkdGM1amdSXXt2fT3iWnunRzqmWcevGnfjLFY_5PlHdpIcux6-AOfXyV0CTHzLa9qRhaqowgiZznaHBls_nxh2ZzjLLaYD942UnpiVWx6vZEs5pdG10Mf43uYwJLV4FjgUwEd1d1BBYwm5ZHi85LGGOFguo0zdn1-qRA78nFYFRRpIuErKCDoAjX6GDDclnqbDHgZ-6AVgw_ZE')"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-surface-bright/90 backdrop-blur text-tertiary text-caption font-bold px-3 py-1 rounded-full">BUSINESS TIPS</span>
                    </div>
                </div>
                <h3 class="font-headline-md text-headline-md mb-2 group-hover:text-primary transition-colors">Negotiating with High-End Vendors</h3>
                <p class="text-on-surface-variant line-clamp-2">Master the art of professional partnerships to deliver value without compromising quality.</p>
            </a>
        </div>
    </section>

    <!-- Tools Gallery (Bento Grid Style) -->
    <section id="tools" class="bg-surface-container py-24">
        <div class="px-margin-desktop max-w-container-max mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">
                    {{ data_get($page->content, 'tools_title', 'Powerful Event Tools') }}
                </h2>
                <p class="text-on-surface-variant max-w-2xl mx-auto mt-4">
                    {{ data_get($page->content, 'tools_description', 'Precision-engineered software components designed for the modern event architect.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-gutter-desktop h-auto md:h-[600px]">
                @php
                    $defaultTools = [
                        [
                            'title' => 'Budget Calculator',
                            'description' => 'Automate your financial planning with our intelligent NGN-focused budget generator.',
                            'icon' => 'payments',
                            'link_url' => '#',
                            'col_span' => '2',
                        ],
                        [
                            'title' => 'Seating Chart Generator',
                            'description' => 'Drag-and-drop floor planning for any venue size, from ballrooms to garden parties.',
                            'icon' => 'grid_view',
                            'link_url' => '#',
                            'col_span' => '2',
                        ],
                        [
                            'title' => 'Event Checklists',
                            'description' => 'Step-by-step master guides.',
                            'icon' => 'checklist',
                            'link_url' => '#',
                            'col_span' => '1',
                        ],
                        [
                            'title' => 'Vendor Directory',
                            'description' => 'Verified Nigerian partners.',
                            'icon' => 'storefront',
                            'link_url' => '#',
                            'col_span' => '1',
                        ],
                    ];
                    $tools = data_get($page->content, 'tools', $defaultTools);
                @endphp
                @foreach($tools as $tool)
                    @php
                        $colSpan = $tool['col_span'] ?? '1';
                        $colClass = $colSpan == '2' ? 'md:col-span-2' : 'md:col-span-1';
                    @endphp
                    @if($colSpan == '2')
                        @if($tool['icon'] == 'payments')
                            <div class="md:col-span-2 md:row-span-2 bg-primary p-10 rounded-lg flex flex-col justify-between text-on-primary hover-lift cursor-pointer shadow-lg overflow-hidden relative group" onclick="alert('Launch budget calculator features soon!');">
                                <div class="absolute top-0 right-0 p-8 opacity-20 group-hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1">calculate</span>
                                </div>
                                <div class="relative z-10">
                                    <div class="bg-primary-container/20 w-16 h-16 rounded-lg flex items-center justify-center mb-8">
                                        <span class="material-symbols-outlined text-4xl">{{ $tool['icon'] }}</span>
                                    </div>
                                    <h3 class="font-headline-lg text-headline-lg mb-4">{{ $tool['title'] }}</h3>
                                    <p class="font-body-lg text-primary-fixed opacity-90 max-w-sm mb-8">{{ $tool['description'] }}</p>
                                </div>
                                <button class="bg-surface-bright text-primary font-label-md px-6 py-3 rounded-lg w-fit group-hover:bg-primary-container transition-colors">Launch Calculator</button>
                            </div>
                        @else
                            <div class="md:col-span-2 bg-surface-bright p-8 rounded-lg border border-outline-variant hover-lift cursor-pointer shadow-sm group" onclick="alert('Seating generator coming soon!');">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="bg-secondary-container/30 text-secondary p-3 rounded-lg">
                                        <span class="material-symbols-outlined text-3xl">{{ $tool['icon'] }}</span>
                                    </div>
                                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">open_in_new</span>
                                </div>
                                <h3 class="font-headline-md text-headline-md mb-2">{{ $tool['title'] }}</h3>
                                <p class="text-on-surface-variant mb-6">{{ $tool['description'] }}</p>
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full border-2 border-surface-bright bg-primary-container flex items-center justify-center text-[10px] font-bold">EP</div>
                                    <div class="w-8 h-8 rounded-full border-2 border-surface-bright bg-secondary-container flex items-center justify-center text-[10px] font-bold">AI</div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-surface-bright p-8 rounded-lg border border-outline-variant hover-lift cursor-pointer shadow-sm group" onclick="alert('Coming soon!');">
                            <span class="material-symbols-outlined text-primary text-3xl mb-4 group-hover:rotate-12 transition-transform">{{ $tool['icon'] }}</span>
                            <h3 class="font-label-md text-on-surface mb-1">{{ $tool['title'] }}</h3>
                            <p class="text-caption text-on-surface-variant">{{ $tool['description'] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Resource Downloads -->
    <section class="py-24 px-margin-desktop max-w-container-max mx-auto">
        <div class="flex flex-col md:flex-row gap-16">
            <div class="md:w-1/3">
                <h2 class="font-headline-lg text-headline-lg mb-4">
                    {{ data_get($page->content, 'downloads_title', 'Whitepapers & Templates') }}
                </h2>
                <p class="text-on-surface-variant mb-8">
                    {{ data_get($page->content, 'downloads_description', 'Downloadable assets to professionalize your workflow instantly.') }}
                </p>
                <div class="bg-primary/5 p-6 rounded-lg border-l-4 border-primary">
                    <p class="italic text-primary font-body-md">"Our mission is to democratize high-end event education across West Africa."</p>
                    <p class="mt-2 font-label-md">- EventPaadi Academy</p>
                </div>
            </div>
            <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-6">
                @php
                    $defaultDownloads = [
                        [
                            'title' => 'Vendor Contract Template',
                            'description' => 'Professional legal framework for Nigerian service providers.',
                            'file_size' => '2.4MB',
                            'type' => 'pdf',
                            'file_url' => '#',
                        ],
                        [
                            'title' => '2024 Event Industry Report',
                            'description' => 'Deep dive into market trends and consumer behavior in Lagos.',
                            'file_size' => '8.1MB',
                            'type' => 'pdf',
                            'file_url' => '#',
                        ],
                        [
                            'title' => 'Guest List Master Sheet',
                            'description' => 'Organized Excel template with RSVP tracking.',
                            'file_size' => '1.2MB',
                            'type' => 'xlsx',
                            'file_url' => '#',
                        ],
                        [
                            'title' => 'Sponsorship Pitch Deck',
                            'description' => 'High-conversion presentation slides for event funding.',
                            'file_size' => '12MB',
                            'type' => 'pptx',
                            'file_url' => '#',
                        ],
                    ];
                    $downloads = data_get($page->content, 'downloads', $defaultDownloads);
                @endphp
                @foreach($downloads as $download)
                    @php
                        $iconName = 'picture_as_pdf';
                        $colorClass = 'bg-error-container/20 text-error';
                        if($download['type'] == 'xlsx') {
                            $iconName = 'table_chart';
                            $colorClass = 'bg-primary-container/20 text-primary';
                        } elseif($download['type'] == 'pptx') {
                            $iconName = 'present_to_all';
                            $colorClass = 'bg-tertiary-fixed-dim/20 text-tertiary';
                        }
                    @endphp
                    <div class="flex gap-4 p-6 bg-surface-bright rounded-lg border border-outline-variant hover:border-primary transition-colors group">
                        <div class="flex-shrink-0 {{ $colorClass }} p-3 rounded-lg h-fit">
                            <span class="material-symbols-outlined text-2xl">{{ $iconName }}</span>
                        </div>
                        <div>
                            <h4 class="font-label-md text-on-surface group-hover:text-primary transition-colors">{{ $download['title'] }}</h4>
                            <p class="text-caption text-on-surface-variant mb-3">{{ $download['description'] }}</p>
                            <a class="text-primary text-caption font-bold flex items-center gap-1" href="{{ $download['file_url'] ?? '#' }}" onclick="event.preventDefault(); alert('Downloading...');">
                                Download {{ strtoupper($download['type']) }} ({{ $download['file_size'] }})
                                <span class="material-symbols-outlined text-sm">download</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="bg-inverse-surface py-20">
        <div class="px-margin-desktop max-w-container-max mx-auto text-center">
            <div class="bg-primary/10 inline-block p-4 rounded-full mb-6">
                <span class="material-symbols-outlined text-primary-fixed text-4xl" style="font-variation-settings: 'FILL' 1">mail</span>
            </div>
            <h2 class="font-headline-lg text-headline-lg text-inverse-on-surface mb-4">
                {{ data_get($page->content, 'newsletter_title', 'The Event Dispatch') }}
            </h2>
            <p class="text-outline-variant max-w-xl mx-auto mb-10">
                {{ data_get($page->content, 'newsletter_description', 'Weekly intelligence for event pioneers. No spam, just pure Nigerian excellence delivered to your inbox.') }}
            </p>
            <form action="#" method="POST" class="max-w-md mx-auto flex flex-col sm:flex-row gap-4" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
                <input required class="flex-1 bg-surface-container-highest border-none rounded-lg px-6 py-4 text-on-surface focus:ring-2 focus:ring-primary placeholder:text-outline" placeholder="Enter your work email" type="email"/>
                <button type="submit" class="bg-primary text-on-primary font-label-md px-8 py-4 rounded-lg hover:bg-primary-container transition-all shadow-lg whitespace-nowrap">Subscribe Now</button>
            </form>
            <p class="mt-6 text-caption text-outline-variant">Join 5,000+ industry leaders. Unsubscribe anytime.</p>
        </div>
    </section>
</x-layouts::eventpaadi>
