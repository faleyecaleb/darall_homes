<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Premium Real Estate & Virtual Property Experience') | Darall Homes</title>

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Google Fonts CDN (Plus Jakarta Sans & Playfair Display for Luxury Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, .font-serif {
            font-family: 'Playfair Display', serif;
        }
        /* Live cPanel/Production Mobile Spacing Safety Guards */
        @media (max-w: 640px) {
            .mobile-hero-fix {
                padding-top: 10rem !important;
                padding-bottom: 6rem !important;
            }
            .mobile-show-hero-fix {
                padding-top: 10rem !important;
                padding-bottom: 4rem !important;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">

    <!-- Premium Navigation Header - Scroll-Driven Dynamic Light/Transparent Transition -->
    <header x-data="{ scrolled: window.scrollY > 20 }" 
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 border-b"
            :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? 'bg-white/95 backdrop-blur-md border-slate-100 shadow-sm py-4 text-slate-900' : 'bg-transparent border-transparent py-6 text-white'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-12">
                <!-- Logo with scroll-adaptive color -->
                <div class="flex-shrink-0 flex items-center h-10 w-44">
                    <a href="{{ route('home') }}" class="group flex items-center gap-2 h-full w-full">
                        <div class="h-full w-full transition-colors duration-500"
                              :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? 'text-slate-900' : 'text-white'">
                            <x-application-logo />
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links with scroll-adaptive colors -->
                <nav class="hidden md:flex space-x-8 items-center font-sans font-semibold text-xs uppercase tracking-widest">
                    <a href="{{ route('home') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('home') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">Home</a>
                    <a href="{{ route('properties.index') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('properties.*') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">Properties</a>
                    <a href="{{ route('projects') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('projects') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">Developments</a>
                    <a href="{{ route('blog') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('blog') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">Insights</a>
                    <a href="{{ route('about') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('about') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">About Us</a>
                    <a href="{{ route('contact') }}" class="transition-colors duration-500" :class="scrolled || !{{ (request()->routeIs('home') || (request()->routeIs('properties.show') && str_contains(request()->path(), 'lumiere-suites'))) ? 'true' : 'false' }} ? ({{ request()->routeIs('contact') ? 'true' : 'false' }} ? 'text-brand-red-600' : 'text-slate-600 hover:text-brand-red-600') : 'text-slate-200 hover:text-brand-red-400'">Contact</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all duration-200">
                                Admin Portal
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all duration-200">
                                Client Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-white bg-brand-red-600 hover:bg-brand-red-700 rounded-xl transition-all duration-200 shadow-md">
                            Book Inspection
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button (md:hidden) -->
                <div class="md:hidden flex items-center" x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brand-red-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Drawer (AlpineJs) -->
                    <div x-show="open" @click.away="open = false" class="absolute top-20 right-0 left-0 bg-white border-b border-slate-100 p-4 shadow-lg flex flex-col gap-4 text-slate-900">
                        <a href="{{ route('home') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Home</a>
                        <a href="{{ route('properties.index') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Properties</a>
                        <a href="{{ route('projects') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Developments</a>
                        <a href="{{ route('blog') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Insights</a>
                        <a href="{{ route('about') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">About Us</a>
                        <a href="{{ route('contact') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Contact</a>
                        <hr class="border-slate-100">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-base font-semibold text-slate-700 hover:text-brand-red-600">Dashboard</a>
                        @else
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold uppercase tracking-widest text-white bg-brand-red-600 hover:bg-brand-red-700 rounded-xl transition-all duration-200">
                                Book Inspection
                            </a>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Premium Footer -->
    <footer class="bg-slate-950 text-slate-400 pt-20 pb-10 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <!-- Brand Column -->
            <div class="flex flex-col gap-6">
                <span class="text-2xl font-bold tracking-widest text-white uppercase">
                    Darall<span class="text-brand-red-500 font-light">Homes</span>
                </span>
                <p class="text-xs text-slate-500 leading-relaxed font-semibold">
                    A premium, technology-driven property digital showroom. Experience luxury homes virtually from anywhere in the world.
                </p>
            </div>

            <!-- Explore -->
            <div>
                <h4 class="text-white font-semibold mb-6">Explore</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('properties.index') }}" class="hover:text-brand-red-500 transition-colors">Featured Properties</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:text-brand-red-500 transition-colors">Developments & Projects</a></li>
                    <li><a href="{{ route('shortlets') }}" class="hover:text-brand-red-500 transition-colors">Shortlet Stays</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-brand-red-500 transition-colors">Market Insights</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h4 class="text-white font-semibold mb-6">Company</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-brand-red-500 transition-colors">About Our Vision</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand-red-500 transition-colors">Contact & Support</a></li>
                    <li><a href="#" class="hover:text-brand-red-500 transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-brand-red-500 transition-colors">Privacy Principles</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-brand-red-500 transition-colors">Partner Sign In</a></li>
                </ul>
            </div>

            <!-- Contact / Location -->
            <div>
                <h4 class="text-white font-semibold mb-6">Headquarters</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold mb-6">
                    Block 12, Plot 4, Admiralty Way,<br>
                    Lekki Phase 1, Lagos, Nigeria.
                </p>
                <div class="flex flex-col gap-2 text-xs">
                    <span class="text-slate-500 font-semibold">Email: <a href="mailto:contact@darallhomes.com" class="text-slate-300 hover:text-brand-red-500">contact@darallhomes.com</a></span>
                    <span class="text-slate-500 font-semibold">Phone: <a href="tel:+234800DARALLHOMES" class="text-slate-300 hover:text-brand-red-500">+234 (0) 800–DARALL–HOMES</a></span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
            <p>&copy; {{ date('Y') }} Darall Homes. All rights reserved.</p>
            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                <span class="text-slate-500">Virtual Property Experience Active</span>
            </div>
        </div>
    </footer>

    <!-- Reusable Chatbot Widget -->
    <x-chatbot-widget />

    <!-- Reusable Toast Notification Component -->
    <x-toast-notification />

    <!-- Global Scroll Reveal Intersection Observer Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { 
                threshold: 0.08,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.scroll-reveal').forEach(el => {
                observer.observe(el);
            });
        });
    </script>

</body>
</html>
