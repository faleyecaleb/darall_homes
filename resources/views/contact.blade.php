@extends('layouts.public')

@section('title', 'Connect with Our Elite Agents')

@section('content')
<!-- Header Banner Section - Floating Cinematic Backdrop -->
<div class="relative bg-slate-950 pt-36 pb-24 sm:py-32 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[400px] select-none">
    <div class="absolute inset-0 bg-cover bg-center opacity-35 animate-fade-in" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-widest bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-md animate-fade-in">
            Client Advisory Hub
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-none animate-slide-up">
            Connect with Our Advisory Team
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed font-light animate-slide-up delay-100">
            We are here to facilitate your acquisition journey. Let us guide you through our exclusive physical and virtual showrooms.
        </p>
    </div>
</div>

<!-- Main Contact Layout -->
<section class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Channels Info -->
        <div class="lg:col-span-5 flex flex-col gap-10 justify-center scroll-reveal reveal-left">
            <div class="flex flex-col gap-3">
                <span class="text-brand-red-600 font-extrabold tracking-widest text-sm uppercase block text-left">Direct Liaison</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">Bespoke Advisory Services</h2>
                <p class="text-slate-600 font-semibold leading-relaxed text-base text-left">
                    Whether looking to buy, rent, invest, or book an executive shortlet stay, our private agents provide tailored support centered around your schedule.
                </p>
            </div>
            
            <div class="flex flex-col gap-6 text-sm text-slate-700">
                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div class="text-left font-sans">
                        <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Immediate Phone Support</h4>
                        <p class="text-slate-500 mt-1 font-semibold">+234 (0) 800-DARALL-HOMES</p>
                    </div>
                </div>

                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="text-left font-sans">
                        <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Electronic Mail Correspondence</h4>
                        <p class="text-slate-500 mt-1 font-semibold">advisory@darallhomes.com</p>
                    </div>
                </div>

                <div class="flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="text-left font-sans">
                        <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider">Corporate HQ</h4>
                        <p class="text-slate-500 mt-1 font-semibold">Block 12, Admiralty Way, Lekki Phase 1, Lagos, Nigeria.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Enquiry Form -->
        <div class="lg:col-span-7 bg-slate-50 rounded-[2.5rem] border border-slate-200/50 p-8 sm:p-10 shadow-sm scroll-reveal reveal-right delay-100">
            <h3 class="text-2xl font-serif font-extrabold text-slate-900 text-left mb-8 tracking-tight">Send Structured Enquiry</h3>
            
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Your Name</label>
                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:border-transparent transition-all">
                        @error('name')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Email Address</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:border-transparent transition-all">
                        @error('email')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Phone Number</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:border-transparent transition-all">
                        @error('phone')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Nature of Inquiry</label>
                        <select name="inquiry_type" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:border-transparent transition-all">
                            <option value="">Select Purpose</option>
                            <option value="acquisition" {{ old('inquiry_type') === 'acquisition' ? 'selected' : '' }}>Property Acquisition</option>
                            <option value="rent" {{ old('inquiry_type') === 'rent' ? 'selected' : '' }}>Luxury Rental</option>
                            <option value="shortlet" {{ old('inquiry_type') === 'shortlet' ? 'selected' : '' }}>Executive Shortlet</option>
                            <option value="partnership" {{ old('inquiry_type') === 'partnership' ? 'selected' : '' }}>Developer Partnership</option>
                        </select>
                        @error('inquiry_type')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-left">
                    <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Enquiry Specifications</label>
                    <textarea name="message" rows="5" required placeholder="Please outline your preferred locations, bedroom counts, budget specifications, or partnership details..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:border-transparent transition-all">{{ old('message') }}</textarea>
                    @error('message')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md">
                    Submit Corporate Enquiry
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
