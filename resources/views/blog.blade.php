@extends('layouts.public')

@section('title', 'Insights, Reports & Market Intelligence')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-20 sm:py-28 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-35" style="background-image: url('https://images.unsplash.com/photo-1542435503-956c469947f6?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-sm">
            Intellectual Capital
        </span>
        <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-tight">
            Real Estate Market Intelligence
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            Stay ahead of shifts. Access detailed analysis, regulatory briefs, and high-fidelity smart home reviews curated by our research partners.
        </p>
    </div>
</div>

<!-- Blog Feed Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="group flex flex-col gap-4">
                <div class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=600&q=80" alt="Smart Home Future" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold uppercase tracking-wider font-sans mt-2">
                    <span>Trends</span>
                    <span>•</span>
                    <span>5 Min Read</span>
                </div>
                <h3 class="text-xl font-serif text-slate-900 group-hover:text-brand-red-600 transition-colors">
                    The Smart Home Evolution: Automating Luxury Real Estate
                </h3>
                <p class="text-slate-500 text-sm font-light leading-relaxed line-clamp-2">
                    How centralized savant home operating systems, electrochromic privacy glass, and biometric entrance doors are forming a new standard of living in Lekki Phase 1.
                </p>
            </article>

            <!-- Article 2 -->
            <article class="group flex flex-col gap-4">
                <div class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80" alt="Lagos Economy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold uppercase tracking-wider font-sans mt-2">
                    <span>Market Reports</span>
                    <span>•</span>
                    <span>8 Min Read</span>
                </div>
                <h3 class="text-xl font-serif text-slate-900 group-hover:text-brand-red-600 transition-colors">
                    Lagos Property Market Outlook: Where to Invest in 2027
                </h3>
                <p class="text-slate-500 text-sm font-light leading-relaxed line-clamp-2">
                    An in-depth data analysis of rental yields and capital appreciation metrics across Banana Island, Old Ikoyi, and Lekki Phase 1 over the last fiscal year.
                </p>
            </article>

            <!-- Article 3 -->
            <article class="group flex flex-col gap-4">
                <div class="relative aspect-[16/10] rounded-2xl overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=600&q=80" alt="Lagoon View lifestyle" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold uppercase tracking-wider font-sans mt-2">
                    <span>Lifestyle</span>
                    <span>•</span>
                    <span>4 Min Read</span>
                </div>
                <h3 class="text-xl font-serif text-slate-900 group-hover:text-brand-red-600 transition-colors">
                    Waterfront Living: The Psychological Allure of Lagoon Vistas
                </h3>
                <p class="text-slate-500 text-sm font-light leading-relaxed line-clamp-2">
                    Exploring the acoustic benefits and therapeutic impacts of choosing residences with direct sightlines onto Lagos Lagoon.
                </p>
            </article>
        </div>
    </div>
</section>
@endsection
