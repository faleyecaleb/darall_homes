@extends('layouts.public')

@section('title', 'Exclusive Developments & Ongoing Projects')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-20 sm:py-28 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-35" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
            Architectural Masterpieces
        </span>
        <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-tight">
            Exclusive Luxury Developments
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            Secure prime investment positions. Explore bespoke residential structures and curated commercial designs built with uncompromising precision.
        </p>
    </div>
</div>

<!-- Projects Grid Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Project Card 1 -->
            <div class="group bg-slate-50 border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80" alt="The Obsidian Residenices" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-500 text-slate-950 px-3 py-1 rounded-full text-xs font-semibold shadow-md">Under Construction</span>
                </div>
                <div class="p-8 sm:p-10 flex flex-col gap-4">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold font-sans">Lekki Phase 1, Lagos</span>
                            <h3 class="text-2xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">The Obsidian Residences</h3>
                        </div>
                        <span class="text-xs font-semibold bg-amber-500/10 text-amber-600 border border-amber-500/20 px-3 py-1 rounded-full">Delivery: Q4 2027</span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">A collections of 12 bespoke ultra-luxury detached terraces featuring multi-level open-concept floorplans, elevator integrations, and private rooftop pools.</p>
                    <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-2">
                        <span><strong class="text-slate-900">12</strong> Premium Units</span>
                        <span><strong class="text-slate-900">4</strong> Bedrooms + BQ</span>
                        <span>Starting at <strong class="text-slate-900">₦280M</strong></span>
                    </div>
                    <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center px-6 py-3.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-xl transition-all">
                        Request Investment Brochure
                    </a>
                </div>
            </div>

            <!-- Project Card 2 -->
            <div class="group bg-slate-50 border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1512915922686-57c11dde9b6b?auto=format&fit=crop&w=800&q=80" alt="The Aria Towers" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">Completed</span>
                </div>
                <div class="p-8 sm:p-10 flex flex-col gap-4">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-slate-400 uppercase tracking-widest font-semibold font-sans">Old Ikoyi, Lagos</span>
                            <h3 class="text-2xl font-serif text-slate-900 group-hover:text-amber-600 transition-colors">The Aria Towers</h3>
                        </div>
                        <span class="text-xs font-semibold bg-emerald-500/10 text-emerald-600 border border-emerald-500/20 px-3 py-1 rounded-full">Ready for Delivery</span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">An elegant, multi-tier residential vertical tower boasting high-fidelity thermal insulating glass facades, structured bio-pass lobby doors, and full-service clubhouses.</p>
                    <div class="flex items-center gap-6 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-2">
                        <span><strong class="text-slate-900">24</strong> Serviced Flats</span>
                        <span><strong class="text-slate-900">3</strong> Bedrooms Penthouse</span>
                        <span>Starting at <strong class="text-slate-900">₦450M</strong></span>
                    </div>
                    <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center px-6 py-3.5 text-xs font-semibold text-white bg-slate-950 hover:bg-amber-600 rounded-xl transition-all">
                        Request Investment Brochure
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
