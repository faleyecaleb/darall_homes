<!-- Premium Admin Sidebar Component - Light and Dark Adaptive Themes -->
<aside class="hidden md:flex md:w-72 md:flex-col bg-white dark:bg-slate-950 border-r border-slate-100 dark:border-slate-800/80 flex-shrink-0 p-6 justify-between transition-colors duration-300">
    <div>
        <!-- Logo Header Brand with Hover Animation -->
        <div class="flex items-center gap-3 mb-10 group cursor-pointer h-12 w-48 text-slate-900 dark:text-white">
            <a href="{{ route('home') }}" class="h-full w-full block">
                <x-application-logo />
            </a>
        </div>

        <!-- Sidebar Navigation Links Groups -->
        <div class="space-y-8">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500 block mb-4 px-2">Main Menu</span>
                <nav class="space-y-1 font-sans">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.dashboard') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
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
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.properties.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Properties</span>
                        </div>
                        @if(request()->routeIs('admin.properties.*'))
                            <svg class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>

                    <!-- Reports Suite (Connected Route & Active State) -->
                    <a href="{{ route('admin.reports.revenue') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.reports.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span>Reports Suite</span>
                        </div>
                    </a>

                    <!-- Categories (Connected Route & Active State) -->
                    <a href="{{ route('admin.categories.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.categories.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 flex-shrink-0 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V9a2 2 0 00-2-2h-1M9 21h6m-1-14l-2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <span>Categories</span>
                        </div>
                        @if(request()->routeIs('admin.categories.*'))
                            <svg class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>

                    <!-- Locations (Connected Route & Active State) -->
                    <a href="{{ route('admin.locations.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.locations.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Locations</span>
                        </div>
                        @if(request()->routeIs('admin.locations.*'))
                            <svg class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>

                    <!-- Amenities (Connected Route & Active State) -->
                    <a href="{{ route('admin.amenities.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.amenities.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <span>Amenities</span>
                        </div>
                        @if(request()->routeIs('admin.amenities.*'))
                            <svg class="h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>
                </nav>
            </div>

            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500 block mb-4 px-2">Others</span>
                <nav class="space-y-1 font-sans">
                    <!-- Enquiries (Connected Route & Active State) -->
                    <a href="{{ route('admin.enquiries.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.enquiries.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Enquiries</span>
                        </div>
                        <!-- Displaying live enquiries count -->
                        <span class="px-2 py-0.5 text-[10px] font-bold text-white bg-brand-red-500 rounded-full animate-pulse">{{ \App\Models\PropertyEnquiry::where('status', 'New')->count() }}</span>
                    </a>

                    <!-- Inspections (Connected Route & Active State) -->
                    <a href="{{ route('admin.inspections.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.inspections.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Inspections</span>
                        </div>
                        <!-- Displaying live pending inspections count -->
                        @if(\App\Models\InspectionRequest::where('status', 'Pending')->count() > 0)
                            <span class="px-2 py-0.5 text-[10px] font-bold text-white bg-blue-500 rounded-full animate-bounce">{{ \App\Models\InspectionRequest::where('status', 'Pending')->count() }}</span>
                        @endif
                    </a>

                    <!-- Reservations (Connected Route & Active State for Shortlets) -->
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.bookings.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            <span>Reservations</span>
                        </div>
                        <!-- Displaying live pending shortlet bookings count -->
                        @if(\App\Models\Booking::where('status', 'Pending')->count() > 0)
                            <span class="px-2 py-0.5 text-[10px] font-bold text-white bg-brand-red-500 rounded-full animate-bounce">{{ \App\Models\Booking::where('status', 'Pending')->count() }}</span>
                        @endif
                    </a>

                    <!-- Audit Trail (Immutable Ledger - Strictly visible ONLY to Super Admin) -->
                    @if(auth()->check() && auth()->user()->isSuperAdmin())
                        <a href="{{ route('admin.activity-logs.index') }}" 
                           class="group flex items-center justify-between px-4 py-3 rounded-2xl transition-all duration-300 hover:translate-x-1.5 {{ request()->routeIs('admin.activity-logs.*') ? 'bg-brand text-white font-semibold shadow-lg shadow-brand/15' : 'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-50 dark:hover:bg-slate-800/40' }}">
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Audit Trail</span>
                            </div>
                        </a>
                    @endif
                </nav>
            </div>
        </div>
    </div>

    <!-- Footer Trademark Card with soft pulse -->
    <div class="flex flex-col gap-1 text-[11px] text-slate-400 dark:text-slate-500 border-t border-slate-100 dark:border-slate-800/60 pt-6 px-2 hover:text-slate-600 transition-colors duration-300 font-sans">
        <span class="font-bold text-slate-800 dark:text-slate-350">Darall Portal Dashboard</span>
        <span>&copy; {{ date('Y') }} All Rights Reserved.</span>
    </div>
</aside>
