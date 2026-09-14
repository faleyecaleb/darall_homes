@extends('layouts.public')

@section('title', 'Exclusive Properties Showcase')

@section('content')
<!-- Header Banner Section - Floating Cinematic Backdrop -->
<div class="relative bg-slate-950 pt-40 pb-24 sm:py-32 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[400px] select-none mobile-hero-fix">
    <div class="absolute inset-0 bg-cover bg-center opacity-30 animate-fade-in" style="background-image: url('https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-widest bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-md animate-fade-in">
            Interactive Digital Showroom
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-none animate-slide-up">
            Discover Our Elite Properties
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed font-light animate-slide-up delay-100">
            Refine your selection. Explore interactive virtual showings and discover bespoke spaces in Lagos' most prestigious communities.
        </p>
    </div>
</div>

<!-- Search & Filtering Engine Container -->
<section class="py-12 bg-slate-50 min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Premium Filtering Bar -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200/50 p-6 sm:p-8 -mt-24 relative z-20 mb-12 animate-slide-up">
            <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Location Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold uppercase tracking-wider text-slate-400">Location</label>
                    <select name="location" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Locations</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Property Category Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold uppercase tracking-wider text-slate-400">Property Category</label>
                    <select name="category" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Range Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold uppercase tracking-wider text-slate-400">Price Range & Budget</label>
                    <select name="price_range" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Budgets</option>
                        <option value="under-150m" {{ request('price_range') === 'under-150m' ? 'selected' : '' }}>Under ₦150M</option>
                        <option value="150m-300m" {{ request('price_range') === '150m-300m' ? 'selected' : '' }}>₦150M - ₦300M</option>
                        <option value="300m-500m" {{ request('price_range') === '300m-500m' ? 'selected' : '' }}>₦300M - ₦500M</option>
                        <option value="above-500m" {{ request('price_range') === 'above-500m' ? 'selected' : '' }}>Above ₦500M</option>
                    </select>
                </div>

                <!-- Action Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 active:scale-95 rounded-2xl transition-all duration-150 shadow-md">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Search Showcase
                    </button>
                </div>
            </form>
        </div>

        <!-- Filter Status & Stats -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 scroll-reveal reveal-up">
            <p class="text-sm text-slate-500">Showing <strong class="text-slate-900 font-semibold">{{ $properties->total() }}</strong> premium properties matching your standards</p>
            
            <!-- Dynamic Sorting -->
            <form action="{{ route('properties.index') }}" method="GET" id="sortForm" class="flex items-center gap-3">
                <!-- Keep existing filter values during sorting -->
                @if(request('location'))<input type="hidden" name="location" value="{{ request('location') }}">@endif
                @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                @if(request('price_range'))<input type="hidden" name="price_range" value="{{ request('price_range') }}">@endif
                
                <span class="text-sm text-slate-400 font-bold uppercase tracking-wider">Sort By</span>
                <select name="sort" onchange="document.getElementById('sortForm').submit()" class="bg-white border border-slate-200/60 rounded-xl px-4 py-2.5 text-sm text-slate-700 font-bold focus:outline-none focus:ring-1 focus:ring-brand-red-500">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest Listed</option>
                    <option value="price-low" {{ request('sort') === 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price-high" {{ request('sort') === 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>
        </div>

        <!-- Property Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($properties as $index => $property)
                <div class="group bg-white rounded-[2.5rem] border border-slate-200/50 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 transform scroll-reveal reveal-up"
                     :class="'delay-' + (($index + 1) * 100)">
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-200 z-0">
                        @if($property->coverImage)
                            <img src="{{ $property->coverImage->file_path }}" alt="{{ $property->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                        @endif
                        <span class="absolute top-4 left-4 bg-brand-red-400 text-slate-950 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-wider shadow-md">
                            {{ $property->property_type === 'Shortlet' ? 'Shortlet' : 'For ' . $property->property_type }}
                        </span>
                        @if($property->virtualTour)
                            <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-brand-red-400 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-wider flex items-center gap-1.5 shadow-md border border-white/5">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-red-400 animate-pulse"></span> Virtual Tour Active
                            </span>
                        @endif
                    </div>
                    <div class="p-8 flex flex-col gap-5">
                        <div class="flex flex-col gap-1.5">
                            <span class="text-sm text-slate-400 uppercase tracking-widest font-extrabold">{{ $property->location->name }}</span>
                            <h3 class="text-xl font-serif font-extrabold text-slate-900 group-hover:text-brand-red-500 transition-colors tracking-tight truncate">{{ $property->title }}</h3>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed font-semibold text-left line-clamp-2">{{ $property->description }}</p>
                        <div class="flex items-center gap-6 text-sm text-slate-500 border-y border-slate-100 py-3.5 my-1 font-sans font-semibold">
                            <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-extrabold">{{ $property->bedrooms }}</strong> Beds</span>
                            <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-extrabold">{{ $property->bathrooms }}</strong> Baths</span>
                            @if($property->floor_area)
                                <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-extrabold">{{ $property->floor_area }}</strong> sqm</span>
                            @endif
                        </div>
                        
                        <!-- Premium Redesigned Price & Button Stack (Resolves Collision) -->
                        <div class="flex flex-col gap-4 mt-2">
                            <div class="flex justify-between items-baseline font-sans">
                                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Investment Value</span>
                                @if($property->property_type === 'Shortlet')
                                    <span class="text-lg font-extrabold text-slate-900">₦{{ number_format($property->price) }}<span class="text-xs text-slate-400 font-bold">/night</span></span>
                                @else
                                    <span class="text-lg font-extrabold text-[#0d6e60] dark:text-emerald-400">₦{{ number_format($property->price) }}</span>
                                @endif
                            </div>
                            <a href="{{ route('properties.show', $property->slug) }}" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-brand rounded-xl transition-all shadow-md">
                                Explore Showroom
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-slate-100">
                    <p class="text-slate-400 text-sm">No exclusive properties currently match your selected filters.</p>
                </div>
            @endforelse
        </div>

        <!-- Real Laravel Pagination Links -->
        <div class="mt-16 flex justify-center font-sans">
            {{ $properties->links() }}
        </div>
    </div>
</section>
@endsection
