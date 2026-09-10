@extends('layouts.public')

@section('title', $property->title . ' | ' . $property->location->name)

@section('content')
<!-- Section 1 — Premium Landing Hero -->
<div class="relative bg-slate-950 min-h-[75vh] md:min-h-[85vh] flex items-end overflow-hidden border-b border-slate-900 -mt-20 select-none"
     @if(str_contains($property->slug, 'lumiere'))
     x-data="{
         active: 0,
         slides: [
             { image: '{{ asset('docs/FRONT VIEW (NIGHT).png') }}', caption: 'Front Elevation — Warm timber cladding and precise architecture' },
             { image: '{{ asset('docs/LEFT SIDE VIEW (NIGHT).png') }}', caption: 'Left Side Elevation — Balanced, structural geometry' },
             { image: '{{ asset('docs/RIGHT SIDE VIEW (NIGHT).png') }}', caption: 'Right Side Elevation — Optimized window locations' },
             { image: '{{ asset('docs/BACK VIEW (NIGHT).png') }}', caption: 'Rear Elevation — Considered spatial layouts and glass openings' }
         ],
         init() {
             setInterval(() => {
                 this.active = (this.active + 1) % this.slides.length;
             }, 5000);
         }
     }"
     @endif
>
    <!-- Background Slides (Conditional for Lumiere) -->
    @if(str_contains($property->slug, 'lumiere'))
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="active === index"
                 x-transition:enter="transition ease-in-out duration-[2000ms] transform"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in-out duration-[2000ms] transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-0 w-full h-full z-0">
                <!-- BRIGHT images: opacity-95 and clear contrast overlay -->
                <img :src="slide.image" :alt="slide.caption" class="absolute inset-0 h-full w-full object-cover opacity-95 transition-all duration-[5000ms] ease-out" />
                <!-- Subtle bright-responsive gradient for premium legibility -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-slate-950/10 z-10"></div>
            </div>
        </template>
        
        <!-- Live Caption / View Indicator -->
        <div class="absolute top-24 right-4 md:right-8 bg-slate-950/70 border border-white/10 px-4.5 py-2.5 rounded-2xl backdrop-blur-md text-right text-[10px] md:text-xs text-slate-300 font-sans z-20 shadow-xl flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-amber-500/10 text-amber-400 border border-amber-500/20 font-extrabold uppercase tracking-wider" x-text="'View ' + (active + 1) + '/4'"></span>
            <span class="font-extrabold text-slate-100 tracking-wide" x-text="slides[active].caption"></span>
        </div>

        <!-- Carousel navigation bullet indicators -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20 flex gap-3">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="active = index" 
                        class="w-2.5 h-2.5 rounded-full transition-all duration-300 border border-white/30 focus:outline-none"
                        :class="active === index ? 'bg-amber-400 scale-125 shadow-[0_0_8px_#fbbf24]' : 'bg-white/40 hover:bg-white/60'"></button>
            </template>
        </div>
    @else
        <!-- Cover Image Background Fallback for other listings -->
        @if($property->coverImage)
            <div class="absolute inset-0 bg-cover bg-center opacity-60 z-0" style="background-image: url('{{ $property->coverImage->file_path }}');"></div>
        @else
            <div class="absolute inset-0 bg-slate-900 opacity-60 z-0"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10"></div>
    @endif
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 z-10 w-full animate-fade-in">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
            <!-- Property Meta & Actions -->
            <div class="lg:col-span-8 flex flex-col items-start gap-4 sm:gap-6">
                @if($property->virtualTour)
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-widest bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        Virtual Tour Available Now
                    </span>
                @endif
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-slate-400 uppercase tracking-widest font-extrabold font-sans text-left">{{ $property->location->name }}</span>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white tracking-tight leading-tight text-left">
                        {{ $property->title }}
                    </h1>
                </div>
                <p class="text-slate-300 text-sm sm:text-base max-w-2xl font-light leading-relaxed text-left">
                    {{ Str::limit($property->description, 200) }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto pt-2 font-sans">
                    @if($property->virtualTour)
                        <a href="#virtual-tour" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-slate-950 bg-amber-400 hover:bg-amber-500 active:scale-95 rounded-xl shadow-lg transition-all">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                            Take Virtual Tour
                        </a>
                    @endif
                    <a href="#schedule-inspection" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-white border border-white/20 hover:bg-white/10 rounded-xl backdrop-blur-sm transition-all shadow-md">
                        Schedule Physical Inspection
                    </a>
                </div>
            </div>
            <!-- Pricing / Details Summary -->
            <div class="lg:col-span-4 flex flex-col lg:items-end gap-2 text-left lg:text-right">
                <span class="text-sm text-slate-400 uppercase tracking-wider font-extrabold">Investment Value</span>
                @if($property->property_type === 'Shortlet')
                    <span class="text-3xl sm:text-4xl font-extrabold text-amber-500 font-sans">₦{{ number_format($property->price) }}<span class="text-sm font-bold text-slate-400">/night</span></span>
                @else
                    <span class="text-3xl sm:text-4xl font-extrabold text-amber-500 font-sans">
                        @if(str_contains($property->slug, 'lumiere'))
                            <span class="text-xs text-slate-400 uppercase block tracking-widest font-extrabold mb-1">Starting At</span>
                        @endif
                        ₦{{ number_format($property->price) }}
                    </span>
                @endif
                <span class="text-sm text-slate-500 font-semibold mt-1">Fully Serviced & Furnished Options Available</span>
            </div>
        </div>
    </div>
</div>

<!-- Section 2 — Property Architectural Summary -->
<section class="py-12 bg-white border-b border-slate-100 select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center divide-x divide-slate-100">
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Property Type</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->category->name }}</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Bedrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">
                    @if(str_contains($property->slug, 'lumiere'))
                        1 - 2 Ensuite
                    @else
                        {{ $property->bedrooms }} Ensuite
                    @endif
                </span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Bathrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">
                    @if(str_contains($property->slug, 'lumiere'))
                        1 - 3 Bathrooms
                    @else
                        {{ $property->bathrooms }} Bathrooms
                    @endif
                </span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Floor Area</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">
                    @if(str_contains($property->slug, 'lumiere'))
                        35 - 95 sqm
                    @else
                        {{ $property->floor_area ? $property->floor_area . ' sqm' : 'N/A' }}
                    @endif
                </span>
            </div>
            <div class="flex flex-col gap-1 items-center col-span-2 md:col-span-1 border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Purpose</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->property_type === 'Shortlet' ? 'Executive Shortlet' : 'For ' . $property->property_type }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 3 — The Virtual Walkthrough Experience (Conditional) -->
@if($property->virtualTour)
    <section id="virtual-tour" class="py-24 bg-slate-950 text-white relative overflow-hidden animate-fade-in">
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 select-none">
            <div class="text-center max-w-3xl mx-auto mb-16 flex flex-col items-center gap-4">
                <span class="text-amber-500 font-extrabold uppercase tracking-wider text-sm">A Digitized Showroom</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white">Walk Through Before You Visit</h2>
                <p class="text-slate-350 text-sm sm:text-base font-light">
                    Use your keyboard or mouse to look around, tap the hot spots on the floor to navigate rooms, and inspect every corner of the property in real-time.
                </p>
            </div>

            <!-- Professional iFrame Container -->
            <div class="relative rounded-[2rem] overflow-hidden aspect-video shadow-2xl bg-slate-900 border border-slate-800">
                <!-- Live Matterport/Embed Url from DB -->
                <iframe src="{{ $property->virtualTour->embed_url }}" class="absolute inset-0 w-full h-full border-0" allowfullscreen allow="xr-spatial-tracking"></iframe>
            </div>
            
            <div class="flex justify-center items-center gap-4 mt-8 text-sm text-slate-400">
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    Interactive 3D Technology Enabled
                </span>
                <span class="text-slate-700">|</span>
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Optimized for Mobile/Desktop WebGL
                </span>
            </div>
        </div>
    </section>
@endif

<!-- Section 4 — Narrative & Detailed Description -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Long Text description -->
            <div class="lg:col-span-8 flex flex-col gap-6">
                <span class="text-amber-600 font-extrabold tracking-widest text-sm uppercase block text-left">Property Overview</span>
                <h2 class="text-3xl font-serif text-slate-900 text-left">Architectural Narrative</h2>
                <p class="text-slate-600 leading-relaxed font-semibold text-base text-left">
                    {{ $property->description }}
                </p>
            </div>
            
            <!-- Side Specs panel -->
            <div class="lg:col-span-4 bg-slate-50 p-8 rounded-[2.2rem] border border-slate-200/40 flex flex-col gap-6 self-start select-none">
                <h3 class="text-lg font-extrabold text-slate-900 text-left">Showroom Identity</h3>
                <div class="space-y-4 text-sm font-semibold">
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Listing Status</span>
                        <span class="font-extrabold text-emerald-600 uppercase text-sm">{{ $property->status }}</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Reference ID</span>
                        <span class="font-extrabold text-slate-900 font-sans text-sm">#DR-{{ str_pad($property->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Listed Date</span>
                        <span class="font-extrabold text-slate-900 text-sm">{{ $property->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4.5 — A Collection of Modern Spaces (Conditional for Lumiere Master Project) -->
@if(str_contains($property->slug, 'lumiere'))
    <section class="py-24 bg-slate-50 border-t border-b border-slate-100 select-none animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col gap-3 text-center max-w-2xl mx-auto mb-16 scroll-reveal reveal-up">
                <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Apartment Types</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">A Collection of Modern Spaces</h2>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Each unit is meticulously designed for luxury, space efficiency, and modern mainland living.</p>
            </div>

            <!-- 3-Column Suite Layouts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Suite 1: Studio Apartment -->
                <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform scroll-reveal reveal-up">
                    <div class="relative aspect-[1.4] overflow-hidden bg-slate-200 z-0">
                        <img src="{{ asset('docs/INT 1.png') }}" alt="Studio Suite Interior" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-amber-400 text-slate-950 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shadow-md">Studio Apartment</span>
                    </div>
                    <div class="p-8 flex flex-col gap-4">
                        <div class="flex flex-col gap-1 text-left font-sans">
                            <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest">Model Specifications</span>
                            <h4 class="text-xl font-serif font-extrabold text-slate-900">Lumière Studio Suite</h4>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold text-left">Compact, refined, and fully appointed. Features an optimized open-concept layout, fully integrated fitted kitchen, and luxury bath. An exceptionally smart choice for solo living or shortlet investments.</p>
                        
                        <div class="flex items-center gap-4 text-[11px] text-slate-400 border-y border-slate-100 py-3 font-sans font-extrabold justify-start">
                            <span>1 Bed</span>
                            <span>•</span>
                            <span>1 Bath</span>
                            <span>•</span>
                            <span>35 sqm</span>
                        </div>

                        <!-- Price / Financing stack -->
                        <div class="flex flex-col gap-3 font-sans text-left mt-1">
                            <div class="flex justify-between items-baseline border-b border-slate-100 pb-2">
                                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Outright Purchase</span>
                                <span class="text-base font-extrabold text-slate-900">₦45,000,000</span>
                            </div>
                            <div class="flex flex-col gap-1.5 p-4 rounded-xl bg-slate-50 border border-slate-100 text-[11px] font-semibold text-slate-505">
                                <span class="text-[9px] font-extrabold uppercase tracking-wider text-amber-600">6-Month Installment Plan</span>
                                <div class="flex justify-between mt-1">
                                    <span>Total Price:</span>
                                    <strong class="text-slate-900">₦47,250,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Deposit (30%):</span>
                                    <strong class="text-slate-900">₦14,175,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Monthly Payment:</span>
                                    <strong class="text-brand">₦5,512,500/mo</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suite 2: Mini Flat -->
                <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform scroll-reveal reveal-up delay-100">
                    <div class="relative aspect-[1.4] overflow-hidden bg-slate-200 z-0">
                        <img src="{{ asset('docs/INT 2.png') }}" alt="Mini Flat Interior" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-amber-400 text-slate-950 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shadow-md">Mini Flat (1-Bed)</span>
                    </div>
                    <div class="p-8 flex flex-col gap-4">
                        <div class="flex flex-col gap-1 text-left font-sans">
                            <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest">Model Specifications</span>
                            <h4 class="text-xl font-serif font-extrabold text-slate-900">Lumière Mini Flat</h4>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold text-left">A spacious, beautifully appointed mini flat. Boasts a premium bedroom ensuite, an extensive open-concept living area, a fitted kitchen, a guest powder room, and a private terrace designed to let life flow.</p>
                        
                        <div class="flex items-center gap-4 text-[11px] text-slate-400 border-y border-slate-100 py-3 font-sans font-extrabold justify-start">
                            <span>1 Bed</span>
                            <span>•</span>
                            <span>2 Baths</span>
                            <span>•</span>
                            <span>60 sqm</span>
                        </div>

                        <!-- Price / Financing stack -->
                        <div class="flex flex-col gap-3 font-sans text-left mt-1">
                            <div class="flex justify-between items-baseline border-b border-slate-100 pb-2">
                                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Outright Purchase</span>
                                <span class="text-base font-extrabold text-slate-900">₦70,000,000</span>
                            </div>
                            <div class="flex flex-col gap-1.5 p-4 rounded-xl bg-slate-50 border border-slate-100 text-[11px] font-semibold text-slate-505">
                                <span class="text-[9px] font-extrabold uppercase tracking-wider text-amber-600">6-Month Installment Plan</span>
                                <div class="flex justify-between mt-1">
                                    <span>Total Price:</span>
                                    <strong class="text-slate-900">₦73,500,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Deposit (30%):</span>
                                    <strong class="text-slate-900">₦22,050,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Monthly Payment:</span>
                                    <strong class="text-brand">₦8,575,000/mo</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suite 3: 2-Bedroom -->
                <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform scroll-reveal reveal-up delay-200">
                    <div class="relative aspect-[1.4] overflow-hidden bg-slate-200 z-0">
                        <img src="{{ asset('docs/INT 3.png') }}" alt="2-Bedroom Interior" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-amber-400 text-slate-950 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shadow-md">2-Bedroom</span>
                    </div>
                    <div class="p-8 flex flex-col gap-4">
                        <div class="flex flex-col gap-1 text-left font-sans">
                            <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest">Model Specifications</span>
                            <h4 class="text-xl font-serif font-extrabold text-slate-900">Lumière 2-Bedroom</h4>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold text-left">The crown jewel layout of Lumière Suites. Boasts dual master en-suite bedrooms, an expansive light-filled living area, a premium fully-fitted kitchen, guest bathroom, and private outdoor terrace.</p>
                        
                        <div class="flex items-center gap-4 text-[11px] text-slate-400 border-y border-slate-100 py-3 font-sans font-extrabold justify-start">
                            <span>2 Beds</span>
                            <span>•</span>
                            <span>3 Baths</span>
                            <span>•</span>
                            <span>95 sqm</span>
                        </div>

                        <!-- Price / Financing stack -->
                        <div class="flex flex-col gap-3 font-sans text-left mt-1">
                            <div class="flex justify-between items-baseline border-b border-slate-100 pb-2">
                                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Outright Purchase</span>
                                <span class="text-base font-extrabold text-slate-900">₦90,000,000</span>
                            </div>
                            <div class="flex flex-col gap-1.5 p-4 rounded-xl bg-slate-50 border border-slate-100 text-[11px] font-semibold text-slate-505">
                                <span class="text-[9px] font-extrabold uppercase tracking-wider text-amber-600">6-Month Installment Plan</span>
                                <div class="flex justify-between mt-1">
                                    <span>Total Price:</span>
                                    <strong class="text-slate-900">₦94,500,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Deposit (30%):</span>
                                    <strong class="text-slate-900">₦28,350,000</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Monthly Payment:</span>
                                    <strong class="text-brand">₦11,025,000/mo</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endif

<!-- Section 5 — Elite Amenities -->
@if($property->amenities->count() > 0)
    <section class="py-24 bg-slate-50 border-t border-slate-100 select-none">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-12">
            <div class="flex flex-col gap-3">
                <span class="text-amber-600 font-extrabold tracking-widest text-sm uppercase block text-left">Serviced Conveniences</span>
                <h2 class="text-3xl font-serif text-slate-900 text-left">World-Class Signature Amenities</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
                @foreach($property->amenities as $amenity)
                    <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                            <!-- Star/Spark icon -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div class="text-left font-sans">
                            <h4 class="text-slate-900 font-extrabold text-sm">{{ $amenity->name }}</h4>
                            <p class="text-xs text-slate-400 mt-0.5 font-bold">Fully Serviced</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Conditional Lumière Frequently Asked Questions Section (Vetted Brochure FAQ) -->
@if(str_contains($property->slug, 'lumiere'))
    <section class="py-24 bg-white border-t border-b border-slate-150 select-none animate-fade-in">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col gap-3 text-center max-w-2xl mx-auto mb-16 scroll-reveal reveal-up">
                <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Clarifications Hub</span>
                <h2 class="text-3xl font-serif text-slate-900 tracking-tight leading-none">Lumière Suites FAQ</h2>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Everything you need to know about purchasing and managing your Lumière Suites apartment.</p>
            </div>

            <!-- 2-Column Accordion Grid list (Alpine.js powered) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start font-sans" x-data="{ activeFaq: null }">
                
                <!-- Column 1 -->
                <div class="flex flex-col gap-4">
                    
                    <!-- FAQ 1 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 1 ? activeFaq = null : activeFaq = 1">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Where is Lumière Suites located?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 1 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 1" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Lumière Suites is strategically located in Surulere, Lagos, with exceptionally easy access to major parts of both the Mainland and the Island (~5 mins to Oshodi, ~10 mins to Lagos Island, and ~15 mins to Ikeja).</p>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 2 ? activeFaq = null : activeFaq = 2">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">What exactly am I purchasing?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 2 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 2" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">You are purchasing an off-plan apartment at Lumière Suites. Upon structural completion and final finishing, the apartment becomes your absolute personal property with full legal titles.</p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 3 ? activeFaq = null : activeFaq = 3">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">What is the required initial deposit?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 3 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 3" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">A 30 percent initial deposit is required on our off-plan units (e.g. ₦14.175M for Studio, ₦22.05M for Mini Flat, and ₦28.35M for 2-Bed), with the remaining balance spread comfortably over our interest-free 6-month payment plan.</p>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 4 ? activeFaq = null : activeFaq = 4">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Is the land free from encumbrances?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 4 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 4" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Yes, absolutely. The land is completely free from government acquisition, has zero family land disputes, and has been thoroughly audited by our corporate legal team.</p>
                        </div>
                    </div>

                    <!-- FAQ 9 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 9 ? activeFaq = null : activeFaq = 9">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">What documents will I receive after payment?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 9 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 9" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Upon complete purchase and payment of documentation fee, you will receive your payment receipts, Registered Survey for the unit purchased, and the Deed of Assignment. For installment plans, you receive payment receipts for every milestone payment made.</p>
                        </div>
                    </div>

                </div>

                <!-- Column 2 -->
                <div class="flex flex-col gap-4">
                    
                    <!-- FAQ 5 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 5 ? activeFaq = null : activeFaq = 5">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">When will the apartments be delivered?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 5 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 5" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Construction timelines are strictly tracked and communicated directly to all subscribers. Regular, transparent progress newsletters and site walkthrough updates are provided.</p>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 6 ? activeFaq = null : activeFaq = 6">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Can the apartment be used for short-let?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 6 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 6" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Yes, absolutely. Owners have the complete legal freedom to utilize their apartments for either long-term rental portfolios or high-yielding serviced short-let purposes.</p>
                        </div>
                    </div>

                    <!-- FAQ 7 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 7 ? activeFaq = null : activeFaq = 7">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Who manages the property after completion?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 7 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 7" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">A professional, dedicated in-house facilities management team oversees all maintenance of common areas, water treatment, waste disposal, power distribution, and general estate safety.</p>
                        </div>
                    </div>

                    <!-- FAQ 8 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 8 ? activeFaq = null : activeFaq = 8">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Are there additional documentation fees?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 8 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 8" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">There is a flat documentation fee of ₦1,750,000 per apartment which covers your Registered Survey and Deed of Assignment. There will be an annual serviced facility charge communicated upon handover.</p>
                        </div>
                    </div>

                    <!-- FAQ 10 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 10 ? activeFaq = null : activeFaq = 10">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">What happens after completing all payments?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 10 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 10" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Upon completing all payments, you will receive all relevant physical and digital documentation along with formal confirmation of ownership and unit allocation.</p>
                        </div>
                    </div>

                    <!-- FAQ 11 -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/50 p-6 cursor-pointer transition-all duration-300 hover:shadow-md"
                         @click="activeFaq === 11 ? activeFaq = null : activeFaq = 11">
                        <div class="flex justify-between items-center gap-4 text-left">
                            <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">How do I get started?</h4>
                            <span class="text-slate-400 font-bold transition-transform duration-300" :class="activeFaq === 11 ? 'rotate-180' : ''">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </div>
                        <div x-show="activeFaq === 11" x-transition.scale.origin.top class="mt-4 pt-4 border-t border-slate-200/50 text-left" style="display: none;">
                            <p class="text-sm text-slate-650 leading-relaxed font-semibold">Simply contact Darall Homes (call, WhatsApp or email) to receive full purchase details, schedule a private site visit, and begin your unit acquisition process.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endif

<!-- Section 6 — Property Conversion Engine & Schedule Form -->
<section id="schedule-inspection" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Call to Action Info -->
        <div class="lg:col-span-5 flex flex-col gap-6 justify-center">
            <span class="text-amber-600 font-extrabold uppercase tracking-widest text-sm block text-left">Begin Your Acquisition</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 text-left">Interested in this property?</h2>
            <p class="text-slate-550 font-semibold leading-relaxed text-base text-left">
                Schedule a private physical tour, submit a structured enquiry to our corporate legal team, or start a direct, immediate chat with our designated private agent on WhatsApp.
            </p>
            
            <div class="flex flex-col gap-4 mt-4 font-sans">
                @if(str_contains($property->slug, 'lumiere'))
                    <a href="https://wa.me/2349111555511" class="inline-flex items-center justify-center gap-2 px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-emerald-600 hover:bg-emerald-500 rounded-2xl shadow-md transition-colors duration-200">
                        Chat on WhatsApp (+234 911 155 5511)
                    </a>
                @else
                    <a href="https://wa.me/234800darallhomes" class="inline-flex items-center justify-center gap-2 px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-emerald-600 hover:bg-emerald-500 rounded-2xl shadow-md transition-colors duration-200">
                        Chat on WhatsApp
                    </a>
                @endif
            </div>
        </div>

        <!-- Dynamic Booking / Inspection Form Panel -->
        @if($property->property_type === 'Shortlet')
            <!-- Shortlet Reservation Form (Dynamic Pricing Calendar powered by Alpine.js) -->
            <div class="lg:col-span-7 bg-slate-50 rounded-[2.5rem] border border-slate-200/50 p-8 sm:p-10 shadow-sm"
                 x-data="{
                    checkIn: '',
                    checkOut: '',
                    nightlyPrice: {{ $property->price }},
                    getNights() {
                        if (!this.checkIn || !this.checkOut) return 0;
                        let start = new Date(this.checkIn);
                        let end = new Date(this.checkOut);
                        let diff = end - start;
                        return Math.max(0, Math.ceil(diff / (1000 * 60 * 60 * 24)));
                    }
                 }">
                <h3 class="text-2xl font-serif text-slate-900 mb-2 font-sans font-extrabold text-left tracking-tight">Reserve Luxury Stay</h3>
                <p class="text-sm text-slate-500 mb-8 font-sans font-semibold text-left">Select check-in and checkout dates to calculate rates and request a private booking.</p>
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Your Name</label>
                            <input type="text" name="customer_name" required value="{{ old('customer_name', auth()->user()->name ?? '') }}" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_name')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Email Address</label>
                            <input type="email" name="customer_email" required value="{{ old('customer_email', auth()->user()->email ?? '') }}" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_email')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Phone Number</label>
                            <input type="tel" name="customer_phone" required value="{{ old('customer_phone') }}" placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_phone')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2 text-left">
                                <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Check-In</label>
                                <input type="date" name="check_in_date" required x-model="checkIn" min="{{ date('Y-m-d') }}" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold">
                                @error('check_in_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col gap-2 text-left">
                                <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Checkout</label>
                                <input type="date" name="check_out_date" required x-model="checkOut" :min="checkIn ? checkIn : '{{ date('Y-m-d') }}'" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold">
                                @error('check_out_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Number of Guests</label>
                            <select name="guests_count" required class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5+ Guests</option>
                            </select>
                            @error('guests_count')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Special Requests / Notes</label>
                        <textarea name="notes" rows="3" placeholder="Airport pick-up requested, or high-floor preferences..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">{{ old('notes') }}</textarea>
                        @error('notes')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>

                    <!-- Dynamic pricing calculator panel (rendered smoothly via Alpine.js) -->
                    <div x-show="getNights() > 0" x-transition.opacity style="display: none;" class="p-5 bg-slate-100/60 border border-slate-200/40 rounded-2xl flex flex-col gap-2.5 font-sans">
                        <div class="flex justify-between text-slate-500 text-sm">
                            <span>Nightly Rate</span>
                            <span class="font-extrabold text-slate-900">₦{{ number_format($property->price) }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500 text-sm">
                            <span>Stay Duration</span>
                            <span class="font-extrabold text-slate-900" x-text="getNights() + ' night(s)'"></span>
                        </div>
                        <hr class="border-slate-200/60 my-1">
                        <div class="flex justify-between text-slate-900 font-extrabold text-sm">
                            <span>Estimated Booking Value</span>
                            <span class="text-brand">₦<span x-text="new Intl.NumberFormat().format(getNights() * nightlyPrice)"></span></span>
                        </div>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md">
                        Reserve Stay Now
                    </button>
                </form>
            </div>
        @else
            <!-- Standard Inspection Request Form Form (Connected to book route!) -->
            <div class="lg:col-span-7 bg-slate-50 rounded-[2.5rem] border border-slate-200/50 p-8 sm:p-10 shadow-sm">
                <h3 class="text-2xl font-serif text-slate-900 mb-6 font-sans font-extrabold text-left tracking-tight">Schedule Private Inspection</h3>
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('properties.book', $property->slug) }}" method="POST" class="space-y-6">
                    @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Your Name</label>
                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('name')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Email Address</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('email')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Phone Number</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('phone')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Preferred Date</label>
                            <input type="date" name="requested_date" required value="{{ old('requested_date') }}" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold animate-fade-in">
                            @error('requested_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Preferred Time</label>
                            <select name="requested_time" required class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                                <option value="Morning" {{ old('requested_time') === 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Afternoon" {{ old('requested_time') === 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                <option value="Evening" {{ old('requested_time') === 'Evening' ? 'selected' : '' }}>Evening</option>
                            </select>
                            @error('requested_time')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-left">
                    <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Additional Message / Inquiries</label>
                    <textarea name="notes" rows="4" placeholder="Would love to request a dusk viewing for sunset analysis..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">{{ old('notes') }}</textarea>
                    @error('notes')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md">
                    Submit Request
                </button>
            </form>
        </div>
        @endif

    </div>
</section>
@endsection
