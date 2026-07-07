<x-layouts::eventpaadi title="Support">
    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-surface-container-lowest">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_30%,#00685b_0%,transparent_50%)]"></div>
            <div class="absolute bottom-0 right-0 w-full h-full bg-[radial-gradient(circle_at_70%_70%,#59569c_0%,transparent_50%)]"></div>
        </div>
        <div class="relative z-10 w-full max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full font-label-md text-label-md">
                    {{ data_get($page->content, 'hero_badge', 'Premium Event Solutions') }}
                </span>
                <h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight">
                    {!! data_get($page->content, 'hero_title', 'Bespoke Support for <span class="text-primary italic">Seamless</span> Events.') !!}
                </h1>
                <p class="text-on-surface-variant text-body-lg max-w-lg">
                    {{ data_get($page->content, 'hero_description', 'Elevate your professional gatherings with Nigerian excellence.') }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a class="bg-primary text-on-primary px-8 py-4 rounded-lg font-label-md text-label-md hover:-translate-y-1 transition-all shadow-lg shadow-primary/20" href="{{ data_get($page->content, 'hero_primary_btn_link', '#quote') }}">
                        {{ data_get($page->content, 'hero_primary_btn_text', 'Request a Quote') }}
                    </a>
                    <a class="flex items-center gap-2 text-secondary font-label-md text-label-md px-8 py-4 border border-secondary rounded-lg hover:bg-secondary/5 transition-all" href="{{ data_get($page->content, 'hero_secondary_btn_link', '#services') }}">
                        {{ data_get($page->content, 'hero_secondary_btn_text', 'Explore Services') }}
                        <span class="material-symbols-outlined">arrow_downward</span>
                    </a>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
                <div class="relative rounded-lg overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-700">
                    <img class="w-full aspect-[4/5] object-cover" data-alt="A professional event coordinator." src="{{ data_get($page->content, 'hero_image') ? Storage::url(data_get($page->content, 'hero_image')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAj_kEoaVSiMSSYABYWDiF9X9N4K9EpJfFLzrQiPD3ML8DswQBWRia3OZZrdn4CLfXZivp9vh77YbmOtE6coV-gx8y49BYn2BhzlBJtWU6L_Z49FL_YAVbkb5sHwEAO2Dgh0LBKNooMKvDIMPXXzJA9nkWSmSyVZYBtwxLjzRtofEFbN5--qGAMcLqXV2Q2p2DBZ_FCia9LsbCVZ1FKuB8Bg5rduZ4vQ9SoCk28NPwgDmYYS2wkX2FSBAJpMkx638r_5-uocNRJ-UM' }}"/>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Tiers: Bento Grid -->
    <section class="py-24 px-margin-desktop w-full max-w-container-max mx-auto" id="services">
        <div class="text-center mb-16 space-y-4">
            <h2 class="font-headline-lg text-headline-lg text-on-surface">
                {{ data_get($page->content, 'services_title', 'Integrated Service Ecosystem') }}
            </h2>
            <p class="text-on-surface-variant max-w-2xl mx-auto">
                {{ data_get($page->content, 'services_description', 'Scalable solutions tailored for the high-end event professional.') }}
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $defaultServices = [
                    [
                        'title' => 'Production Support',
                        'description' => 'Technical site audits, lighting plots, and sound engineering for flawless execution.',
                        'bullet_1' => 'Technical Audits',
                        'bullet_2' => 'Audio/Visual Setup',
                        'icon' => 'settings_heart',
                    ],
                    [
                        'title' => 'On-site Coordination',
                        'description' => 'Real-time floor management and guest experience stewardship across the continent.',
                        'bullet_1' => 'Floor Management',
                        'bullet_2' => 'Protocol Teams',
                        'icon' => 'groups',
                    ],
                    [
                        'title' => 'Technology Integration',
                        'description' => 'Digital registration, RFID tracking, and custom event apps for the modern host.',
                        'bullet_1' => 'RFID Guest Tracking',
                        'bullet_2' => 'Hybrid Connectivity',
                        'icon' => 'hub',
                    ],
                    [
                        'title' => 'Vendor Management',
                        'description' => 'Sourcing and supervising premium vendors to meet international standards.',
                        'bullet_1' => 'Quality Control',
                        'bullet_2' => 'Contract Handling',
                        'icon' => 'handshake',
                    ],
                ];
                $services = data_get($page->content, 'services', $defaultServices);
            @endphp
            @foreach($services as $index => $service)
                @php
                    $borderHover = ($index % 2 == 0) ? 'hover:border-primary/50' : 'hover:border-secondary/50';
                    $iconColor = ($index % 2 == 0) ? 'bg-primary/10 text-primary' : 'bg-secondary/10 text-secondary';
                    $bulletColor = ($index % 2 == 0) ? 'text-primary' : 'text-secondary';
                @endphp
                <div class="service-card group bg-surface-container-lowest p-8 rounded-lg border border-outline-variant {{ $borderHover }} transition-all duration-500 shadow-sm">
                    <div class="service-icon w-12 h-12 {{ $iconColor }} rounded-lg flex items-center justify-center mb-6 transition-transform duration-500">
                        <span class="material-symbols-outlined text-3xl">{{ $service['icon'] ?? 'star' }}</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md mb-3">{{ $service['title'] }}</h3>
                    <p class="text-on-surface-variant text-body-md mb-6">{{ $service['description'] }}</p>
                    <ul class="space-y-2 text-label-md text-on-surface">
                        @if(!empty($service['bullet_1']))
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined {{ $bulletColor }} text-sm filled-icon">check_circle</span> {{ $service['bullet_1'] }}</li>
                        @endif
                        @if(!empty($service['bullet_2']))
                            <li class="flex items-center gap-2"><span class="material-symbols-outlined {{ $bulletColor }} text-sm filled-icon">check_circle</span> {{ $service['bullet_2'] }}</li>
                        @endif
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <!-- The EventPaadi Difference -->
    <section class="py-24 bg-surface-container-low overflow-hidden">
        <div class="px-margin-desktop w-full max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4 pt-12">
                        @php
                            $diffImg1 = data_get($page->content, 'difference_image_1') ? Storage::url(data_get($page->content, 'difference_image_1')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAXONfRzEe-J8SQuw8wv_Dg_9ot5X1AerR2qjKAxGwDNfs0B2q04-Bt-jDZSkN0tC3RhR1WFoMXw8RYXV5L0_jo6x5A8fVmvvZ9oTlnyAseSVCZuvEyYUpz6CRFtiZAGL0E69ANXYHZzCkqUcuSg9UPJTIWachzAIhQOepEKBInuPqwK33J66ApuKd4d8DAfUApCHgyQkHDUf_8ZCuFnKckl4XRYRqrqyc4Yc2elx37rpESBeB4-bkfS78u_S57ji8mt47x9W5_tdw';
                            $diffImg2 = data_get($page->content, 'difference_image_2') ? Storage::url(data_get($page->content, 'difference_image_2')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXu0EW1pA82rJMZII8ZoeNDlYDVjrXbGWf-E96GaHFMsze2GKKqu8zj71ph0Q60HR7SFLzOLD6-hfzNVQorrnsWwJMar7XY0Ceyp2xEnOLcgwVSzUuLZlRxOpTeyJAo_P_q9Tatk82CfPVwBMHPZfWaMzSWk42KkFDnyvHq7voYuUIZ_He_9-PPDZYXqoCQflCOclbLn7UQvpp4mkmWjmaeKN5D0lXOTLWfSJ39WYi0l-GVlsiBrGXsWzLgLXRZ5vgDAtUHoXRQKw0o';
                        @endphp
                        <div class="rounded-lg overflow-hidden h-64 shadow-xl">
                            <img class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" data-alt="High tech control room." src="{{ $diffImg1 }}"/>
                        </div>
                        <div class="bg-primary p-8 rounded-lg text-on-primary">
                            <h4 class="font-headline-md text-headline-md mb-2">
                                {{ data_get($page->content, 'difference_stat_1_val', '99.9%') }}
                            </h4>
                            <p class="text-caption">
                                {{ data_get($page->content, 'difference_stat_1_lbl', 'Uptime on Technical Infrastructure') }}
                            </p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-secondary p-8 rounded-lg text-on-primary">
                            <h4 class="font-headline-md text-headline-md mb-2">
                                {{ data_get($page->content, 'difference_stat_2_val', '500+') }}
                            </h4>
                            <p class="text-caption">
                                {{ data_get($page->content, 'difference_stat_2_lbl', 'High-Stakes Events Managed') }}
                            </p>
                        </div>
                        <div class="rounded-lg overflow-hidden h-64 shadow-xl">
                            <img class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" data-alt="Outdoor wedding." src="{{ $diffImg2 }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">
                    {{ data_get($page->content, 'difference_title', 'The EventPaadi Difference') }}
                </h2>
                <div class="space-y-6">
                    @php
                        $defaultPoints = [
                            [
                                'title' => 'Unyielding Quality',
                                'description' => 'We adhere to global standards of excellence while honoring the unique cultural vibrancy of West African celebrations.',
                                'icon' => 'verified',
                            ],
                            [
                                'title' => 'Mission-Critical Reliability',
                                'description' => 'Redundant systems and meticulous planning ensure that your event remains seamless, regardless of the complexity.',
                                'icon' => 'shield_lock',
                            ],
                            [
                                'title' => 'Continuous Innovation',
                                'description' => 'We leverage the latest in event technology, from generative AI guest management to immersive AR experiences.',
                                'icon' => 'lightbulb',
                            ],
                        ];
                        $points = data_get($page->content, 'difference_points', $defaultPoints);
                    @endphp
                    @foreach($points as $point)
                        <div class="flex gap-4">
                            <div class="shrink-0 w-12 h-12 rounded-full bg-white flex items-center justify-center text-primary shadow-sm">
                                <span class="material-symbols-outlined">{{ $point['icon'] ?? 'check' }}</span>
                            </div>
                            <div>
                                <h4 class="font-headline-md text-headline-md text-on-surface text-[18px]">{{ $point['title'] }}</h4>
                                <p class="text-on-surface-variant">{{ $point['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Section -->
    <section class="py-24 px-margin-desktop w-full max-w-container-max mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="space-y-2">
                <h2 class="font-headline-lg text-headline-lg text-on-surface">
                    {{ data_get($page->content, 'cases_title', 'Proven Success') }}
                </h2>
                <p class="text-on-surface-variant">
                    {{ data_get($page->content, 'cases_description', 'Real stories of seamless execution across diverse event landscapes.') }}
                </p>
            </div>
            <button class="text-primary font-label-md flex items-center gap-2 hover:gap-4 transition-all">
                View All Case Studies
                <span class="material-symbols-outlined">arrow_forward</span>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $defaultCases = [
                    [
                        'title' => 'The Nexus Summit',
                        'description' => 'Optimized logistics for 500+ global executives over 3 days.',
                        'image' => null,
                        'category' => 'Corporate Retreat',
                    ],
                    [
                        'title' => 'Echoes of Lagos',
                        'description' => 'Production management for a 5,000 attendee live broadcast event.',
                        'image' => null,
                        'category' => 'Live Concert',
                    ],
                    [
                        'title' => 'The Adeleke Nuptials',
                        'description' => 'Coordinating 40+ high-end vendors for a royal celebration.',
                        'image' => null,
                        'category' => 'Luxury Wedding',
                    ],
                ];
                $cases = data_get($page->content, 'cases', $defaultCases);
                $caseImages = [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDU_G25gbJcs7LW4xv6a7X9ET0YjEtTPXq1G6HUysVqVvc12pxy39ZiLNGp7XN09m4wZWRqPmCoKgEsok3bpV2MWiy28wYO_d6bLHBdepTV2lVnrwSlfU_fpXgR99KiAHgNzzi1J0o5_3gITSEtJkFA0vJJQ-0MWm2Gbb0EJXgSH-a6rakxT91L5MXuV8rLEi_wBUHYzzLrXDVtuKj4VJQCQTb-BbDVZVnXW0rUT0m1QVW0oNJi5NqQInPzjDzeo5RAKjfI51DMuQs',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDrs7zilJ6DjCXyk-mVGCxe8eTbJ60fPGpICuKTy7oqCsoy_Cyf191xG3gOoIZF6VsWMuFxZaFr3qQzfR51XH-whKQyy_dyY5Y0XVzBcOoAHDut7kwRB7Xeudz7HAbTlgQBNdkmVnKDdSlcBCvRe8vt7TALMCWxdcWRwAHqqnrr15zXd9_sq-ocwbR_6kxRkZZcDHKXV34-eEPpcAdMzLDVhOMAF36qJ5JtYmGQUp062kqbViYil6jnFC00EeBfAIrb85kMTD1FZLQ',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuA3m48e1T0bgDoxNgkr0TfRmiUavVNlDWHfzdx_P2nJneyhsU02n6CA5H9XgCFd1DJdxbC0WoVfnS1vZMyBdElZS2siUgntyaYT6fAGCughoDwO9ntZuPe6rWuQT4i7i3B-WvnIAYrA-FARoNPC58L1FR2cPlPBmn9pq4zg9OOaUnfRZK7mzsX0ruOsMTfKehOWXQFVJw5iLmMdX7JhD95sVHozDiDdlQ8O9_y44V04hY4xX18kHdfDxBuPetqeoYMUJPjkkTdfQfs'
                ];
            @endphp
            @foreach($cases as $idx => $case)
                @php
                    $imgUrl = !empty($case['image']) ? Storage::url($case['image']) : ($caseImages[$idx] ?? '');
                @endphp
                <div class="group cursor-pointer">
                    <div class="relative h-[400px] rounded-lg overflow-hidden mb-6 shadow-md">
                        @if($imgUrl)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="{{ $case['title'] }}" src="{{ $imgUrl }}"/>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                            <p class="text-white text-body-md">{{ $case['description'] }}</p>
                        </div>
                    </div>
                    <span class="text-primary font-label-md tracking-wider uppercase">{{ $case['category'] }}</span>
                    <h3 class="font-headline-md text-headline-md mt-2 group-hover:text-primary transition-colors">{{ $case['title'] }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Contact/Request Quote Form -->
    <section class="py-24 bg-surface-container-highest" id="quote">
        <div class="px-margin-desktop w-full max-w-container-max mx-auto">
            <div class="bg-surface-container-lowest rounded-lg overflow-hidden shadow-2xl flex flex-col lg:flex-row">
                <div class="lg:w-1/3 bg-primary p-12 text-on-primary flex flex-col justify-between">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg mb-6 text-on-primary">
                            {{ data_get($page->content, 'quote_title', 'Let’s Build Something Iconic.') }}
                        </h2>
                        <p class="opacity-80 text-body-md mb-12">
                            {{ data_get($page->content, 'quote_description', 'Share your vision with us, and our support team will craft a bespoke proposal.') }}
                        </p>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined">call</span>
                                <span>{{ data_get($page->content, 'quote_phone', '+234 800 EVENT PAADI') }}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined">mail</span>
                                <span>{{ data_get($page->content, 'quote_email', 'support@eventpaadi.com') }}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="material-symbols-outlined">location_on</span>
                                <span>{{ data_get($page->content, 'quote_address', 'Lagos & Abuja, Nigeria') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/3 p-12">
                    <form action="#" method="POST" class="space-y-6" onsubmit="event.preventDefault(); alert('Your inquiry has been submitted! We will contact you shortly.');">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block font-label-md text-on-surface-variant">Full Name</label>
                                <input required class="w-full bg-surface-container-low border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-lg transition-all p-4" placeholder="John Doe" type="text"/>
                            </div>
                            <div class="space-y-2">
                                <label class="block font-label-md text-on-surface-variant">Company / Organization</label>
                                <input required class="w-full bg-surface-container-low border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-lg transition-all p-4" placeholder="Acme Events" type="text"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block font-label-md text-on-surface-variant">Work Email</label>
                                <input required class="w-full bg-surface-container-low border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-lg transition-all p-4" placeholder="john@company.com" type="email"/>
                            </div>
                            <div class="space-y-2">
                                <label class="block font-label-md text-on-surface-variant">Event Type</label>
                                <select class="w-full bg-surface-container-low border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-lg transition-all p-4">
                                    <option>Corporate Conference</option>
                                    <option>Live Entertainment</option>
                                    <option>Luxury Wedding</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="block font-label-md text-on-surface-variant">How can we help?</label>
                            <textarea required class="w-full bg-surface-container-low border-transparent focus:border-primary focus:bg-white focus:ring-0 rounded-lg transition-all p-4" placeholder="Tell us about your event requirements..." rows="4"></textarea>
                        </div>
                        <button class="w-full bg-primary text-on-primary font-headline-md text-headline-md py-4 rounded-lg hover:-translate-y-1 transition-all shadow-lg shadow-primary/20" type="submit">Submit Inquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts::eventpaadi>
