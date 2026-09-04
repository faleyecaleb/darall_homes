<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#f3f4f6]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | Darall Homes Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f3f4f6;
        }
        h1, h2, h3, .font-serif {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
        }
    </style>
</head>
<body class="h-full text-slate-800 antialiased overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Premium Dashboard Root Flex Container -->
    <div class="flex h-screen overflow-hidden bg-[#f3f4f6] p-4">

        <!-- Outer rounded card container representing the entire app (like the screenshots) -->
        <div class="flex flex-1 w-full bg-[#f3f4f6] rounded-[2.5rem] overflow-hidden border border-slate-200/50 shadow-2xl shadow-slate-300/30">

            <!-- 1. STATIC SIDEBAR FOR DESKTOP & TABLETS (md and above) - Light themed matching hoomeee -->
            @include('components.admin-sidebar')

            <!-- 2. DRAWER SIDEBAR FOR MOBILE ONLY (hidden md) -->
            <div x-show="sidebarOpen" class="fixed inset-0 z-50 flex md:hidden" style="display: none;">
                <!-- Backdrop overlay -->
                <div x-show="sidebarOpen"
                     x-transition:enter="transition-opacity ease-linear duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-linear duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="sidebarOpen = false" 
                     class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                <!-- Drawer content container -->
                <aside x-show="sidebarOpen"
                       x-transition:enter="transition ease-in-out duration-300 transform"
                       x-transition:enter-start="-translate-x-full"
                       x-transition:enter-end="translate-x-0"
                       x-transition:leave="transition ease-in-out duration-300 transform"
                       x-transition:leave-start="translate-x-0"
                       x-transition:leave-end="-translate-x-full"
                       class="relative flex w-72 flex-col bg-white border-r border-slate-100 p-6 justify-between flex-shrink-0">
                    
                    <div>
                        <!-- Logo & close trigger -->
                        <div class="flex items-center justify-between mb-10 flex-shrink-0">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-2xl bg-brand flex items-center justify-center text-white shadow-lg shadow-brand/20 flex-shrink-0">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-lg font-bold tracking-tight text-slate-900 uppercase leading-none">darall</span>
                                    <span class="text-[9px] text-slate-400 font-semibold mt-0.5">Real Estate Admin</span>
                                </div>
                            </div>
                            <button @click="sidebarOpen = false" type="button" class="p-1 rounded-lg text-slate-400 hover:text-slate-900">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Navigation links inside drawer -->
                        <div class="space-y-8">
                            <div>
                                <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 block mb-4 px-2">Main Menu</span>
                                <nav class="space-y-1">
                                    <a href="{{ route('admin.dashboard') }}" 
                                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-brand text-white font-semibold' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                                        <div class="flex items-center gap-3">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                                            </svg>
                                            <span>Dashboard</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('admin.properties.index') }}" 
                                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.properties.*') ? 'bg-brand text-white font-semibold' : 'text-slate-500 hover:text-slate-900' }}">
                                        <div class="flex items-center gap-3">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <span>Properties</span>
                                        </div>
                                    </a>
                                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:bg-slate-50 transition-all">
                                        <div class="flex items-center gap-3">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                            <span>Categories</span>
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Drawer footer trademark -->
                    <div class="flex flex-col gap-1 text-[11px] text-slate-400 border-t border-slate-100 pt-6 px-2">
                        <span class="font-bold text-slate-800 font-sans">Darall Portal Dashboard</span>
                        <span>&copy; {{ date('Y') }} All Rights Reserved.</span>
                    </div>
                </aside>
            </div>

            <!-- 3. MAIN WORKSPACE AREA (Pure light, with centered header pills like Cognify) -->
            <div class="flex flex-1 flex-col overflow-hidden bg-white rounded-r-[2.5rem] p-8">
                
                <!-- Dashboard Top Header (Cognify Style with Rounded Pills & Action Button) -->
                <header class="flex h-16 items-center justify-between gap-4 mb-8 flex-shrink-0">
                    <!-- Mobile hamburger open icon (only visible on mobile below md) -->
                    <button @click="sidebarOpen = true" type="button" class="p-2 rounded-xl text-slate-500 hover:bg-slate-50 md:hidden">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Cognify Centered Rounded Navigation Tabs (Pills) -->
                    <div class="hidden md:flex items-center gap-2 p-1.5 bg-slate-100/70 rounded-full border border-slate-200/30">
                        <!-- Dashboard Tab -->
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand-dark text-white shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                            Dashboard
                        </a>
                        
                        <!-- Properties Tab -->
                        <a href="{{ route('admin.properties.index') }}" 
                           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all {{ request()->routeIs('admin.properties.*') ? 'bg-brand-dark text-white shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                            Properties
                        </a>
                        
                        <!-- Enquiries Tab -->
                        <a href="{{ route('admin.enquiries.index') }}" 
                           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all {{ request()->routeIs('admin.enquiries.*') ? 'bg-brand-dark text-white shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                            Enquiries
                        </a>
                        
                        <!-- Inspections Tab -->
                        <a href="{{ route('admin.inspections.index') }}" 
                           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all {{ request()->routeIs('admin.inspections.*') ? 'bg-brand-dark text-white shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                            Inspections
                        </a>
                    </div>

                    <!-- Right Profile & Logout Header Actions -->
                    <div class="flex items-center gap-4">
                        <!-- Public Site link -->
                        <a href="{{ route('home') }}" class="hidden sm:inline-block text-xs font-semibold uppercase tracking-wider text-slate-400 hover:text-brand transition-all">
                            Public Website
                        </a>

                        <!-- Settings icon -->
                        <button class="p-2.5 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>

                        <!-- Notification bell icon -->
                        <button class="relative p-2.5 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all">
                            <span class="absolute top-1 right-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- User Profile circular trigger & logout -->
                        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                            @csrf
                            <button type="submit" class="h-10 w-10 rounded-full border border-slate-200 shadow-sm overflow-hidden hover:scale-105 transition-all">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar" class="h-full w-full object-cover">
                            </button>
                        </form>
                    </div>
                </header>

                <!-- 4. INNER SCROLLING DYNAMIC WORKSPACE BODY - Clean Light theme -->
                <main class="flex-1 overflow-y-auto pr-2 -mr-2">
                    @yield('content')
                </main>
            </div>

        </div>

    </div>

    <!-- Reusable Toast Notification Component -->
    <x-toast-notification />

</body>
</html>
