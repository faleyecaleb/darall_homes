@extends('layouts.public')

@section('title', 'About Our Vision & Technology')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-20 sm:py-28 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-35" style="background-image: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
            Our Legacy & Innovation
        </span>
        <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-tight">
            Redefining Luxury Discovery
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            Darall Homes merges premium architectural mastery with cutting-edge 3D spatial technology to bring Lagos' finest estates straight to your screen.
        </p>
    </div>
</div>

<!-- Narrative Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col gap-6">
                <span class="text-amber-600 font-semibold tracking-wider text-sm uppercase">The Darall Standard</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">
                    Transparency, Trust, and Immersive Technology
                </h2>
                <p class="text-slate-600 leading-relaxed font-light">
                    Founded with a singular mission to eliminate friction in high-end real estate, Darall Homes operates as a luxury digital showroom. We believe that securing a premium home should be a transparent, enjoyable, and time-efficient experience.
                </p>
                <p class="text-slate-600 leading-relaxed font-light">
                    By providing fully responsive, true-to-scale 360-degree virtual walkthroughs, we enable local and international buyers to explore, verify, and experience properties before scheduling physical viewings.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-4xl font-bold text-amber-500 font-serif">95%</span>
                    <h4 class="text-slate-900 font-semibold text-sm">Inspection Satisfaction</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Our virtual walkthroughs ensure that physical visits perfectly match user expectations.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-4xl font-bold text-amber-500 font-serif">300+</span>
                    <h4 class="text-slate-900 font-semibold text-sm">Luxury Transactions</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Representing exclusive luxury apartments, penthouses, and bespoke estates.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-4xl font-bold text-amber-500 font-serif">100%</span>
                    <h4 class="text-slate-900 font-semibold text-sm">Verified Listings</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Zero placeholder descriptions. Every listing is fully verified and documented.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 flex flex-col gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <span class="text-4xl font-bold text-amber-500 font-serif">24/7</span>
                    <h4 class="text-slate-900 font-semibold text-sm">AI Assistant Coverage</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Instant property matching and contextual customer support at any hour.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-24 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 flex flex-col gap-4">
            <span class="text-amber-600 font-semibold tracking-wider text-xs uppercase">Commitment to Quality</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900">Our Foundational Principles</h2>
            <p class="text-slate-500 font-light text-sm sm:text-base">We shape luxury discovery through robust values that elevate customer expectations.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Value 1 -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-100 shadow-sm flex flex-col gap-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Absolute Security</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-light">We conduct exhaustive legal verification for every transaction, ensuring your investments remain perfectly secure and hassle-free.</p>
            </div>

            <!-- Value 2 -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-100 shadow-sm flex flex-col gap-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Virtual Innovation</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-light">We capture true dimensions and high-fidelity textures using Matterport technology, creating immersive parallel walkthroughs.</p>
            </div>

            <!-- Value 3 -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-100 shadow-sm flex flex-col gap-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Client-First Care</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-light">We deliver highly personalized support, matching dedicated agents to clients for sunset views and customized transaction processes.</p>
            </div>
        </div>
    </div>
</section>
@endsection
