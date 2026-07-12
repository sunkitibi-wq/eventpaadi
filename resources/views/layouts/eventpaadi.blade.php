<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $seoTitle = $meta_title ?? (isset($page) ? $page->meta_title : null) ?? (isset($post) ? $post->title : null) ?? ($title ?? 'EventPaadi');
        $seoDescription = $meta_description ?? (isset($page) ? $page->meta_description : null) ?? (isset($post) ? $post->excerpt : null) ?? "Nigeria's leading event support and knowledge platform.";
        $seoKeywords = $meta_keywords ?? (isset($page) ? $page->meta_keywords : null) ?? "event planning, events, nigeria, wedding planning, corporate retreats, logistics";
        $seoImage = $featured_image ?? (isset($page) && $page->featured_image ? Storage::url($page->featured_image) : null) ?? (isset($post) && $post->featured_image ? Storage::url($post->featured_image) : null) ?? null;
    @endphp

    <title>{{ $seoTitle }} | EventPaadi</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    @if($seoImage)
        <meta property="og:image" content="{{ $seoImage }}">
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ $seoTitle }}">
    <meta property="twitter:description" content="{{ $seoDescription }}">
    @if($seoImage)
        <meta property="twitter:image" content="{{ $seoImage }}">
    @endif

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Style & Script Bundling via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 24px;
        }
        @media (max-width: 768px) {
            .bento-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="bg-surface-bright text-on-surface font-body-md selection:bg-primary-fixed-dim selection:text-on-primary-fixed">

    <!-- Top Navigation Bar -->
    <header class="bg-surface-bright dark:bg-inverse-surface shadow-[0px_4px_20px_rgba(46,42,110,0.08)] sticky top-0 z-50 transition-all duration-300 h-20 flex items-center">
        <div class="flex justify-between items-center px-margin-desktop w-full max-w-container-max mx-auto h-20">
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="font-headline-lg text-headline-lg text-primary font-bold tracking-tight">Event<span class="text-secondary">Paadi</span></span>
                </a>
                
                <nav class="hidden md:flex items-center gap-8">
                    <a class="font-label-md text-label-md {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant dark:text-outline-variant pb-1 hover:text-primary dark:hover:text-inverse-primary transition-all duration-500 hover:-translate-y-0.5' }}" href="{{ route('home') }}">Home</a>
                    <a class="font-label-md text-label-md {{ request()->routeIs('support') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant dark:text-outline-variant pb-1 hover:text-primary dark:hover:text-inverse-primary transition-all duration-500 hover:-translate-y-0.5' }}" href="{{ route('support') }}">Support</a>
                    <a class="font-label-md text-label-md {{ request()->routeIs('resources') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant dark:text-outline-variant pb-1 hover:text-primary dark:hover:text-inverse-primary transition-all duration-500 hover:-translate-y-0.5' }}" href="{{ route('resources') }}">Resources</a>
                    <a class="font-label-md text-label-md {{ request()->routeIs('academy') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant dark:text-outline-variant pb-1 hover:text-primary dark:hover:text-inverse-primary transition-all duration-500 hover:-translate-y-0.5' }}" href="{{ route('academy') }}">Academy</a>
                    <a class="font-label-md text-label-md {{ request()->routeIs('blog.*') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant dark:text-outline-variant pb-1 hover:text-primary dark:hover:text-inverse-primary transition-all duration-500 hover:-translate-y-0.5' }}" href="{{ route('blog.index') }}">Blog</a>
                </nav>
            </div>
            
            <div class="flex items-center gap-4">
                <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center">
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant text-[18px]">search</span>
                        <input type="text" name="q" placeholder="Search insights..." value="{{ request('q') }}" required class="pl-9 pr-4 py-2 rounded-full border border-outline-variant bg-surface-container-lowest focus:border-primary focus:ring-1 focus:ring-primary text-sm transition-all w-40 focus:w-56">
                    </div>
                </form>
                <a href="mailto:hello@eventpaadi.ng" class="hidden lg:block px-6 py-2.5 rounded-lg border border-secondary text-secondary font-label-md hover:bg-secondary-container transition-all duration-300">Contact</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md hover:translate-y-[-2px] transition-all duration-500 shadow-lg active:scale-95">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md hover:translate-y-[-2px] transition-all duration-500 shadow-lg active:scale-95">Get Started</a>
                @endauth

                <!-- Mobile menu toggle -->
                <button class="md:hidden flex items-center p-2 text-on-surface" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Overlay -->
    <div id="mobile-menu" class="hidden fixed inset-0 z-40 bg-surface-bright pt-24 px-6 flex flex-col gap-6 md:hidden">
        <button class="absolute top-6 right-6 p-2 text-on-surface" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
            <span class="material-symbols-outlined text-3xl">close</span>
        </button>
        <a class="font-headline-md text-headline-md text-on-surface" href="{{ route('home') }}">Home</a>
        <a class="font-headline-md text-headline-md text-on-surface" href="{{ route('support') }}">Support</a>
        <a class="font-headline-md text-headline-md text-on-surface" href="{{ route('resources') }}">Resources</a>
        <a class="font-headline-md text-headline-md text-on-surface" href="{{ route('academy') }}">Academy</a>
        <a class="font-headline-md text-headline-md text-on-surface" href="{{ route('blog.index') }}">Blog</a>
        <div class="h-px bg-outline-variant my-4"></div>
        <a href="mailto:hello@eventpaadi.ng" class="w-full text-center py-3 rounded-lg border border-secondary text-secondary font-label-md">Contact Us</a>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter-desktop px-margin-desktop py-20 w-full max-w-container-max mx-auto">
            <div class="md:col-span-1">
                <span class="font-headline-lg text-headline-lg text-primary font-bold tracking-tight">Event<span class="text-secondary">Paadi</span></span>
                <p class="font-body-md text-on-surface-variant mt-6 mb-6">Empowering West African events with technology and tradition since 2024.</p>
                <div class="flex gap-4">
                    <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">public</span>
                    </a>
                    <a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-on-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">share</span>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="font-headline-md text-headline-md mb-6 text-secondary dark:text-secondary-fixed">Platform</h4>
                <ul class="space-y-4">
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="{{ route('home') }}">About Us</a></li>
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="{{ route('support') }}">Event Support</a></li>
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="{{ route('academy') }}">Academy</a></li>
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline-md text-headline-md mb-6 text-secondary dark:text-secondary-fixed">Resources</h4>
                <ul class="space-y-4">
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="{{ route('resources') }}">Tools</a></li>
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="#">Privacy Policy</a></li>
                    <li><a class="font-body-md text-on-surface-variant hover:text-secondary transition-colors duration-300" href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline-md text-headline-md mb-6 text-secondary dark:text-secondary-fixed">Locations</h4>
                <ul class="space-y-4 font-body-md text-on-surface-variant">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Lagos Office</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Abuja Office</li>
                    <li class="mt-4"><span class="font-bold text-primary">Email:</span> hello@eventpaadi.ng</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-outline-variant px-margin-desktop py-8 text-center">
            <p class="font-label-md text-on-surface-variant">© 2026 EventPaadi. Modern Nigerian Excellence.</p>
        </div>
    </footer>

    <script>
        // Smooth scroll and intersection observer for animations
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.animate-fade-in').forEach(el => {
                el.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
