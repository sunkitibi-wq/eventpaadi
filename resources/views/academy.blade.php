<x-layouts::eventpaadi title="Academy">
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-surface-container-lowest">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_30%,#00685b_0%,transparent_50%)]"></div>
            <div class="absolute bottom-0 right-0 w-full h-full bg-[radial-gradient(circle_at_70%_70%,#59569c_0%,transparent_50%)]"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
            <div class="space-y-8">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md">
                    {{ data_get($page->content, 'hero_badge', 'Professional Event Excellence') }}
                </span>
                <h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight">
                    {!! data_get($page->content, 'hero_title', 'Elevate Your <span class="text-primary italic">Event Career.</span>') !!}
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                    {{ data_get($page->content, 'hero_description', 'Master the art of West African celebration and professional event logistics.') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ data_get($page->content, 'hero_primary_btn_link', '#register') }}" class="bg-primary text-on-primary px-8 py-4 rounded-lg font-label-md text-label-md hover:translate-y-[-2px] transition-all duration-300 shadow-xl flex items-center gap-2">
                        {{ data_get($page->content, 'hero_primary_btn_text', 'Explore Programs') }} <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                    <a href="{{ data_get($page->content, 'hero_secondary_btn_link', '#register') }}" class="border-2 border-secondary text-secondary px-8 py-4 rounded-lg font-label-md text-label-md hover:bg-secondary hover:text-on-secondary transition-all duration-300">
                        {{ data_get($page->content, 'hero_secondary_btn_text', 'View Schedule') }}
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-video rounded-xl overflow-hidden shadow-2xl relative">
                    <img class="w-full h-full object-cover" data-alt="A high-key, professionally lit photography shot of a modern, stylish Nigerian woman mentor speaking." src="{{ data_get($page->content, 'hero_image') ? Storage::url(data_get($page->content, 'hero_image')) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBshOpDBDN1FUpkDl_smA5jUkcsn3p7_C2DW7ky-AAVm-7hDpUFyufF4ZzBTT1tfgXLT7Agde1F6Ys71qTiBU18BXMaNiVkrR_PXYtL4QUAsfYsj2gZgRW7amdpUicktGRZWNXzGBinpSk6tk7PZrlbk6-FbIo7MWKB9i0qeA7C8WyXsqXF_yVX70ZfTvK5mvtGKH3Jw_CiAtoIcv9BcJ-_X5vQ1xrZ2x4lswyiNp-2VPu5YVIo3VYXR4NrlWf4pGjXatFXS6GetJI' }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/40 to-transparent"></div>
                </div>
                <!-- Floating stats card -->
                <div class="absolute -bottom-6 -left-6 bg-surface-bright p-6 rounded-xl shadow-2xl flex items-center gap-4 animate-bounce-slow">
                    <div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                        <span class="material-symbols-outlined">stars</span>
                    </div>
                    <div>
                        <p class="font-headline-md text-headline-md text-primary">
                            {{ data_get($page->content, 'hero_stat_number', '5,000+') }}
                        </p>
                        <p class="font-caption text-caption text-on-surface-variant">
                            {{ data_get($page->content, 'hero_stat_label', 'Graduates in 2024') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Categories (Bento Grid) -->
    <section class="py-24 bg-surface-bright">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="mb-16 text-center max-w-2xl mx-auto">
                <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">
                    {{ data_get($page->content, 'tracks_title', 'Master Every Dimension') }}
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    {{ data_get($page->content, 'tracks_description', 'Specialized training modules tailored for the Nigerian event ecosystem.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-gutter-desktop h-auto md:h-[600px]">
                @php
                    $defaultTracks = [
                        [
                            'title' => 'Event Management & Strategy',
                            'description' => 'End-to-end planning frameworks for luxury Nigerian celebrations and high-tier corporate events.',
                            'icon' => 'event_available',
                            'col_span' => '2',
                            'row_span' => '2',
                        ],
                        [
                            'title' => 'Technical Production',
                            'description' => 'Master lighting, sound engineering, and AV logistics for large-scale outdoor stages.',
                            'icon' => 'architecture',
                            'col_span' => '1',
                            'row_span' => '2',
                            'image' => null,
                        ],
                        [
                            'title' => 'Floral Design',
                            'description' => 'Luxury decor and botanical artistry.',
                            'icon' => 'local_florist',
                            'col_span' => '1',
                            'row_span' => '1',
                        ],
                        [
                            'title' => 'Event Tech',
                            'description' => 'Ticketing, RFID, and digital engagement.',
                            'icon' => 'devices_other',
                            'col_span' => '1',
                            'row_span' => '1',
                        ],
                    ];
                    $tracks = data_get($page->content, 'tracks', $defaultTracks);
                @endphp
                @foreach($tracks as $index => $track)
                    @php
                        $colSpan = $track['col_span'] ?? '1';
                        $rowSpan = $track['row_span'] ?? '1';
                        $trackImage = !empty($track['image']) ? Storage::url($track['image']) : '';
                    @endphp
                    @if($colSpan == '2' && $rowSpan == '2')
                        <div class="md:col-span-2 md:row-span-2 group relative overflow-hidden rounded-xl bg-primary-container p-8 flex flex-col justify-end transition-transform duration-500 hover:-translate-y-1 cursor-pointer">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary to-transparent opacity-20"></div>
                            <div class="relative z-10 space-y-4">
                                <span class="material-symbols-outlined text-on-primary-container text-4xl">{{ $track['icon'] }}</span>
                                <h3 class="font-headline-md text-headline-md text-on-primary-container">{{ $track['title'] }}</h3>
                                <p class="font-body-md text-on-primary-container/80">{{ $track['description'] }}</p>
                                <span class="inline-flex items-center gap-2 text-on-primary-container font-label-md text-label-md group-hover:gap-4 transition-all">Explore Track <span class="material-symbols-outlined">east</span></span>
                            </div>
                        </div>
                    @elseif($colSpan == '1' && $rowSpan == '2')
                        <div class="md:col-span-1 md:row-span-2 group relative overflow-hidden rounded-xl bg-surface-container-high p-8 flex flex-col justify-between transition-transform duration-500 hover:-translate-y-1 cursor-pointer">
                            <div class="space-y-4">
                                <span class="material-symbols-outlined text-secondary text-4xl">{{ $track['icon'] }}</span>
                                <h3 class="font-headline-md text-headline-md text-on-surface">{{ $track['title'] }}</h3>
                                <p class="font-body-md text-on-surface-variant">{{ $track['description'] }}</p>
                            </div>
                            <div class="w-full h-40 mt-4 rounded-lg overflow-hidden">
                                <img class="w-full h-full object-cover" data-alt="Close-up lighting setup." src="{{ $trackImage ?: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAhkqoJM56XnGD3lSyaypEr7yv3ABTsXkyUflbXCgSkAEkx5qhZDib76500oqCEUKHo252zGmEKzm2o_e629YRQHeqQro1sZZ226XSsPm2z4qCVzhpgkppdIhiEy8B5pljXu__bfkBuEgcU8etageOWJk7YiH80fwXrZw7BBMwoNpaS5LU8oAPEiu9iTPQxFFBfrj7bjKCU3kZ8m88UeeYdHYT8c55rpIIq6wz6ke9F41TNsQPv2QgQyylHvkJ2e1_7LLMEPSX7MK4' }}"/>
                            </div>
                        </div>
                    @else
                        @php
                            $bgClass = $index == 2 ? 'bg-tertiary-fixed' : 'bg-secondary-container';
                            $textClass = $index == 2 ? 'text-on-tertiary-fixed' : 'text-on-secondary-container';
                            $descClass = $index == 2 ? 'text-on-tertiary-fixed-variant' : 'text-on-secondary-container';
                        @endphp
                        <div class="md:col-span-1 md:row-span-1 group {{ $bgClass }} {{ $textClass }} rounded-xl p-6 flex flex-col justify-center transition-transform duration-500 hover:-translate-y-1 cursor-pointer">
                            <span class="material-symbols-outlined text-3xl mb-2">{{ $track['icon'] }}</span>
                            <h4 class="font-label-md text-label-md">{{ $track['title'] }}</h4>
                            <p class="font-caption text-caption {{ $descClass }}">{{ $track['description'] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Learning Formats -->
    <section class="py-24 bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">
                        {{ data_get($page->content, 'formats_title', 'Flexible Learning Journeys') }}
                    </h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        {{ data_get($page->content, 'formats_description', 'Whether you are starting out or scaling up, we have a format that fits your schedule.') }}
                    </p>
                </div>
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center cursor-pointer hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </div>
                    <div class="w-12 h-12 rounded-full border border-outline flex items-center justify-center cursor-pointer hover:bg-surface-container-high transition-colors text-primary">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter-desktop">
                @php
                    $defaultFormats = [
                        [
                            'title' => 'Certification Programs',
                            'description' => 'Comprehensive 6-month cohorts with industry placement and professional accreditation recognized across West Africa.',
                            'icon' => 'school',
                            'bullets' => 'Industry-standard curriculum, Hands-on project portfolio',
                            'button_text' => 'Enroll Now',
                            'button_link' => '#register',
                            'is_popular' => false,
                        ],
                        [
                            'title' => 'Elite Masterclasses',
                            'description' => 'Intensive weekend sessions led by industry titans focusing on high-stakes event negotiation and luxury branding.',
                            'icon' => 'verified',
                            'bullets' => 'Live Q&A with CEOs, Networking dinner included',
                            'button_text' => 'Claim Seat',
                            'button_link' => '#register',
                            'is_popular' => true,
                        ],
                        [
                            'title' => 'Practical Workshops',
                            'description' => '1-day skill-specific labs covering technical topics like 3D floor planning, lighting rigs, and digital marketing.',
                            'icon' => 'psychology',
                            'bullets' => 'Interactive demo access, Softwares and tools provided',
                            'button_text' => 'See Workshops',
                            'button_link' => '#register',
                            'is_popular' => false,
                        ],
                    ];
                    $formats = data_get($page->content, 'formats', $defaultFormats);
                @endphp
                @foreach($formats as $format)
                    @php
                        $isPopular = $format['is_popular'] ?? false;
                        $bgCard = $isPopular ? 'border-2 border-primary shadow-[0px_12px_32px_rgba(0,104,91,0.1)] relative' : 'border border-outline-variant hover:border-primary';
                        $btnStyle = $isPopular ? 'bg-primary text-on-primary' : 'border border-primary text-primary hover:bg-primary hover:text-on-primary';
                    @endphp
                    <div class="bg-surface-bright rounded-xl p-8 transition-all duration-300 card-shadow {{ $bgCard }}">
                        @if($isPopular)
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-on-primary px-4 py-1 rounded-full text-[10px] uppercase font-bold tracking-widest">Most Popular</div>
                        @endif
                        <div class="w-14 h-14 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-6">
                            <span class="material-symbols-outlined text-3xl">{{ $format['icon'] ?? 'school' }}</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md mb-3">{{ $format['title'] }}</h3>
                        <p class="font-body-md text-on-surface-variant mb-6">{{ $format['description'] }}</p>
                        <ul class="space-y-3 mb-8">
                            @foreach(explode(',', $format['bullets'] ?? '') as $bullet)
                                @if(!empty(trim($bullet)))
                                    <li class="flex items-center gap-2 font-caption text-caption text-on-surface">
                                        <span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        {{ trim($bullet) }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <a href="{{ $format['button_link'] ?? '#register' }}" class="w-full block text-center py-3 rounded-lg font-label-md text-label-md transition-all {{ $btnStyle }}">
                            {{ $format['button_text'] ?? 'Learn More' }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mentors Section -->
    <section class="py-24 bg-surface-bright overflow-hidden">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <h2 class="font-headline-lg text-headline-lg text-on-surface mb-12 text-center">
                {{ data_get($page->content, 'mentors_title', 'Learn From Industry Icons') }}
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter-desktop">
                @php
                    $defaultMentors = [
                        ['name' => 'Tunde Bakare', 'role' => 'Tech Lead, V-Events', 'image' => null],
                        ['name' => 'Chinelo Obi', 'role' => 'Creative Director, Flora', 'image' => null],
                        ['name' => 'Femi Adebayo', 'role' => 'CEO, EventFlow Tech', 'image' => null],
                        ['name' => 'Amaka Udoh', 'role' => 'Founder, Luxe Weddings', 'image' => null],
                    ];
                    $mentors = data_get($page->content, 'mentors', $defaultMentors);
                    $mentorImages = [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuBFuxzhy_uZxGei-pfbD6wScEJZOWwIOJ-piC_Zr_FNXho_tw5b7J4QmRVc4_rLykj3ujX42AyY3AVte4EKC_2IjSS5rBePJVm6ia29Rh-Akmwj1M-WG6ZW4sW_KhOhMvsGHJTKF7r31mf9Ssiho47j62CEZjmTG_61amskEXwfLxFLjs8wFKi6AIDEizIJKr1bqs8zFTqOR9WSQ7ryKvpHkVYog_G9PeEwWcWvETl3GSsEeM7kLKNZzdrbVu1HQCppHVrx4OJHM2o',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuCOpK2vsX3Qwb2ry5ZMtQw1rHtci5XmmQv68-GKhbodn0WcjnEJ41Z-COIxUwq-DvHgdFsug_3a8Z7LuZ2Pg73noZSLr4y4Y8fYIrjjdYc_PQbtDmdFBSqlVx_NUp-8XegkOc2JqTKjH4pqmROMeRlPAsTT-9sfRa8l--pCiW7XMtahVAyJrTvnBZF1hmHsZX-DbGxkq0MGh3S8qlu1Uq0tPgZJzElPiGPAIbJmMvXZ-V7FoBwSWFMp0SyVoTwg8urmivMGtbI5SUE',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuB0rvCUDKvk8qAOEk17euz68UHR9WcUhAHOdlto1OJqm9Np_22U6si_nMBGvx569u8SffWeTr7wOLonF6QKs8RLVjhwA3027D4uhDFtKXKMFBc-rgaUctKOlva6giWae96l3Rzxaj018ebGaqXMGBaKHACAYl2Bmwf1OaWg_8YlwcJNwg5d4xV8ymzT7IZhdhzMBz_VhnUE1JLnRZutp8VCGboJWMHrAntyvmU6An0uqu6nz-efPO1AQFkOSIoefnJ9Eco6sv-Vye0',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAv_uvnB_lZmH_yZZAm5SFM0w5MAUdVAPsNA8WTPkfbjP-aIz311z7mEqN_FpdjqI5HNC6ZCQK2BUivcRPktDseqPY3oM-0xHZWe_WevFpe-VVCCRPxPaVF4YM-1cKx38Ik-5D_kvnhFxncOOpf5FdVwtvwBK0r6VvvTt9QYW18Q7TJgU-Zdn5gjgLLg2tMLOQfK9UFxBt2EF85ds0k5YVQS7lPa1YvtZUtbbecXVdVXGuT736hQrpTAsfk5swHdLYc_vSNtHY3dto'
                    ];
                @endphp
                @foreach($mentors as $idx => $mentor)
                    @php
                        $avatarUrl = !empty($mentor['image']) ? Storage::url($mentor['image']) : ($mentorImages[$idx] ?? '');
                    @endphp
                    <div class="group cursor-pointer">
                        <div class="aspect-[4/5] rounded-xl overflow-hidden mb-4 relative">
                            @if($avatarUrl)
                                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 scale-100 group-hover:scale-105" data-alt="{{ $mentor['name'] }}" src="{{ $avatarUrl }}"/>
                            @endif
                            <div class="absolute bottom-4 right-4 bg-primary text-on-primary w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity translate-y-4 group-hover:translate-y-0 duration-300">
                                <span class="material-symbols-outlined">add</span>
                            </div>
                        </div>
                        <h4 class="font-headline-md text-[18px] text-on-surface mb-1">{{ $mentor['name'] }}</h4>
                        <p class="font-caption text-caption text-primary uppercase tracking-wider font-bold">{{ $mentor['role'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enrollment CTA / Sticky Layout -->
    <section id="register" class="py-24 bg-secondary">
        <div class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-7 space-y-8">
                <h2 class="font-headline-xl text-headline-xl text-on-primary-container">
                    {{ data_get($page->content, 'register_title', 'Start Learning Today') }}
                </h2>
                <p class="font-body-lg text-secondary-fixed max-w-lg">
                    {{ data_get($page->content, 'register_description', 'Unlock access to our entire library of professional courses.') }}
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4 p-4 bg-white/10 rounded-xl border border-white/20">
                        <span class="material-symbols-outlined text-secondary-fixed">workspace_premium</span>
                        <div>
                            <h4 class="font-label-md text-label-md text-on-primary">
                                {{ data_get($page->content, 'bullet_1_title', 'Recognized Degree') }}
                            </h4>
                            <p class="font-caption text-secondary-fixed-dim">
                                {{ data_get($page->content, 'bullet_1_desc', 'Valid for career upgrades.') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-white/10 rounded-xl border border-white/20">
                        <span class="material-symbols-outlined text-secondary-fixed">groups</span>
                        <div>
                            <h4 class="font-label-md text-label-md text-on-primary">
                                {{ data_get($page->content, 'bullet_2_title', 'Alumni Network') }}
                            </h4>
                            <p class="font-caption text-secondary-fixed-dim">
                                {{ data_get($page->content, 'bullet_2_desc', 'Join 10k+ professionals.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-5">
                <div class="bg-surface-bright p-10 rounded-2xl shadow-2xl space-y-6 sticky top-24">
                    <h3 class="font-headline-md text-headline-md text-on-surface">Registration</h3>
                    <form action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); alert('Thank you for registering! We will contact you soon.');">
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-2">Full Name</label>
                            <input required class="w-full bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary h-12 px-4 transition-all" placeholder="e.g., Adaobi Johnson" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-2">Interest Area</label>
                            <select class="w-full bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary h-12 px-4 transition-all appearance-none">
                                <option>Event Management</option>
                                <option>Technical Production</option>
                                <option>Floral Design</option>
                                <option>Event Tech</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-md text-label-md text-on-surface-variant mb-2">Learning Goal</label>
                            <textarea required class="w-full bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary h-24 px-4 py-3 transition-all" placeholder="What do you hope to achieve?"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary text-on-primary py-4 rounded-lg font-headline-md text-[18px] hover:translate-y-[-2px] transition-all shadow-lg">Begin Journey</button>
                        <p class="text-center font-caption text-caption text-on-surface-variant">Secure checkout. No credit card required to start trial.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts::eventpaadi>
