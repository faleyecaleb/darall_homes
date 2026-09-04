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
            <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Location Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Location</label>
                    <select name="location" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Locations</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Property Category Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Property Category</label>
                    <select name="category" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Range Filter -->
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Price Range & Budget</label>
                    <select name="price_range" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white transition-all">
                        <option value="">All Budgets</option>
                        <option value="under-150m" {{ request('price_range') === 'under-150m' ? 'selected' : '' }}>Under ₦150M</option>
                        <option value="150m-300m" {{ request('price_range') === '150m-300m' ? 'selected' : '' }}>₦150M - ₦300M</option>
                        <option value="300m-500m" {{ request('price_range') === '300m-500m' ? 'selected' : '' }}>₦300M - ₦500M</option>
                        <option value="above-500m" {{ request('price_range') === 'above-500m' ? 'selected' : '' }}>Above ₦500M</option>
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
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8" x-data="{}">
            <p class="text-sm text-slate-500">Showing <strong class="text-slate-900 font-semibold">{{ $properties->total() }}</strong> premium properties matching your standards</p>
            
            <!-- Dynamic Sorting -->
            <form action="{{ route('properties.index') }}" method="GET" id="sortForm" class="flex items-center gap-3">
                <!-- Keep existing filter values during sorting -->
                @if(request('location'))<input type="hidden" name="location" value="{{ request('location') }}">@endif
                @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                @if(request('price_range'))<input type="hidden" name="price_range" value="{{ request('price_range') }}">@endif
                
                <span class="text-xs text-slate-400 font-semibold uppercase">Sort By</span>
                <select name="sort" onchange="document.getElementById('sortForm').submit()" class="bg-white border border-slate-100 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:ring-1 focus:ring-amber-500">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest Listed</option>
                    <option value="price-low" {{ request('sort') === 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price-high" {{ request('sort') === 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>
        </div>

        <!-- Property Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($properties as $property)
                <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                        @if($property->coverImage)
                            <img src="{{ $property->coverImage->file_path }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                        @endif
                        <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                            {{ $property->property_type === 'Shortlet' ? 'Shortlet' : 'For ' . $property->property_type }}
                        </span>
                        @if($property->virtualTour)
                            <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3 py-1.5 rounded-full text-xs font-semibold flex items-center gap-1.5 shadow-md">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour Active
                            </span>
                        @endif
                    </div>
                    <div class="p-6 sm:p-8 flex flex-col gap-4">
                        <div class="flex flex-col gap-1.5">
                            <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">{{ $property->location->name }}</span>
                            <h3 class="text-xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">{{ $property->title }}</h3>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed font-light line-clamp-2">{{ $property->description }}</p>
                        <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-1">
                            <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">{{ $property->bedrooms }}</strong> Beds</span>
                            <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">{{ $property->bathrooms }}</strong> Baths</span>
                            @if($property->floor_area)
                                <span class="flex items-center gap-1.5"><strong class="text-slate-900 font-semibold">{{ $property->floor_area }}</strong> sqm</span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            @if($property->property_type === 'Shortlet')
                                <span class="text-xl font-bold text-slate-900">₦{{ number_format($property->price) }}<span class="text-xs text-slate-400 font-light">/n</span></span>
                            @else
                                <span class="text-xl font-bold text-slate-900">₦{{ number_format($property->price) }}</span>
                            @endif
                            <a href="{{ route('properties.show', $property->slug) }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors duration-200">
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
        <div class="mt-16 flex justify-center">
            {{ $properties->links() }}
        </div>

    </div>
</section>
@endsection
