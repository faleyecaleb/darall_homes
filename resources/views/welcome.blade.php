@extends('layouts.public')

@section('title', 'Find a Property You Can Experience Before You Visit')

@section('content')

<!-- 1. FULL SCREEN CINEMATIC HERO CAROUSEL (hoomeee x Cognify World-Class Experience) -->
<div class="relative w-screen h-screen bg-slate-950 overflow-hidden flex items-center select-none"
     x-data="{
        active: 0,
        slides: [
            {
                title: 'Lumière Suites',
                heading_start: 'Own the Future of',
                heading_highlight: 'Surulere Luxury',
                subtitle: 'Exquisite Mainland Off-Plan Residences',
                price: 'Starting at ₦45,000,000',
                image: '/lumiere/front-view-night.png',
                description: 'Step into structural precision and modern elegance in Surulere. A master-planned development of 9 premium suites offering uncompromised title safety and flexible payment plans.',
                link: '/properties/lumiere-suites'
            },
            {
                title: 'The Zenith Suite',
                heading_start: 'Experience Executive',
                heading_highlight: 'Shortlet Stays',
                subtitle: 'Exquisite Executive Shortlet Stays',
                price: '₦120,000 / Night',
                image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1920&q=80',
                description: 'Skip the blind appointments. Experience immersive 3D virtual walkthroughs of our premier executive suite in Victoria Island, Lagos.',
                link: '/properties/the-zenith-suite'
            },
            {
                title: 'The Obsidian Penthouse',
                heading_start: 'Elevate to Sovereign',
                heading_highlight: 'Smart Living',
                subtitle: 'Masterfully Engineered Smart Living',
                price: '₦350,000,000',
                image: 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80',
                description: 'Step into double-height ceilings, smart automated layouts, and the pinnacle of modern mainland luxury in Lekki Phase 1.',
                link: '/properties/the-obsidian-penthouse'
            },
            {
                title: 'The Aria Mansion',
                heading_start: 'Step into Legacy',
                heading_highlight: 'Colonial Elegance',
                subtitle: 'A Magnificently Crafted Oasis',
                price: '₦650,000,000',
                image: 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1920&q=80',
                description: 'Indulge in a private internal elevator, heated swimming pool, and unparalleled colonial elegance in Old Ikoyi, Lagos.',
                link: '/properties/the-aria-mansion'
            }
        ],
        init() {
            // Auto slide rotation every 8 seconds (luxury pacing)
            setInterval(() => {
                this.active = (this.active + 1) % this.slides.length;
            }, 8000);
        }
     }">

    <!-- Loop Background Slider Images with Zoom-Pacing Animations (z-0 to overlay correctly) -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="active === index"
             x-transition:enter="transition ease-in-out duration-[2000ms] transform"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in-out duration-[2000ms] transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0 w-full h-full z-0">
            <!-- Backdrop Image -->
            <img :src="slide.image" :alt="slide.title" class="absolute inset-0 h-full w-full object-cover opacity-50 mix-blend-multiply scale-105 hover:scale-100 transition-transform duration-[8000ms] ease-out" />
            <!-- Luxury dark gradient overlays -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-slate-950/20 z-10"></div>
        </div>
    </template>

    <!-- Staggered Content Details Panel (z-20) -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center h-full pt-28 z-20">
        <div class="max-w-3xl flex flex-col gap-8 text-left z-20">
            
            <!-- Animated Badge wrapper with active glow -->
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 w-max backdrop-blur-md animate-fade-in">
                <span class="h-1.5 w-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-[9px] font-extrabold uppercase tracking-widest text-slate-200">A New Standard of Luxury Real Estate</span>
            </div>

            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="active === index" class="flex flex-col gap-6" style="display: none;">
                    
                    <!-- Subtitle -->
                    <span x-text="slide.subtitle"
                          class="text-amber-400 text-xs sm:text-sm font-bold uppercase tracking-widest block transform translate-y-2 animate-slide-up duration-500"></span>
                    
                    <!-- Premium Copwriting Headlines (Fully Custom & Symmetrical) -->
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-[1.08] transform translate-y-3 animate-slide-up duration-700">
                        <span x-text="slide.heading_start"></span> <span class="text-amber-400 italic" x-text="slide.heading_highlight"></span>
                    </h1>

                    <!-- Description -->
                    <p x-text="slide.description"
                       class="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed font-light transform translate-y-4 animate-slide-up duration-1000"></p>

                    <!-- CTA Action triggers with delayed entrance -->
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto pt-4 transform translate-y-5 animate-slide-up duration-1000 delay-100">
                        <a :href="slide.link" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-slate-950 bg-amber-400 hover:bg-amber-500 rounded-xl shadow-lg shadow-amber-500/10 hover:scale-[1.03] active:scale-[0.97] transition-all duration-300">
                            Explore Showroom
                        </a>
                        <a href="#virtual-experience" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-white border border-white/20 hover:bg-white/10 rounded-xl backdrop-blur-sm transition-all duration-300">
                            Take a Virtual Tour
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Carousel Progress dots and indicator buttons (Bottom aligned) -->
    <div class="absolute bottom-10 left-0 right-0 z-30 flex justify-center items-center gap-3 select-none">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="active = index" 
                    class="h-2 rounded-full transition-all duration-500"
                    :class="active === index ? 'w-8 bg-amber-400' : 'w-2.5 bg-white/30 hover:bg-white/60'"></button>
        </template>
    </div>

</div>

<!-- 2. SCROLL REVEAL IMMERSION HIGHLIGHT SECTION -->
<section id="virtual-experience" class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Text details - slides in from the Left -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Interactive Immersion</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">
                    Don't Just View the Property. Experience It.
                </h2>
                <p class="text-slate-600 leading-relaxed font-light text-base">
                    Traditional online property hunting consists of flat, misleading photographs. Darall Homes transforms your discovery phase by integrating fully responsive 360-degree Matterport walkthroughs.
                </p>
                <div class="space-y-6 pt-6 border-t border-slate-100 mt-2">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-extrabold text-sm font-sans mb-1 uppercase tracking-wider">True-to-Scale Dimensions</h4>
                            <p class="text-sm text-slate-500 leading-relaxed">Understand ceiling heights, spatial arrangements, and room connections directly inside our immersive visual environments.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-extrabold text-sm font-sans mb-1 uppercase tracking-wider">Save Valued Hours</h4>
                            <p class="text-sm text-slate-555 leading-relaxed">Eliminate physical traffic and disappointing appointments by shortlisting and vetting properties you've already walked through.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Video Placeholder - slides in from the Right -->
            <div class="relative rounded-3xl overflow-hidden aspect-video shadow-2xl bg-slate-950 border border-slate-800/20 scroll-reveal reveal-right delay-100">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1000&q=80" alt="Virtual Walkthrough Preview" class="absolute inset-0 w-full h-full object-cover opacity-80">
                <div class="absolute inset-0 bg-slate-950/20 flex items-center justify-center">
                    <button class="w-20 h-20 rounded-full bg-amber-400 hover:bg-amber-500 text-slate-950 flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-transform duration-300">
                        <!-- Play / View Icon -->
                        <svg class="w-8 h-8 fill-current ml-1" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. FEATURED PROPERTIES PREVIEW SECTION ("Curated Collections" - Directly below Immersion!) -->
<section class="py-32 bg-slate-50 border-t border-b border-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header - Slides Upward -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-20 scroll-reveal reveal-up">
            <div class="flex flex-col gap-4">
                <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Curated Collections</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Featured Real Estate</h2>
            </div>
            <a href="{{ route('properties.index') }}" class="group flex items-center gap-2 text-xs font-extrabold uppercase tracking-widest text-amber-600 hover:text-amber-700 transition-colors">
                View All Available Properties
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <!-- Cards Grid List - Slides Upward with Staggered Delays! -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredProperties as $index => $property)
                <div class="group bg-white rounded-[2.5rem] border border-slate-200/50 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up"
                     :class="'delay-' + (($index + 1) * 100)">
                     
                    <!-- Cover image wrapper -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-200 z-0">
                        @if($property->coverImage)
                            <img src="{{ $property->coverImage->file_path }}" alt="{{ $property->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                        @endif
                        
                        <!-- Badges tags -->
                        <span class="absolute top-4 left-4 bg-amber-400 text-slate-950 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-sm">
                            {{ $property->property_type === 'Shortlet' ? 'Shortlet' : 'For ' . $property->property_type }}
                        </span>
                        
                        @if($property->virtualTour)
                            <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider flex items-center gap-1.5 shadow-sm border border-white/5">
                                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour
                            </span>
                        @endif
                    </div>

                    <!-- Card description content -->
                    <div class="p-8 flex flex-col gap-5">
                        <div class="flex flex-col gap-1 font-sans">
                            <span class="text-sm text-slate-400 uppercase tracking-widest font-extrabold text-left">{{ $property->location->name }}</span>
                            <h3 class="text-lg font-serif font-extrabold text-slate-900 mt-1 tracking-tight truncate text-left">{{ $property->title }}</h3>
                        </div>
                        
                        <!-- Specifications highlights row -->
                        <div class="flex items-center gap-4 text-sm font-semibold text-slate-400 py-3 border-y border-slate-100">
                            <div class="flex items-center gap-1.5">
                                <span class="text-slate-650 font-extrabold text-sm">{{ $property->bedrooms }}</span> Beds
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-slate-650 font-extrabold text-sm">{{ $property->bathrooms }}</span> Baths
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-slate-650 font-extrabold text-sm">{{ $property->floor_area ? number_format($property->floor_area) . ' sqm' : 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- Dynamic Pricing & Button row (Using modern stacked alignment) -->
                        <div class="flex flex-col gap-4 mt-2">
                            <div class="flex justify-between items-baseline font-sans">
                                <span class="text-xs font-extrabold uppercase tracking-wider text-slate-400">Rate Valuation</span>
                                @if($property->property_type === 'Shortlet')
                                    <span class="text-lg font-extrabold text-slate-900">₦{{ number_format($property->price) }}<span class="text-xs text-slate-400 font-bold">/night</span></span>
                                @else
                                    <span class="text-lg font-extrabold text-[#0d6e60]">₦{{ number_format($property->price) }}</span>
                                @endif
                            </div>
                            <a href="{{ route('properties.show', $property->slug) }}" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-slate-900 bg-slate-50 group-hover:bg-brand group-hover:text-white rounded-xl transition-all shadow-md">
                                Explore Showroom
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty placeholder grid slot -->
                <div class="col-span-3 text-center text-slate-400 font-bold py-16">
                    No properties currently flagged as featured in database.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 4. INTERACTIVE LAGOS YIELD & ROI CALCULATOR SECTION -->
<section class="py-32 bg-[#1c1c1e] text-white overflow-hidden relative select-none">
    <!-- Overlay details -->
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-[#1c1c1e] to-slate-950/90 -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Info Block: Why Numbers Matter -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-amber-400 font-extrabold tracking-widest text-xs uppercase block">Consultative Wealth Advisory</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white leading-tight tracking-tight">
                    Perform Real-Time Investment Intelligence.
                </h2>
                <p class="text-slate-300 leading-relaxed font-light text-base">
                    In high-ticket luxury real estate, acquisitions are backed by strong financial analytics. Lagos remains one of the world's highest-yielding real-estate territories, driven by unmatched capital appreciation and serviced shortlet stay occupancy cashflows.
                </p>
                <p class="text-sm text-slate-400 leading-relaxed font-semibold">
                    Slide your target investment capital in the calculator widget to calculate projected yields in Lekki, Old Ikoyi, and Victoria Island.
                </p>
                
                <div class="flex flex-wrap gap-4 mt-4 text-xs font-semibold text-slate-300">
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-sm">
                        <span class="text-amber-400 font-bold">•</span> Traditional Yield: 6.5% - 8.5%
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-sm">
                        <span class="text-amber-400 font-bold">•</span> Shortlet Yield: 12% - 16%
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/5 border border-white/10 text-sm">
                        <span class="text-amber-400 font-bold">•</span> Annual Appreciation: 15% - 20%
                    </div>
                </div>
            </div>

            <!-- Right Interactive Calculator Card (Alpine.js powered) -->
            <div class="bg-white text-slate-800 rounded-[2.5rem] p-8 sm:p-10 border border-slate-100 shadow-2xl flex flex-col gap-6 scroll-reveal reveal-right delay-100"
                 x-data="{
                    capital: 150000000, // Default 150 Million Naira
                    getRentalYield() {
                        return this.capital * 0.075; // 7.5% Average Net Rental Yield
                    },
                    getShortletYield() {
                        return this.capital * 0.135; // 13.5% Average Shortlet Yield
                    },
                    getAppreciation() {
                        return this.capital * 2.28; // 5-Year Capital Appreciation (approx. 2.28x at 18% compound YoY)
                    }
                 }">
                
                <div class="flex flex-col text-left">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Interactive Wealth Slider</span>
                    <h3 class="text-xl font-extrabold text-slate-900 mt-1 font-sans tracking-tight">Financial Yield Projection</h3>
                </div>

                <!-- Input capital slider -->
                <div class="flex flex-col gap-3 pt-2">
                    <div class="flex justify-between items-baseline font-sans">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Your Capital</span>
                        <span class="text-2xl font-extrabold text-brand">₦<span x-text="new Intl.NumberFormat().format(capital)"></span></span>
                    </div>
                    <input type="range" 
                           x-model="capital" 
                           min="50000000" 
                           max="1000000000" 
                           step="10000000" 
                           class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-brand focus:outline-none" />
                    <div class="flex justify-between text-[11px] text-slate-400 font-extrabold font-sans">
                        <span>MIN: ₦50M</span>
                        <span>MAX: ₦1.0B</span>
                    </div>
                </div>

                <hr class="border-slate-100 my-1">

                <!-- Dynamic calculated yields rows -->
                <div class="flex flex-col gap-4 font-sans text-xs">
                    
                    <!-- Projection 1: Traditional Rental Yield -->
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                        <div class="flex flex-col text-left">
                            <span class="font-extrabold text-slate-900 text-sm">₦<span x-text="new Intl.NumberFormat().format(Math.round(getRentalYield()))"></span></span>
                            <span class="text-xs text-slate-400 font-semibold mt-0.5">Projected Annual Traditional Rental Yield (7.5%)</span>
                        </div>
                        <span class="h-2.5 w-2.5 rounded-full bg-blue-500 shadow-sm shadow-blue-500/20"></span>
                    </div>

                    <!-- Projection 2: Serviced Shortlet Stay Yield -->
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                        <div class="flex flex-col text-left">
                            <span class="font-extrabold text-[#0d6e60] text-sm">₦<span x-text="new Intl.NumberFormat().format(Math.round(getShortletYield()))"></span></span>
                            <span class="text-xs text-slate-400 font-semibold mt-0.5">Projected Annual Serviced Shortlet Yield (13.5%)</span>
                        </div>
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/20 animate-pulse"></span>
                    </div>

                    <!-- Projection 3: 5-Year Capital Appreciation -->
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                        <div class="flex flex-col text-left">
                            <span class="font-extrabold text-slate-900 text-sm">₦<span x-text="new Intl.NumberFormat().format(Math.round(getAppreciation()))"></span></span>
                            <span class="text-xs text-slate-400 font-semibold mt-0.5">Estimated Capital Value in 5 Years (+18% YoY compound)</span>
                        </div>
                        <span class="h-2.5 w-2.5 rounded-full bg-amber-500 shadow-sm shadow-amber-500/20"></span>
                    </div>
                </div>

                <a href="{{ route('properties.index') }}" 
                   class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md mt-1">
                    Find Properties Matching My Budget
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 5. LAGOS LUXURY ENCLAVES SECTION -->
<section class="py-32 bg-white overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col gap-4 text-center max-w-2xl mx-auto mb-20 scroll-reveal reveal-up">
            <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Prestigious Addresses</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Lagos Luxury Enclaves</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">Explore the prestigious communities that define our curated portfolio—offering premier security, high-yield cashflows, and exquisite architecture.</p>
        </div>

        <!-- Asymmetrical Enclaves Grid List -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Enclave 1: Old Ikoyi -->
            <div class="group h-[450px] rounded-[2.5rem] overflow-hidden border border-slate-200/50 shadow-sm relative flex flex-col justify-end p-8 sm:p-10 hover:shadow-xl transition-all duration-500 scroll-reveal reveal-up">
                <!-- Background Image with hover zoom-slow scale (z-0) -->
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80" 
                     alt="Old Ikoyi Landscape" 
                     class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-[6000ms] ease-out z-0" />
                
                <!-- Dark glassmorphic vignette gradients (z-10) -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent z-10"></div>

                <!-- Card Content (z-20) -->
                <div class="flex flex-col gap-4 text-left z-20 font-sans">
                    <div class="flex items-center gap-2 px-2.5 py-1 rounded-full bg-amber-500/20 border border-amber-500/20 w-max backdrop-blur-md">
                        <span class="text-amber-400 font-extrabold text-[9px] uppercase tracking-widest">+18.5% YoY Appreciation</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-serif font-extrabold text-white leading-tight">Old Ikoyi</h3>
                        <p class="text-xs text-slate-300 font-bold mt-1 uppercase tracking-wider">Serene, Historic & Prestigious</p>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed font-semibold">The undisputed heart of Nigerian old-money prestige. Leafy, tranquil, and home to legacy estates.</p>
                    
                    <a href="{{ route('properties.index', ['location_id' => $ikoyiLocation->id ?? '']) }}" 
                       class="mt-2 w-full flex items-center justify-between px-5 py-3.5 text-xs font-extrabold uppercase tracking-widest text-slate-900 bg-white group-hover:bg-amber-400 rounded-xl transition-all duration-300 text-left">
                        <span>Discover Ikoyi Spaces</span>
                        <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Enclave 2: Victoria Island -->
            <div class="group h-[450px] rounded-[2.5rem] overflow-hidden border border-slate-200/50 shadow-sm relative flex flex-col justify-end p-8 sm:p-10 hover:shadow-xl transition-all duration-500 scroll-reveal reveal-up delay-100">
                <!-- Background Image with hover zoom-slow scale (z-0) -->
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80" 
                     alt="Victoria Island Cityscape" 
                     class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-[6000ms] ease-out z-0" />
                
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent z-10"></div>

                <!-- Card Content (z-20) -->
                <div class="flex flex-col gap-4 text-left z-20 font-sans">
                    <div class="flex items-center gap-2 px-2.5 py-1 rounded-full bg-blue-500/20 border border-blue-500/20 w-max backdrop-blur-md">
                        <span class="text-blue-400 font-extrabold text-[9px] uppercase tracking-widest">+15.1% YoY Appreciation</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-serif font-extrabold text-white leading-tight">Victoria Island</h3>
                        <p class="text-xs text-slate-300 font-bold mt-1 uppercase tracking-wider">Cosmopolitan, Corporate & Elite</p>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed font-semibold">The high-octane commercial nerve center of Lagos. Ideal for high-yielding executive shortlets.</p>
                    
                    <a href="{{ route('properties.index', ['location_id' => $viLocation->id ?? '']) }}" 
                       class="mt-2 w-full flex items-center justify-between px-5 py-3.5 text-xs font-extrabold uppercase tracking-widest text-slate-900 bg-white group-hover:bg-amber-400 rounded-xl transition-all duration-300 text-left">
                        <span>Discover VI Spaces</span>
                        <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Enclave 3: Lekki Phase 1 -->
            <div class="group h-[450px] rounded-[2.5rem] overflow-hidden border border-slate-200/50 shadow-sm relative flex flex-col justify-end p-8 sm:p-10 hover:shadow-xl transition-all duration-500 scroll-reveal reveal-up delay-200">
                <!-- Background Image with hover zoom-slow scale (z-0) -->
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" 
                     alt="Lekki Phase 1 Modern Villa" 
                     class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-[6000ms] ease-out z-0" />
                
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent z-10"></div>

                <!-- Card Content (z-20) -->
                <div class="flex flex-col gap-4 text-left z-20 font-sans">
                    <div class="flex items-center gap-2 px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/20 w-max backdrop-blur-md">
                        <span class="text-emerald-400 font-extrabold text-[9px] uppercase tracking-widest">+14.2% YoY Appreciation</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-serif font-extrabold text-white leading-tight">Lekki Phase 1</h3>
                        <p class="text-xs text-slate-300 font-bold mt-1 uppercase tracking-wider">Vibrant, Artistic & Tech-Driven</p>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed font-semibold">The tech-lifestyle haven for young millionaires, creators, and modern executive families.</p>
                    
                    <a href="{{ route('properties.index', ['location_id' => $lekkiLocation->id ?? '']) }}" 
                       class="mt-2 w-full flex items-center justify-between px-5 py-3.5 text-xs font-extrabold uppercase tracking-widest text-slate-900 bg-white group-hover:bg-amber-400 rounded-xl transition-all duration-300 text-left">
                        <span>Discover Lekki Spaces</span>
                        <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 6. DIASPORA INVESTMENT CONCIERGE SECTION -->
<section class="py-32 bg-slate-955 text-white relative overflow-hidden select-none border-t border-slate-900">
    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1500&q=80" 
         alt="Bespoke luxury plan" 
         class="absolute inset-0 h-full w-full object-cover opacity-10 mix-blend-overlay -z-10 animate-fade-in" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-slate-950 -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Column: Trust Slogans and Visual Plan -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-amber-400 font-extrabold tracking-widest text-xs uppercase block">Secure Remote Acquisition</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white leading-tight tracking-tight">
                    Diaspora Investment Concierge
                </h2>
                <p class="text-slate-400 leading-relaxed font-light text-base">
                    Acquiring luxury property from London, Houston, Toronto, or anywhere globally shouldn't come with friction or insecurity. Darall Homes has built a secure, legal, and remote-inclusive acquisition pipeline directly designed to protect diaspora investments.
                </p>
                
                <!-- Visual Map Badge -->
                <div class="relative rounded-3xl overflow-hidden aspect-video border border-white/5 bg-slate-900/60 p-6 flex flex-col justify-between mt-4">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-200">Legal Title & Escrow Security Verified</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed font-semibold">Our legal partners audit every C of O land title independently. Funds are held in recognized international escrow accounts until keys are verified.</p>
                </div>
            </div>

            <!-- Right Column: Security Pillars List -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-right delay-100">
                
                <!-- Pillar 1 -->
                <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10 flex items-start gap-6 hover:bg-white/10 transition-colors duration-300">
                    <span class="text-2xl font-extrabold text-amber-400 font-sans leading-none">01</span>
                    <div class="flex flex-col gap-1 text-left font-sans">
                        <h4 class="text-base font-extrabold text-white uppercase tracking-wider">Verified Certificate of Occupancy (C of O)</h4>
                        <p class="text-sm text-slate-300 leading-relaxed mt-1 font-semibold">Exhaustive, independent legal title audits conducted on every single listing, guaranteeing 100% dispute-free and fraud-free ownership.</p>
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10 flex items-start gap-6 hover:bg-white/10 transition-colors duration-300">
                    <span class="text-2xl font-extrabold text-amber-400 font-sans leading-none">02</span>
                    <div class="flex flex-col gap-1 text-left font-sans">
                        <h4 class="text-base font-extrabold text-white uppercase tracking-wider">Secure Escrow Closings</h4>
                        <p class="text-sm text-slate-300 leading-relaxed mt-1 font-semibold">Financial resources are processed through top-tier international banking and legal escrow partners. Funds are released only upon certified physical handovers.</p>
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="p-8 rounded-[2rem] bg-white/5 border border-white/10 flex items-start gap-6 hover:bg-white/10 transition-colors duration-300">
                    <span class="text-2xl font-extrabold text-amber-400 font-sans leading-none">03</span>
                    <div class="flex flex-col gap-1 text-left font-sans">
                        <h4 class="text-base font-extrabold text-white uppercase tracking-wider">Diaspora-to-Desktop Management</h4>
                        <p class="text-sm text-slate-300 leading-relaxed mt-1 font-semibold">Monitor your property's serviced shortlet occupancy, traditional rental income, and dynamic portfolio ROI live from our secure dashboard anywhere globally.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- 7. THE DARALL DIFFERENCE SECTION -->
<section class="py-32 bg-slate-50 border-t border-slate-100 overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col gap-4 text-center max-w-2xl mx-auto mb-20 scroll-reveal reveal-up">
            <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Core Brand Values</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">The Darall Difference</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">Our foundational pillars unite cutting-edge technology with unshakeable legal security, delivering a seamless luxury experience.</p>
        </div>

        <!-- 4-Column SaaS-Style Value Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Pillar 1: 3D VR Showrooms -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up">
                <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider mb-2 font-sans">8K VR Showrooms</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Tour every square inch of our prestigious properties in fully immersive, true-to-scale 8K virtual reality before booking a flight.</p>
            </div>

            <!-- Pillar 2: Premium Construction -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-100">
                <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider mb-2 font-sans">Exquisite Standards</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Bespoke architecture built with sustainable premium concrete, floor-to-ceiling glass facades, smart home automation, and luxury imported fittings.</p>
            </div>

            <!-- Pillar 3: Title Integrity -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-200">
                <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider mb-2 font-sans">Uncompromised Titles</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Every property holds fully audited, certified Certificate of Occupancy (C of O) status—independently vetted to ensure zero conflicts.</p>
            </div>

            <!-- Pillar 4: Client CRM Concierge -->
            <div class="group bg-white rounded-3xl p-8 border border-slate-200/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-300">
                <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider mb-2 font-sans">CRM Client Concierge</h4>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Review tour analytics, secure bookings, adjust rental parameters, and track occupancy yields dynamically from your personal dashboard.</p>
            </div>

        </div>

    </div>
</section>

<!-- 8. CALL TO ACTION BRANDS SECTION -->
<section class="py-36 bg-brand-dark text-white relative overflow-hidden select-none">
    <!-- Backdrop image details -->
    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1500&q=80" 
         alt="Bespoke luxury estate backdrop" 
         class="absolute inset-0 h-full w-full object-cover opacity-15 mix-blend-overlay -z-10" />
    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/70 to-transparent -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl flex flex-col gap-6 text-left scroll-reveal reveal-left">
            <span class="text-amber-400 font-extrabold tracking-widest text-xs uppercase block">Secure Portfolios Acquisitions</span>
            <h2 class="text-4xl xl:text-5xl font-serif font-extrabold text-white leading-tight tracking-tight">Ready to step into Lagos' finest spaces?</h2>
            <p class="text-base text-slate-300 leading-relaxed font-light max-w-xl">
                Whether you are seeking outright acquisition, custom corporate leases, or exquisite serviced shortlet stays, our advisory team is ready to deliver a bespoke digital walkthrough.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-slate-950 bg-amber-400 hover:bg-amber-500 rounded-xl shadow-lg shadow-amber-500/10 hover:scale-[1.03] active:scale-[0.97] transition-all duration-300">
                    Explore Showrooms
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-white border border-white/20 hover:bg-white/10 rounded-xl backdrop-blur-sm transition-all duration-300">
                    Message Advisory Desk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
