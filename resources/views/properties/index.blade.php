@extends('layouts.public')

@section('title', 'Exclusive Properties Showcase')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-16 sm:py-24 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
            Interactive Digital Showroom
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white tracking-tight">
            Discover Our Elite Properties
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            Refine your selection. Explore interactive virtual showings and discover bespoke spaces in Lagos' most prestigious communities.
        </p>
    </div>
</div>

<!-- Search & Filtering Engine Container -->
<section class="py-12 bg-slate-50 min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Premium Filtering Bar -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6 sm:p-8 -mt-20 relative z-20 mb-12">
            <form action="#" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Location Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Location</label>
                    <select class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Locations</option>
                        <option value="lekki">Lekki Phase 1</option>
                        <option value="ikoyi">Old Ikoyi</option>
                        <option value="vi">Victoria Island</option>
                        <option value="banana">Banana Island</option>
                    </select>
                </div>

                <!-- Property Type Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Property Type</label>
                    <select class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Types</option>
                        <option value="apartment">Apartment</option>
                        <option value="duplex">Duplex</option>
                        <option value="mansion">Detached Mansion</option>
                        <option value="penthouse">Penthouse</option>
                    </select>
                </div>

                <!-- Price Range Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Price Range</label>
                    <select class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Budgets</option>
                        <option value="under-150m">Under ₦150M</option>
                        <option value="150m-300m">₦150M - ₦300M</option>
                        <option value="300m-500m">₦300M - ₦500M</option>
                        <option value="above-500m">Above ₦500M</option>
                    </select>
                </div>

                <!-- Action Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 active:scale-95 rounded-2xl transition-all duration-150">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Search Properties
                    </button>
                </div>
            </form>
        </div>

        <!-- Filter Status & Stats -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <p class="text-sm text-slate-500">Showing <strong class="text-slate-900">3</strong> premium properties matching your standards</p>
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-400 font-semibold uppercase">Sort By</span>
                <select class="bg-white border border-slate-100 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:ring-1 focus:ring-amber-500">
                    <option value="newest">Newest Listed</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                </select>
            </div>
        </div>

        <!-- Property Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Property 1 -->
            <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=600&q=80" alt="Lekki Penthouse" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold shadow-md">For Sale</span>
                    <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3 py-1.5 rounded-full text-xs font-semibold flex items-center gap-1.5 shadow-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour Active
                    </span>
                </div>
                <div class="p-6 sm:p-8 flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Lekki Phase 1, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">The Obsidian Penthouse</h3>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light line-clamp-2">Ultra-luxury 4-bedroom duplex featuring automated home integration, panoramic lagoon views, and high-end Italian marble finishing.</p>
                    <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-1">
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">4</strong> Beds</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">5</strong> Baths</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">450</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xl font-bold text-slate-900">₦350,000,000</span>
                        <a href="{{ route('properties.show', 'the-obsidian-penthouse') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors duration-200">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80" alt="Ikoyi Estate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold shadow-md">For Sale</span>
                </div>
                <div class="p-6 sm:p-8 flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Old Ikoyi, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">The Aria Mansion</h3>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light line-clamp-2">Exquisite 5-bedroom detached mansion with private elevator, heated swimming pool, 2 BQs, and state-of-the-art security features.</p>
                    <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-1">
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">5</strong> Beds</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">6</strong> Baths</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">680</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xl font-bold text-slate-900">₦650,000,000</span>
                        <a href="{{ route('properties.show', 'the-aria-mansion') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors duration-200">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80" alt="Victoria Island Shortlet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">Shortlet</span>
                    <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3 py-1.5 rounded-full text-xs font-semibold flex items-center gap-1.5 shadow-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour Active
                    </span>
                </div>
                <div class="p-6 sm:p-8 flex flex-col gap-4">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Victoria Island, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">The Zenith Suite</h3>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light line-clamp-2">Premium 2-bedroom executive shortlet apartment located steps away from upscale shopping centers, dining, and workspace hubs.</p>
                    <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-1">
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">2</strong> Beds</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">2.5</strong> Baths</span>
                        <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">180</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xl font-bold text-slate-900">₦120,000 <span class="text-xs text-slate-400 font-light">/ night</span></span>
                        <a href="{{ route('properties.show', 'the-zenith-suite') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors duration-200">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Placeholder -->
        <div class="flex justify-center items-center gap-2 mt-16">
            <button class="w-10 h-10 rounded-full bg-white border border-slate-100 text-slate-600 hover:bg-amber-500 hover:text-slate-950 hover:border-amber-500 flex items-center justify-center shadow-sm transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="w-10 h-10 rounded-full bg-amber-500 text-slate-950 font-semibold flex items-center justify-center shadow-sm">1</button>
            <button class="w-10 h-10 rounded-full bg-white border border-slate-100 text-slate-600 hover:bg-amber-500 hover:text-slate-950 hover:border-amber-500 flex items-center justify-center shadow-sm transition-all duration-150">2</button>
            <button class="w-10 h-10 rounded-full bg-white border border-slate-100 text-slate-600 hover:bg-amber-500 hover:text-slate-950 hover:border-amber-500 flex items-center justify-center shadow-sm transition-all duration-150">3</button>
            <button class="w-10 h-10 rounded-full bg-white border border-slate-100 text-slate-600 hover:bg-amber-500 hover:text-slate-950 hover:border-amber-500 flex items-center justify-center shadow-sm transition-all duration-150">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

    </div>
</section>
@endsection
