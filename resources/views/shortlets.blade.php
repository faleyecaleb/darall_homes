@extends('layouts.public')

@section('title', 'Luxury Shortlet Stays & Corporate Housing')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-20 sm:py-28 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-35" style="background-image: url('https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
            Executive Stays
        </span>
        <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-tight">
            Premium Shortlet Stays
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            Luxury living, on your timeline. Experience world-class serviced suites, duplex penthouses, and private estates available for daily or weekly residency.
        </p>
    </div>
</div>

<!-- Shortlets Section -->
<section class="py-24 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Shortlet Card 1 (Point to Zenit Suite) -->
            <div class="group bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300">
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80" alt="The Zenith Suite" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">Shortlet Stays</span>
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
                        <span class="text-xl font-bold text-slate-900">₦120,000 <span class="text-xs text-slate-400 font-light font-sans">/ night</span></span>
                        <a href="{{ route('properties.show', 'the-zenith-suite') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-full transition-colors duration-200">
                            Book Stays
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
