@extends('layouts.public')

@section('title', 'Exclusive Properties Showcase')

@section('content')
{{-- ── Hero Banner ── --}}
<div class="relative bg-slate-950 pt-32 pb-16 sm:pt-40 sm:pb-24 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[320px] sm:min-h-[400px] select-none mobile-hero-fix">
    <div class="absolute inset-0 bg-cover bg-center opacity-30 animate-fade-in" style="background-image: url('https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-widest bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-md animate-fade-in">
            Interactive Digital Showroom
        </span>
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif text-white tracking-tight leading-tight animate-slide-up">
            Discover Our Elite Properties
        </h1>
        <p class="text-slate-300 text-xs sm:text-sm max-w-xl leading-relaxed font-light animate-slide-up delay-100 px-2">
            Refine your selection. Explore interactive virtual showings and discover bespoke spaces in Lagos' most prestigious communities.
        </p>
    </div>
</div>

{{-- ── Search & Filtering Engine ── --}}
<section class="py-8 sm:py-12 bg-slate-50 min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Premium Filtering Bar --}}
        <div class="bg-white rounded-2xl sm:rounded-[2rem] shadow-sm border border-slate-200/50 p-4 sm:p-6 lg:p-8 -mt-16 sm:-mt-24 relative z-20 mb-8 sm:mb-12 animate-slide-up">
            <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-5">
                {{-- Location Filter --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Location</label>
                    <select name="location" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Locations</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Property Category Filter --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Category</label>
                    <select name="category" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Price Range Filter --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Price Range</label>
                    <select name="price_range" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                        <option value="">All Budgets</option>
                        <option value="under-150m" {{ request('price_range') === 'under-150m' ? 'selected' : '' }}>Under ₦150M</option>
                        <option value="150m-300m" {{ request('price_range') === '150m-300m' ? 'selected' : '' }}>₦150M – ₦300M</option>
                        <option value="300m-500m" {{ request('price_range') === '300m-500m' ? 'selected' : '' }}>₦300M – ₦500M</option>
                        <option value="above-500m" {{ request('price_range') === 'above-500m' ? 'selected' : '' }}>Above ₦500M</option>
                    </select>
                </div>

                {{-- Search Button --}}
                <div class="flex items-end col-span-2 md:col-span-1">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 active:scale-95 rounded-xl transition-all duration-150 shadow-md">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Search
                    </button>
                </div>
            </form>
        </div>

        {{-- Filter Status & Sort Bar --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6 sm:mb-8 scroll-reveal reveal-up">
            <p class="text-xs sm:text-sm text-slate-500">
                Showing <strong class="text-slate-900 font-semibold">{{ $properties->total() }}</strong> premium properties
            </p>

            <form action="{{ route('properties.index') }}" method="GET" id="sortForm" class="flex items-center gap-2 w-full sm:w-auto">
                @if(request('location'))<input type="hidden" name="location" value="{{ request('location') }}">@endif
                @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                @if(request('price_range'))<input type="hidden" name="price_range" value="{{ request('price_range') }}">@endif

                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider shrink-0">Sort By</span>
                <select name="sort" onchange="document.getElementById('sortForm').submit()" class="flex-1 sm:flex-none bg-white border border-slate-200/60 rounded-xl px-3 py-2 text-xs sm:text-sm text-slate-700 font-bold focus:outline-none focus:ring-1 focus:ring-brand-red-500">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="price-low" {{ request('sort') === 'price-low' ? 'selected' : '' }}>Price: Low → High</option>
                    <option value="price-high" {{ request('sort') === 'price-high' ? 'selected' : '' }}>Price: High → Low</option>
                </select>
            </form>
        </div>

        {{-- Partition properties into available vs sold-out groups --}}
        @php
            [$availableProperties, $soldOutProperties] = $properties->getCollection()->partition(fn($p) => !$p->isSoldOut());
        @endphp

        {{-- ── Section 1: Available Properties ── --}}
        @if($availableProperties->isNotEmpty())
            <div class="mb-12 sm:mb-16 scroll-reveal reveal-up">
                {{-- Section Heading --}}
                <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-6 sm:mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-widest bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Available Now
                    </span>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-serif font-extrabold text-slate-900 tracking-tight">Properties For Sale</h2>
                    <div class="hidden sm:block flex-1 h-px bg-slate-200"></div>
                    <span class="text-xs sm:text-sm font-bold text-slate-400 shrink-0 ml-auto sm:ml-0">{{ $availableProperties->count() }} listing{{ $availableProperties->count() !== 1 ? 's' : '' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($availableProperties as $property)
                        <div class="group bg-white rounded-2xl sm:rounded-[2rem] border border-slate-200/50 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            {{-- Image --}}
                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                                @if($property->coverImage)
                                    <img src="{{ $property->coverImage->file_path }}" alt="{{ $property->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 text-sm">No Image</div>
                                @endif
                                <span class="absolute top-3 left-3 {{ $property->isInDevelopment() ? 'bg-blue-600 text-white' : 'bg-brand-red-400 text-slate-950' }} px-2.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-md">
                                    @if($property->isRentedOut())
                                        Rented Out
                                    @elseif($property->isInDevelopment())
                                        In Development
                                    @elseif($property->property_type === 'Shortlet')
                                        Shortlet
                                    @else
                                        For {{ $property->property_type }}
                                    @endif
                                </span>
                                @if($property->virtualTour)
                                    <span class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-brand-red-400 px-2.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider flex items-center gap-1 shadow-md border border-white/5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-brand-red-400 animate-pulse"></span>
                                        <span class="hidden sm:inline">Virtual Tour</span>
                                        <span class="sm:hidden">Live</span>
                                    </span>
                                @endif
                            </div>

                            {{-- Body --}}
                            <div class="p-4 sm:p-6 flex flex-col gap-3 sm:gap-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs text-slate-400 uppercase tracking-widest font-extrabold">{{ $property->location->name }}</span>
                                    <h3 class="text-base sm:text-lg font-serif font-extrabold text-slate-900 group-hover:text-brand-red-500 transition-colors tracking-tight truncate">{{ $property->title }}</h3>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed font-medium line-clamp-2">{{ $property->description }}</p>

                                {{-- Stats Row --}}
                                <div class="flex items-center gap-3 sm:gap-4 text-xs text-slate-500 border-y border-slate-100 py-2.5 font-semibold">
                                    <span><strong class="text-slate-900">{{ $property->bedrooms }}</strong> Beds</span>
                                    <span><strong class="text-slate-900">{{ $property->bathrooms }}</strong> Baths</span>
                                    @if($property->floor_area)
                                        <span><strong class="text-slate-900">{{ $property->floor_area }}</strong> sqm</span>
                                    @endif
                                </div>

                                {{-- Price & CTA --}}
                                <div class="flex flex-col gap-3">
                                    <div class="flex justify-between items-baseline">
                                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Value</span>
                                        @if($property->property_type === 'Shortlet')
                                            <span class="text-base sm:text-lg font-extrabold text-slate-900">₦{{ number_format($property->price) }}<span class="text-xs text-slate-400 font-bold">/night</span></span>
                                        @else
                                            <span class="text-base sm:text-lg font-extrabold text-[#0d6e60]">₦{{ number_format($property->price) }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('properties.show', $property->slug) }}" class="w-full inline-flex items-center justify-center px-4 py-3 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-brand rounded-xl transition-all shadow-md">
                                        Explore Showroom
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- ── Section 2: Sold Out Properties ── --}}
        @if($soldOutProperties->isNotEmpty())
            <div class="scroll-reveal reveal-up">
                {{-- Section Heading --}}
                <div class="flex flex-wrap items-center gap-2 sm:gap-4 mb-6 sm:mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold uppercase tracking-widest bg-rose-50 text-rose-700 border border-rose-200 shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                        Sold Out
                    </span>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-serif font-extrabold text-slate-900 tracking-tight">Sold Out Properties</h2>
                    <div class="hidden sm:block flex-1 h-px bg-slate-200"></div>
                    <span class="text-xs sm:text-sm font-bold text-slate-400 shrink-0 ml-auto sm:ml-0">{{ $soldOutProperties->count() }} listing{{ $soldOutProperties->count() !== 1 ? 's' : '' }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($soldOutProperties as $property)
                        <div class="group bg-white rounded-2xl sm:rounded-[2rem] border border-slate-200/50 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 opacity-90">
                            {{-- Image --}}
                            <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                                @if($property->coverImage)
                                    <img src="{{ $property->coverImage->file_path }}" alt="{{ $property->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 grayscale-[30%]">
                                @else
                                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 text-sm">No Image</div>
                                @endif
                                <span class="absolute top-3 left-3 bg-rose-600 text-white px-2.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-md">
                                    Sold Out
                                </span>
                                @if($property->virtualTour)
                                    <span class="absolute bottom-3 right-3 bg-slate-950/80 backdrop-blur-sm text-brand-red-400 px-2.5 py-1 rounded-full text-xs font-extrabold uppercase tracking-wider flex items-center gap-1 shadow-md border border-white/5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-brand-red-400 animate-pulse"></span>
                                        <span class="hidden sm:inline">Virtual Tour</span>
                                        <span class="sm:hidden">Live</span>
                                    </span>
                                @endif
                            </div>

                            {{-- Body --}}
                            <div class="p-4 sm:p-6 flex flex-col gap-3 sm:gap-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs text-slate-400 uppercase tracking-widest font-extrabold">{{ $property->location->name }}</span>
                                    <h3 class="text-base sm:text-lg font-serif font-extrabold text-slate-900 group-hover:text-brand-red-500 transition-colors tracking-tight truncate">{{ $property->title }}</h3>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed font-medium line-clamp-2">{{ $property->description }}</p>

                                {{-- Stats Row --}}
                                <div class="flex items-center gap-3 sm:gap-4 text-xs text-slate-500 border-y border-slate-100 py-2.5 font-semibold">
                                    <span><strong class="text-slate-900">{{ $property->bedrooms }}</strong> Beds</span>
                                    <span><strong class="text-slate-900">{{ $property->bathrooms }}</strong> Baths</span>
                                    @if($property->floor_area)
                                        <span><strong class="text-slate-900">{{ $property->floor_area }}</strong> sqm</span>
                                    @endif
                                </div>

                                {{-- Sold-out CTA --}}
                                <div class="flex flex-col gap-2.5">
                                    <div class="flex flex-wrap justify-between items-center gap-2">
                                        <span class="text-xs font-extrabold uppercase tracking-wider text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full border border-rose-100 shrink-0">Sold Out</span>
                                        <a href="{{ \App\Models\Property::CONTACT_PHONE_TEL }}" class="text-xs font-extrabold text-brand-red-600 hover:text-brand-red-700 inline-flex items-center gap-1 transition-colors">
                                            <svg class="w-3.5 h-3.5 fill-none stroke-current shrink-0" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            {{ \App\Models\Property::CONTACT_PHONE }}
                                        </a>
                                    </div>
                                    <a href="{{ \App\Models\Property::CONTACT_PHONE_TEL }}" class="w-full inline-flex items-center justify-center gap-1.5 px-4 py-3 text-xs font-extrabold uppercase tracking-widest text-white bg-brand-red-500 hover:bg-brand-red-600 rounded-xl transition-all shadow-md">
                                        <svg class="w-3.5 h-3.5 fill-none stroke-current shrink-0" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        Contact Us
                                    </a>
                                    <a href="{{ route('properties.show', $property->slug) }}" class="w-full inline-flex items-center justify-center px-4 py-2 text-[11px] font-extrabold uppercase tracking-widest text-slate-500 hover:text-slate-900 transition-colors">
                                        View Showroom
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Empty state --}}
        @if($availableProperties->isEmpty() && $soldOutProperties->isEmpty())
            <div class="text-center py-16 sm:py-20 bg-white rounded-2xl sm:rounded-3xl border border-slate-100">
                <p class="text-slate-400 text-sm">No exclusive properties currently match your selected filters.</p>
            </div>
        @endif

        {{-- Pagination --}}
        <div class="mt-12 sm:mt-16 flex justify-center font-sans">
            {{ $properties->links() }}
        </div>
    </div>
</section>
@endsection
