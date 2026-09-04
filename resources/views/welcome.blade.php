@extends('layouts.public')

@section('title', 'Find a Property You Can Experience Before You Visit')

@section('content')
<!-- Hero Section -->
<div class="relative bg-slate-900 overflow-hidden min-h-[85vh] flex items-center">
    <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply opacity-60 transition-transform duration-[10000ms] hover:scale-105" style="background-image: url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col items-start gap-8 z-10">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm animate-fade-in">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
            A New Standard of Luxury Real Estate
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-[1.1] max-w-3xl">
            Find a Property You Can <span class="text-amber-500 italic">Experience</span> Before You Visit.
        </h1>
        <p class="text-lg sm:text-xl text-slate-300 max-w-2xl leading-relaxed font-light">
            Skip the blind appointments. Step into interactive 3D virtual walkthroughs of our premium estates in Lekki, Ikoyi, and Victoria Island, Lagos.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-slate-950 bg-amber-500 hover:bg-amber-400 rounded-full shadow-lg hover:shadow-amber-500/10 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                Explore Properties
            </a>
            <a href="#virtual-experience" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white border border-white/20 hover:bg-white/10 rounded-full backdrop-blur-sm transition-all duration-300">
                Take a Virtual Tour
            </a>
        </div>
    </div>
</div>

<!-- Virtual Property Experience Highlight -->
<section id="virtual-experience" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col gap-6">
                <span class="text-amber-600 font-semibold tracking-wider text-sm uppercase">Interactive Immersion</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">
                    Don't Just View the Property. Experience It.
                </h2>
                <p class="text-slate-600 leading-relaxed font-light">
                    Traditional online property hunting consists of flat, misleading photographs. Darall Homes transforms your discovery phase by integrating fully responsive 360-degree walkthroughs.
                </p>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-amber-500/10 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-semibold mb-1">True-to-Scale Dimensions</h4>
                            <p class="text-sm text-slate-500">Understand ceiling heights, spatial arrangements, and room connections directly.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-amber-500/10 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-slate-900 font-semibold mb-1">Save Valued Hours</h4>
                            <p class="text-sm text-slate-500">Eliminate physical traffic and tours by shortlisting properties you've already walked through.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Interactive Visual Placeholder -->
            <div class="relative rounded-2xl overflow-hidden aspect-video shadow-2xl bg-slate-950 border border-slate-800">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1000&q=80" alt="Virtual Walkthrough Preview" class="absolute inset-0 w-full h-full object-cover opacity-80">
                <div class="absolute inset-0 bg-slate-950/30 flex items-center justify-center">
                    <button class="w-20 h-20 rounded-full bg-amber-500 hover:bg-amber-400 text-slate-950 flex items-center justify-center shadow-2xl hover:scale-105 transition-transform duration-300">
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

<!-- Featured Properties Preview (CMS Ready Placeholder) -->
<section class="py-24 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-16">
            <div class="flex flex-col gap-4">
                <span class="text-amber-600 font-semibold tracking-wider text-sm uppercase">Curated Collections</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900">Featured Real Estate</h2>
            </div>
            <a href="{{ route('properties.index') }}" class="group flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 transition-colors">
                View All Available Properties
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Property Card Placeholder 1 -->
            <div class="group bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=600&q=80" alt="Lekki Penthouse" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold">For Sale</span>
                    <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour
                    </span>
                </div>
                <div class="p-6 flex flex-col gap-4">
                    <div class="flex flex-col gap-1 font-sans">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Lekki Phase 1, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900">The Obsidian Penthouse</h3>
                    </div>
                    <p class="text-sm text-slate-500 line-clamp-2">Ultra-luxury 4-bedroom duplex featuring automated home integration, panoramic lagoon views, and high-end Italian marble finishing.</p>
                    <div class="flex items-center gap-4 text-xs text-slate-500 border-y border-slate-100 py-3">
                        <span class="flex items-center gap-1"><strong class="text-slate-900">4</strong> Beds</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">5</strong> Baths</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">450</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center font-sans">
                        <span class="text-lg font-bold text-slate-900">₦350,000,000</span>
                        <a href="{{ route('properties.show', 'the-obsidian-penthouse') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>

            <!-- Property Card Placeholder 2 -->
            <div class="group bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80" alt="Ikoyi Estate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold">For Sale</span>
                </div>
                <div class="p-6 flex flex-col gap-4">
                    <div class="flex flex-col gap-1 font-sans">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Old Ikoyi, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900">The Aria Mansion</h3>
                    </div>
                    <p class="text-sm text-slate-500 line-clamp-2">Exquisite 5-bedroom detached mansion with private elevator, heated swimming pool, 2 BQs, and state-of-the-art security features.</p>
                    <div class="flex items-center gap-4 text-xs text-slate-500 border-y border-slate-100 py-3">
                        <span class="flex items-center gap-1"><strong class="text-slate-900">5</strong> Beds</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">6</strong> Baths</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">680</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center font-sans">
                        <span class="text-lg font-bold text-slate-900">₦650,000,000</span>
                        <a href="{{ route('properties.show', 'the-aria-mansion') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>

            <!-- Property Card Placeholder 3 -->
            <div class="group bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80" alt="Victoria Island Shortlet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-semibold">Shortlet</span>
                    <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-amber-400 px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span> Virtual Tour
                    </span>
                </div>
                <div class="p-6 flex flex-col gap-4">
                    <div class="flex flex-col gap-1 font-sans">
                        <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Victoria Island, Lagos</span>
                        <h3 class="text-xl font-serif text-slate-900">The Zenith Suite</h3>
                    </div>
                    <p class="text-sm text-slate-500 line-clamp-2">Premium 2-bedroom executive shortlet apartment located steps away from upscale shopping centers, dining, and workspace hubs.</p>
                    <div class="flex items-center gap-4 text-xs text-slate-500 border-y border-slate-100 py-3">
                        <span class="flex items-center gap-1"><strong class="text-slate-900">2</strong> Beds</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">2.5</strong> Baths</span>
                        <span class="flex items-center gap-1"><strong class="text-slate-900">180</strong> sqm</span>
                    </div>
                    <div class="flex justify-between items-center font-sans">
                        <span class="text-lg font-bold text-slate-900">₦120,000 <span class="text-xs text-slate-400 font-light font-sans">/ night</span></span>
                        <a href="{{ route('properties.show', 'the-zenith-suite') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors">
                            Explore Showroom
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AI Assistant Intro -->
<section class="py-24 bg-slate-900 text-white relative overflow-hidden">
    <!-- Grid pattern background overlay -->
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 px-3 py-1 rounded-full text-xs font-semibold">
            Artificial Intelligence
        </span>
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white">Looking for the right property?</h2>
        <p class="text-slate-300 text-base sm:text-lg max-w-2xl leading-relaxed font-light">
            Meet your digital companion. Our AI Property Assistant can instantly match you with available properties based on your budget, search through neighborhood features, and help schedule virtual or physical tours.
        </p>
        <div class="w-full max-w-lg mt-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md flex flex-col items-start gap-4 text-left font-sans">
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">AI Assistant Active</span>
            </div>
            <p class="text-sm text-slate-300 italic">"I'm looking for a luxury 4-bedroom terrace with a swimming pool under ₦250 Million in Lekki."</p>
            <button class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-slate-950 bg-amber-500 hover:bg-amber-400 rounded-xl transition-all">
                Start Chatting with Assistant
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-24 bg-white border-t border-slate-100 text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center gap-8">
        <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 font-serif">Ready to Find Your Next Property?</h2>
        <p class="text-slate-500 max-w-xl font-light">
            Join hundreds of satisfied homeowners and investors who discovered their homes transparently through the virtual-first method.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto font-sans">
            <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-8 py-3.5 text-sm font-semibold text-white bg-slate-950 hover:bg-slate-850 rounded-full transition-colors">
                Explore Listings
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-250 rounded-full transition-colors">
                Speak with an Agent
            </a>
        </div>
    </div>
</section>
@endsection