@extends('layouts.public')

@section('title', 'Connect with Our Elite Agents')

@section('content')
<!-- Header Banner Section -->
<div class="relative bg-slate-950 py-20 sm:py-28 overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-35" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
            Client Advisory Hub
        </span>
        <h1 class="text-4xl sm:text-5xl font-serif text-white tracking-tight">
            Connect with Our Advisory Team
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl leading-relaxed font-light">
            We are here to facilitate your acquisition journey. Let us guide you through our exclusive physical and virtual showrooms.
        </p>
    </div>
</div>

<!-- Main Contact Layout -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Channels Info -->
        <div class="lg:col-span-5 flex flex-col gap-10 justify-center">
            <div class="flex flex-col gap-3">
                <span class="text-amber-600 font-semibold uppercase tracking-wider text-xs">Direct Liaison</span>
                <h2 class="text-3xl font-serif text-slate-900">Bespoke Advisory Services</h2>
                <p class="text-slate-500 font-light leading-relaxed text-sm">
                    Whether looking to buy, rent, invest, or book an executive shortlet stay, our private agents provide tailored support centered around your schedule.
                </p>
            </div>
            
            <div class="flex flex-col gap-6 text-sm text-slate-700">
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Immediate Phone Support</h4>
                        <p class="text-slate-500 mt-0.5">+234 (0) 800-DARALL-HOMES</p>
                    </div>
                </div>

                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Electronic Mail Correspondence</h4>
                        <p class="text-slate-500 mt-0.5">advisory@darallhomes.com</p>
                    </div>
                </div>

                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900">Corporate HQ</h4>
                        <p class="text-slate-500 mt-0.5">Block 12, Admiralty Way, Lekki Phase 1, Lagos, Nigeria.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Enquiry Form -->
        <div class="lg:col-span-7 bg-slate-50 rounded-3xl border border-slate-100 p-8 sm:p-10 shadow-sm">
            <h3 class="text-xl font-serif text-slate-900 mb-6">Send Structured Enquiry</h3>
            
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase">Your Name</label>
                        <input type="text" required placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase">Email Address</label>
                        <input type="email" required placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase">Phone Number</label>
                        <input type="tel" required placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase">Nature of Inquiry</label>
                        <select required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            <option value="">Select Purpose</option>
                            <option value="acquisition">Property Acquisition</option>
                            <option value="rent">Luxury Rental</option>
                            <option value="shortlet">Executive Shortlet</option>
                            <option value="partnership">Developer Partnership</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-500 uppercase">Enquiry Specifications</label>
                    <textarea rows="5" required placeholder="Please outline your preferred locations, bedroom counts, budget specifications, or partnership details..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"></textarea>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all">
                    Submit Corporate Enquiry
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
