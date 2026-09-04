<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Premium Real Estate & Virtual Property Experience') | Darall Homes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">

    <!-- Premium Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="group flex items-center gap-2">
                        <span class="text-2xl font-bold tracking-widest text-slate-900 uppercase">
                            Darall<span class="text-amber-600 font-light">Homes</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('home') ? 'text-amber-600' : 'text-slate-600' }}">Home</a>
                    <a href="{{ route('properties.index') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('properties.*') ? 'text-amber-600' : 'text-slate-600' }}">Properties</a>
                    <a href="{{ route('projects') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('projects') ? 'text-amber-600' : 'text-slate-600' }}">Developments</a>
                    <a href="{{ route('blog') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('blog') ? 'text-amber-600' : 'text-slate-600' }}">Insights</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('about') ? 'text-amber-600' : 'text-slate-600' }}">About Us</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium transition-colors hover:text-amber-600 {{ request()->routeIs('contact') ? 'text-amber-600' : 'text-slate-600' }}">Contact</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-full transition-all duration-200">
                                Admin Portal
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-full transition-all duration-200">
                                Client Dashboard
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-amber-600 transition-colors">Sign In</a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-full transition-all duration-200">
                            Book Inspection
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center" x-data="{ open: false }">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <!-- Mobile Menu (AlpineJs) -->
                    <div x-show="open" @click.away="open = false" class="absolute top-20 right-0 left-0 bg-white border-b border-slate-100 p-4 shadow-lg flex flex-col gap-4">
                        <a href="{{ route('home') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Home</a>
                        <a href="{{ route('properties.index') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Properties</a>
                        <a href="{{ route('projects') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Developments</a>
                        <a href="{{ route('blog') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Insights</a>
                        <a href="{{ route('about') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">About Us</a>
                        <a href="{{ route('contact') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Contact</a>
                        <hr class="border-slate-100">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-base font-medium text-slate-600 hover:text-amber-600">Sign In</a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-full transition-all duration-200">
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
            <div class="flex flex-col gap-4">
                <span class="text-2xl font-bold tracking-widest text-white uppercase">
                    Darall<span class="text-amber-500 font-light">Homes</span>
                </span>
                <p class="text-sm text-slate-400 leading-relaxed">
                    A premium, technology-driven property digital showroom. Experience luxury homes virtually from anywhere in the world.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-semibold mb-6">Explore</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('properties.index') }}" class="hover:text-amber-500 transition-colors">Featured Properties</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:text-amber-500 transition-colors">Developments & Projects</a></li>
                    <li><a href="{{ route('shortlets') }}" class="hover:text-amber-500 transition-colors">Shortlet Stays</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-amber-500 transition-colors">Market Insights</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h4 class="text-white font-semibold mb-6">Company</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-amber-500 transition-colors">About Our Vision</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-amber-500 transition-colors">Contact & Support</a></li>
                    <li><a href="#" class="hover:text-amber-500 transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-amber-500 transition-colors">Privacy Principles</a></li>
                </ul>
            </div>

            <!-- Contact / Location -->
            <div>
                <h4 class="text-white font-semibold mb-6">Headquarters</h4>
                <p class="text-sm text-slate-400 mb-4 leading-relaxed">
                    Block 12, Plot 4, Admiralty Way,<br>
                    Lekki Phase 1, Lagos, Nigeria.
                </p>
                <p class="text-sm text-slate-400 mb-2">
                    <span class="text-white">Email:</span> contact@darallhomes.com
                </p>
                <p class="text-sm text-slate-400">
                    <span class="text-white">Phone:</span> +234 (0) 800-DARALL-HOMES
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
            <p>&copy; {{ date('Y') }} Darall Homes. All rights reserved.</p>
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-slate-500">Virtual Property Experience Active</span>
            </div>
        </div>
    </footer>

    <!-- Reusable Toast Notification Component -->
    <x-toast-notification />

</body>
</html>
