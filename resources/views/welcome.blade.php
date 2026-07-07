<x-layouts::eventpaadi title="Home">
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center overflow-hidden py-20 px-margin-mobile md:px-margin-desktop">
        <div class="relative z-10 max-w-container-max mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-sm mb-6 uppercase tracking-wider animate-fade-in">
                    {{ data_get($page->content, 'hero_badge', "Nigeria's Event Powerhouse") }}
                </span>
                <h1 class="font-headline-xl text-headline-xl mb-6 text-on-surface leading-tight">
                    {!! data_get($page->content, 'hero_title', "Empowering the Pulse of <span class='text-primary underline decoration-tertiary decoration-4'>Nigerian Events</span>.") !!}
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-2xl leading-relaxed">
                    {{ data_get($page->content, 'hero_description', "EventPaadi is Nigeria's leading event support and knowledge platform.") }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ data_get($page->content, 'hero_primary_btn_link', route('support')) }}" class="px-8 py-4 bg-primary text-on-primary rounded-lg font-label-md text-lg flex items-center justify-center gap-2 hover:translate-y-[-4px] shadow-xl transition-all duration-500">
                        {{ data_get($page->content, 'hero_primary_btn_text', 'Explore Services') }}
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                    <a href="{{ data_get($page->content, 'hero_secondary_btn_link', route('academy')) }}" class="px-8 py-4 bg-surface-container-lowest border border-outline text-on-surface rounded-lg font-label-md text-lg flex items-center justify-center gap-2 hover:bg-surface-container transition-all duration-300">
                        {{ data_get($page->content, 'hero_secondary_btn_text', 'Join the Academy') }}
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative Elements -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 hidden xl:block w-1/2 h-full">
            <div class="relative w-full h-full p-20">
                <div class="absolute top-1/4 right-20 w-80 h-96 rounded-xl overflow-hidden shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-700">
                    <img class="w-full h-full object-cover" data-alt="A vibrant, professional Nigerian wedding reception." src="{{ data_get($page->content, 'hero_image_1') ? Storage::url(data_get($page->content, 'hero_image_1')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuChjSrP8UFR5y6raoy2Q3JO7FuUAG5ptMAPe6BY0cCp8Hwxpd76BzMNelSR7OH2Y3ytCEZ-Wp1sKO6PcJOiNR8dk6MoGpXFh1o2Jy3IO1XIJEFnR1x1VqBqD3-CaD-GYuh2DfrWcwKpApURKOnC5L9mDNQqnibeGsOmU0DTXXVq0uwQ_dqqc_NpkPmRMRHW6syRf5cVNypgdFX4oseR63S0e8DQCHt1doBi2bIqM5bPBuwqJWgih_n7n-s89OMWyDAmRg9N97fxIwo' }}"/>
                </div>
                <div class="absolute bottom-1/4 right-64 w-64 h-80 rounded-xl overflow-hidden shadow-2xl -rotate-6 hover:rotate-0 transition-transform duration-700 z-10 border-4 border-white">
                    <img class="w-full h-full object-cover" data-alt="A professional corporate conference setup in Abuja." src="{{ data_get($page->content, 'hero_image_2') ? Storage::url(data_get($page->content, 'hero_image_2')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDxAnry6bMiscSGPdWWE9BiD4O3mKRF__kR4pSmY_9LpPUCnBUvyAXAJK2sNtykVqWhqsifl9IdIDOZI21OpDUZMcEvoZ1AQgXqKAbb6H7umWUlXbuJZ7uvtcA0mzTpc_5XK3uOwv7NPl32gww_XhyWCwujUZ25hwwuBl9Zfux6pqLYR0xERy_SG27thxzOdqOrbwyWIRSDdiq_7GQtNxiT3pzBmgLg0x5fsRu93BFL_S4czZD9QUgLCo_lOi0au5Bhah9MPv4TJFg' }}"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Three Pillars Section -->
    <section class="py-24 bg-surface-container-low px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">
                    {{ data_get($page->content, 'pillars_title', 'The Pillars of Our Excellence') }}
                </h2>
                <div class="w-24 h-1.5 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-desktop">
                @php
                    $defaultPillars = [
                        [
                            'title' => 'Event Support',
                            'description' => 'Comprehensive service solutions for professional logistics, on-site management, and vendor coordination tailored for the Nigerian market.',
                            'icon' => 'handyman',
                            'link_text' => 'Learn More',
                            'link_url' => route('support'),
                        ],
                        [
                            'title' => 'Media & Insights',
                            'description' => 'Stay ahead with the latest industry trends, data-driven insights, and celebratory success stories from across West Africa.',
                            'icon' => 'newspaper',
                            'link_text' => 'Explore Insights',
                            'link_url' => route('blog.index'),
                        ],
                        [
                            'title' => 'Academy',
                            'description' => 'Empowering the next generation of event managers through professional certification and hands-on masterclasses.',
                            'icon' => 'school',
                            'link_text' => 'Join Academy',
                            'link_url' => route('academy'),
                        ]
                    ];
                    $pillars = data_get($page->content, 'pillars', $defaultPillars);
                @endphp
                @foreach($pillars as $pillar)
                    <div class="group bg-surface-container-lowest p-10 rounded-xl shadow-[0px_4px_20px_rgba(46,42,110,0.08)] hover:translate-y-[-8px] transition-all duration-500 border-b-4 border-transparent hover:border-primary">
                        <div class="w-16 h-16 bg-primary-container text-on-primary-container rounded-lg flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $pillar['icon'] ?? 'star' }}</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md mb-4 text-on-surface">{{ $pillar['title'] }}</h3>
                        <p class="font-body-md text-on-surface-variant mb-6">{{ $pillar['description'] }}</p>
                        <a class="inline-flex items-center gap-2 text-primary font-label-md group-hover:underline" href="{{ $pillar['link_url'] }}">{{ $pillar['link_text'] }} <span class="material-symbols-outlined text-sm">north_east</span></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 bg-secondary text-on-secondary px-margin-mobile md:px-margin-desktop overflow-hidden">
        <div class="max-w-container-max mx-auto grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
            @php
                $defaultStats = [
                    ['number' => '500+', 'label' => 'Events Supported'],
                    ['number' => '1,200', 'label' => 'Certified Pros'],
                    ['number' => '15+', 'label' => 'Smart Tools'],
                    ['number' => '98%', 'label' => 'Client Satisfaction'],
                ];
                $stats = data_get($page->content, 'stats', $defaultStats);
            @endphp
            @foreach($stats as $stat)
                <div class="flex flex-col items-center">
                    <span class="font-headline-xl text-headline-xl mb-2">{{ $stat['number'] }}</span>
                    <span class="font-label-md opacity-80 uppercase tracking-widest">{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Tools Section -->
    <section class="py-24 bg-surface-bright px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">
                        {{ data_get($page->content, 'tools_title', 'Precision Tools for Modern Planners') }}
                    </h2>
                    <p class="font-body-lg text-on-surface-variant">
                        {{ data_get($page->content, 'tools_description', 'Sophisticated technology designed to eliminate the chaos of event coordination.') }}
                    </p>
                </div>
                <a href="{{ route('resources') }}" class="px-6 py-3 rounded-lg border-2 border-primary text-primary font-label-md hover:bg-primary-container hover:text-on-primary-container transition-all duration-300">View All Tools</a>
            </div>
            <!-- Bento Grid for Tools -->
            <div class="bento-grid">
                @php
                    $defaultTools = [
                        [
                            'title' => 'Omni-Planner Dashboard',
                            'description' => 'Manage budgets, vendors, and guest lists in one synchronized workspace.',
                            'image' => null,
                            'link_url' => route('resources'),
                            'icon' => 'dashboard',
                            'col_span' => '8',
                        ],
                        [
                            'title' => 'Smart Check-In',
                            'description' => 'Secure, lightning-fast QR check-in systems for events of any scale.',
                            'image' => null,
                            'link_url' => route('resources'),
                            'icon' => 'qr_code_2',
                            'col_span' => '4',
                        ],
                        [
                            'title' => 'Impact Analytics',
                            'description' => 'Deep insights into attendee engagement and ROI for corporate hosts.',
                            'image' => null,
                            'link_url' => route('resources'),
                            'icon' => 'analytics',
                            'col_span' => '4',
                        ],
                        [
                            'title' => 'Vendor Marketplace',
                            'description' => 'Connect with Nigeria\'s most reliable, pre-vetted service providers in seconds.',
                            'image' => null,
                            'link_url' => route('resources'),
                            'icon' => 'storefront',
                            'col_span' => '8',
                        ],
                    ];
                    $tools = data_get($page->content, 'tools', $defaultTools);
                    $fallbacks = [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuBXvzm2wOa8kmDEoU6vBLKAxnAwkSZyzUd5AVLusDIQvIEla8pYkIzzIY45NdsE-lq5wZ-zXdNrp-Tjyk3rXepqCqKDyYYhhaWLux-um5YZFzfyiPQlpStFec3rGhDca8Uc34QgIObuV641aC6u_dA24zDd1aNFZ2hvqr9mlhPoFek3XOx6c5UQOlEW6r0_O12ylRa-FkiTSZ5DvPxenwOZXgHzbW5k3fEYpYTNcWIzmUtPKk3P9RI5JK0xLQrEATHv1HGZK138u6o',
                        '',
                        '',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuCDNAYtb1RZzkN3O5ebZB4IL5kcQTo0S8FXK_KBiCRKQuqciv0RU_86KHdFlUhNda3ngqu0C_G-YxtWVNiY7SUEh6lrDQP1BVmbjTNrGBfEKoe2MVh9oRLb7Npyb_lWrj0-aW8nz5984AuRsCBvXi_JZlj2Ehd8aE7JYqrwDx_PkryFq743XguRJCgnHY-iTzmlw6T9UewZF3Q3ybfZAWHKIAih8k_6MsP8GIbOkw259xmNIz3We2USh1ud-Dplffrn5GPjWnEtYjc'
                    ];
                @endphp
                @foreach($tools as $index => $tool)
                    @php
                        $colClass = ($tool['col_span'] ?? '4') == '8' ? 'md:col-span-8' : 'md:col-span-4';
                        $imageUrl = !empty($tool['image']) ? Storage::url($tool['image']) : ($fallbacks[$index] ?? '');
                    @endphp
                    @if(($tool['col_span'] ?? '4') == '8')
                        <div class="{{ $colClass }} bg-surface-container-low rounded-xl p-8 relative overflow-hidden h-[400px] flex flex-col justify-end group">
                            @if($imageUrl)
                                <img class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" data-alt="{{ $tool['title'] }}" src="{{ $imageUrl }}"/>
                            @endif
                            <div class="relative z-10 glass-card p-6 rounded-lg border border-white/40 max-w-md">
                                <h4 class="font-headline-md text-on-surface mb-2">{{ $tool['title'] }}</h4>
                                <p class="font-body-md text-on-surface-variant mb-4">{{ $tool['description'] }}</p>
                                <a href="{{ $tool['link_url'] ?? '#' }}" class="text-primary font-label-md flex items-center gap-1">Explore Feature <span class="material-symbols-outlined text-sm">chevron_right</span></a>
                            </div>
                        </div>
                    @else
                        <div class="{{ $colClass }} bg-tertiary-container text-on-tertiary-container rounded-xl p-8 flex flex-col justify-between hover:translate-x-2 transition-transform duration-500">
                            <div>
                                <span class="material-symbols-outlined text-5xl mb-6">{{ $tool['icon'] ?? 'qr_code_2' }}</span>
                                <h4 class="font-headline-md mb-2">{{ $tool['title'] }}</h4>
                                <p class="font-body-md opacity-90">{{ $tool['description'] }}</p>
                            </div>
                            <a href="{{ $tool['link_url'] ?? '#' }}" class="mt-8 px-4 py-2 bg-on-tertiary-container text-tertiary-container rounded-lg font-label-md self-start">Get Started</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-surface-bright px-margin-mobile md:px-margin-desktop overflow-hidden">
        <div class="max-w-container-max mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">
                    {{ data_get($page->content, 'testimonials_title', 'Trusted by the Industry') }}
                </h2>
                <p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto">
                    {{ data_get($page->content, 'testimonials_description', 'Hear from the professionals who are shaping the future of Nigerian events.') }}
                </p>
            </div>
            <div class="flex flex-col md:flex-row gap-8 overflow-x-auto pb-8 snap-x">
                @php
                    $defaultTestimonials = [
                        [
                            'author_name' => 'Titi Adebayo',
                            'author_title' => 'Lead Planner, Zenith Events',
                            'quote' => '"EventPaadi transformed our corporate gala planning. The tools for budget tracking and vendor management are miles ahead of anything else in Nigeria. Truly world-class."',
                            'author_image' => null,
                            'rating' => '5',
                        ],
                        [
                            'author_name' => 'Chidi Okafor',
                            'author_title' => 'CEO, Urban Pulse Events',
                            'quote' => '"The Academy provided me with the certification and confidence to launch my own agency. The network of mentors here is incredible—they truly want to see you succeed."',
                            'author_image' => null,
                            'rating' => '5',
                        ]
                    ];
                    $testimonials = data_get($page->content, 'testimonials', $defaultTestimonials);
                    $testimonialImages = [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuC2Wun4yNBiFFD_sQF67lNgoQnMUg5ajf5Wg-danssQoU7g6cNivCZkZ3W894TamlmgnIt1Ab7uYFtJjHZi9g6u3y_pLQd_qjRA6pi8ON_FUdHdhltTLi0--lN6peRE2ZnUTWGS47pSGNYXU786ctbUnf8CXXzSXB7yxcxnWRt7zkpKG1phT_uFvKgUa7BeoZ2gS_AGEIs9jUTzcKlbosWTjhrjRygWYLRHLlSaOtE69tug_mh-_3NRffIuGuBI8GfalCeLXksAsFo',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAre1z6dTFXmysQ65L1RVJlX7kOyBCtHogo0erfkwBtzUZBTid84hxtdSPhOknoR413ZoQ04tFKdo1NqTMR3OfQY_gnBO2Lo3WFN4O2_8LnWtFuMpmraxd1P6KXzMxwqRj-xhpv_3HPRciOfkabDFD7J7deOv7zhq4KBiMB0Znau2n_tMl4xjaLenmLjut_w2bXFugXDS1dWHOFirXCUj6CuQct5zhSDXj49LSx_XAQBG5jSX7AgXTG-xOzH-RXUk1cuGGbRvc0gHs'
                    ];
                @endphp
                @foreach($testimonials as $idx => $testimonial)
                    @php
                        $photoUrl = !empty($testimonial['author_image']) ? Storage::url($testimonial['author_image']) : ($testimonialImages[$idx] ?? '');
                        $ratingCount = (int) ($testimonial['rating'] ?? 5);
                    @endphp
                    <div class="min-w-[320px] md:min-w-[400px] flex-1 bg-surface-container-lowest p-8 rounded-xl shadow-[0px_4px_20px_rgba(46,42,110,0.08)] snap-center">
                        <div class="flex text-tertiary-container mb-6">
                            @for($i = 0; $i < $ratingCount; $i++)
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            @endfor
                        </div>
                        <p class="font-body-md text-on-surface italic mb-8 leading-relaxed text-lg">{{ $testimonial['quote'] }}</p>
                        <div class="flex items-center gap-4">
                            @if($photoUrl)
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant">
                                    <img class="w-full h-full object-cover" data-alt="{{ $testimonial['author_name'] }}" src="{{ $photoUrl }}"/>
                                </div>
                            @endif
                            <div>
                                <h5 class="font-label-md text-on-surface">{{ $testimonial['author_name'] }}</h5>
                                <p class="text-caption text-on-surface-variant">{{ $testimonial['author_title'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-margin-mobile md:px-margin-desktop">
        <div class="max-w-container-max mx-auto bg-primary rounded-[32px] p-12 md:p-20 text-center relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="font-headline-xl text-headline-xl text-on-primary mb-6">
                    {{ data_get($page->content, 'cta_title', 'Ready to elevate your event game?') }}
                </h2>
                <p class="font-body-lg text-on-primary opacity-90 max-w-2xl mx-auto mb-10">
                    {{ data_get($page->content, 'cta_description', 'Join thousands of Nigerian professionals who are building the future of celebration.') }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-10 py-4 bg-tertiary-fixed text-on-tertiary-fixed rounded-full font-label-md text-lg hover:scale-105 transition-all duration-300 shadow-xl">Dashboard</a>
                    @else
                        <a href="{{ data_get($page->content, 'cta_primary_btn_link', route('register')) }}" class="px-10 py-4 bg-tertiary-fixed text-on-tertiary-fixed rounded-full font-label-md text-lg hover:scale-105 transition-all duration-300 shadow-xl">
                            {{ data_get($page->content, 'cta_primary_btn_text', 'Get Started Free') }}
                        </a>
                    @endauth
                    <a href="{{ data_get($page->content, 'cta_secondary_btn_link', 'mailto:hello@eventpaadi.ng') }}" class="px-10 py-4 bg-transparent border-2 border-on-primary text-on-primary rounded-full font-label-md text-lg hover:bg-on-primary hover:text-primary transition-all duration-300">
                        {{ data_get($page->content, 'cta_secondary_btn_text', 'Talk to an Expert') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts::eventpaadi>
