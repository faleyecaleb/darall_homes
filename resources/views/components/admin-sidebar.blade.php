<aside class="hidden md:flex md:w-72 md:flex-col bg-white border-r border-slate-100 flex-shrink-0 p-6 justify-between">
    <div>
        <!-- Logo Header Brand with Hover Animation -->
        <div class="flex items-center gap-3 mb-10 group cursor-pointer">
            <div class="h-12 w-12 rounded-2xl bg-brand flex items-center justify-center text-white shadow-lg shadow-brand/20 flex-shrink-0 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                <!-- House Icon -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-bold tracking-tight text-slate-900 uppercase leading-none group-hover:text-brand transition-colors duration-300">darall</span>
                <span class="text-[10px] text-slate-400 font-semibold mt-1">Real Estate Admin</span>
            </div>
        </div>

        <!-- Sidebar Navigation Links Groups -->
        <div class="space-y-8">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 block mb-4 px-2">Main Menu</span>
                <nav class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.dashboard') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                        <div class="flex items-center gap-3">
                            <!-- Grid icon -->
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        @if(request()->routeIs('admin.dashboard'))
                            <svg class="h-3.5 w-3.5 text-white animate-bounce-horizontal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>

                    <!-- Properties -->
                    <a href="{{ route('admin.properties.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.properties.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                        <div class="flex items-center gap-3">
                            <!-- House icon -->
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Properties</span>
                        </div>
                        @if(request()->routeIs('admin.properties.*'))
                            <svg class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>

                    <!-- Categories -->
                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:text-slate-900 hover:bg-slate-50 hover:translate-x-1.5 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V9a2 2 0 00-2-2h-1M9 21h6m-1-14l-2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <span>Categories</span>
                        </div>
                    </a>

                    <!-- Locations -->
                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:text-slate-900 hover:bg-slate-50 hover:translate-x-1.5 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Locations</span>
                        </div>
                    </a>

                    <!-- Amenities -->
                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:text-slate-900 hover:bg-slate-50 hover:translate-x-1.5 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <span>Amenities</span>
                        </div>
                    </a>
                </nav>
            </div>

            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 block mb-4 px-2">Others</span>
                <nav class="space-y-1">
                    <!-- Enquiries -->
                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:text-slate-900 hover:bg-slate-50 hover:translate-x-1.5 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Enquiries</span>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold text-white bg-amber-500 rounded-full animate-pulse">12</span>
                    </a>

                    <!-- Inspections -->
                    <a href="#" class="group flex items-center justify-between px-4 py-3 rounded-2xl text-slate-500 hover:text-slate-900 hover:bg-slate-50 hover:translate-x-1.5 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Inspections</span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Footer Trademark Card with soft pulse -->
    <div class="flex flex-col gap-1 text-[11px] text-slate-400 border-t border-slate-100 pt-6 px-2 hover:text-slate-600 transition-colors duration-300">
        <span class="font-bold text-slate-800">Darall Portal Dashboard</span>
        <span>&copy; {{ date('Y') }} All Rights Reserved.</span>
        <span class="flex items-center gap-1">Made with <span class="text-rose-500 animate-pulse">🤍</span> by Developer</span>
    </div>
</aside>
