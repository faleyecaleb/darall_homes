@extends('layouts.public')

@section('title', 'Exclusive Developments & Ongoing Projects')

@section('content')

<!-- 1. HEADER BANNER SECTION - Floating Cinematic Backdrop -->
<div class="relative bg-slate-950 py-24 sm:py-32 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[400px] select-none">
    <!-- Immersive Backdrop -->
    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80" 
         alt="Darall Developments Backdrop" 
         class="absolute inset-0 h-full w-full object-cover opacity-35 mix-blend-luminosity scale-105 hover:scale-100 transition-transform duration-[8000ms] ease-out -z-10" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-md animate-fade-in">
            Architectural Masterpieces
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-none animate-slide-up">
            Exclusive Developments & Projects
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed font-light animate-slide-up delay-100">
            Secure your target investment positions. Explore bespoke, highly secure residential structures and curated off-plan designs built with uncompromising engineering precision.
        </p>
    </div>
</div>

<!-- 2. OFF-PLAN INVESTMENT ADVANTAGES (3-Column Value Proposition) -->
<section class="py-32 bg-white overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col gap-4 text-center max-w-2xl mx-auto mb-20 scroll-reveal reveal-up">
            <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Off-Plan Strategy</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Off-Plan Acquisition Advantages</h2>
            <p class="text-base text-slate-500 leading-relaxed font-semibold">Discover why acquiring off-plan assets in Lekki and Ikoyi represents Lagos' most lucrative wealth compounder.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Adv 1: Pre-Construction Discount -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Pre-Construction Discount</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Locking in early-bird off-plan prices allows you to acquire luxury real estate up to **15% below market valuation** before final development completions.</p>
            </div>

            <!-- Adv 2: Bespoke Customizations -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-100">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Bespoke Customization</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Hand-select premium interior materials, customize master floorplan configurations, and integrate personalized smart home specs during early construction.</p>
            </div>

            <!-- Adv 3: Structured Installments -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-200">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Structured Installments</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Settle transactions comfortably using our **flexible milestone payment plans** structured over the exact building timeline, with zero interest rate inflation.</p>
            </div>

        </div>

    </div>
</section>

<!-- 3. PROJECT GRID REGISTERED LISTINGS SECTION (Obsidian & Aria) -->
<section class="py-32 bg-slate-50 border-t border-b border-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col gap-4 text-center max-w-2xl mx-auto mb-20 scroll-reveal reveal-up">
            <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Active Masterpieces</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Developments Portfolio</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">Explore our flagship projects actively being constructed and finalized across premium Lagos communities.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Project Card 1: The Obsidian Residences -->
            <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 scroll-reveal reveal-left">
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-200 z-0">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80" alt="The Obsidian Residenices" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-amber-400 text-slate-950 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-md">Under Construction</span>
                </div>
                <div class="p-8 sm:p-10 flex flex-col gap-4">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex flex-col gap-1 text-left">
                            <span class="text-xs text-slate-400 uppercase tracking-widest font-extrabold font-sans">Lekki Phase 1, Lagos</span>
                            <h3 class="text-2xl font-serif font-extrabold text-slate-900 group-hover:text-amber-500 transition-colors">The Obsidian Residences</h3>
                        </div>
                        <span class="text-xs font-extrabold uppercase tracking-widest bg-amber-500/10 text-amber-600 border border-amber-500/20 px-3.5 py-1.5 rounded-full flex-shrink-0">Delivery: Q4 2027</span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold text-left">A collections of 12 bespoke ultra-luxury detached terraces featuring multi-level open-concept floorplans, elevator integrations, and private rooftop pools.</p>
                    <div class="flex items-center gap-6 text-sm text-slate-500 border-y border-slate-100 py-3.5 my-2 font-sans font-semibold">
                        <span><strong class="text-slate-900">12</strong> Premium Units</span>
                        <span><strong class="text-slate-900">4</strong> Bedrooms + BQ</span>
                        <span>Starting at <strong class="text-slate-900">₦280M</strong></span>
                    </div>
                    <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-brand rounded-xl transition-all shadow-md">
                        Request Investment Brochure
                    </a>
                </div>
            </div>

            <!-- Project Card 2: The Aria Towers -->
            <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 scroll-reveal reveal-right delay-100">
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-200 z-0">
                    <img src="https://images.unsplash.com/photo-1512915922686-57c11dde9b6b?auto=format&fit=crop&w=800&q=80" alt="The Aria Towers" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-emerald-500 text-white px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-md">Completed</span>
                </div>
                <div class="p-8 sm:p-10 flex flex-col gap-4">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex flex-col gap-1 text-left">
                            <span class="text-xs text-slate-400 uppercase tracking-widest font-extrabold font-sans">Old Ikoyi, Lagos</span>
                            <h3 class="text-2xl font-serif font-extrabold text-slate-900 group-hover:text-amber-500 transition-colors">The Aria Towers</h3>
                        </div>
                        <span class="text-xs font-extrabold uppercase tracking-widest bg-emerald-500/10 text-emerald-600 border border-emerald-500/20 px-3.5 py-1.5 rounded-full flex-shrink-0">Ready for Delivery</span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold text-left">An elegant, multi-tier residential vertical tower boasting high-fidelity thermal insulating glass facades, structured bio-pass lobby doors, and full-service clubhouses.</p>
                    <div class="flex items-center gap-6 text-sm text-slate-500 border-y border-slate-100 py-3.5 my-2 font-sans font-semibold">
                        <span><strong class="text-slate-900">24</strong> Serviced Flats</span>
                        <span><strong class="text-slate-900">3</strong> Bedrooms Penthouse</span>
                        <span>Starting at <strong class="text-slate-900">₦450M</strong></span>
                    </div>
                    <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-brand rounded-xl transition-all shadow-md">
                        Request Investment Brochure
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. DEVELOPMENT TIMELINE VELOCITY PIPELINES -->
<section class="py-32 bg-white overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col gap-4 text-center max-w-2xl mx-auto mb-20 scroll-reveal reveal-up">
            <span class="text-amber-600 font-extrabold tracking-widest text-xs uppercase block">Operational Pacing</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Our Construction Timelines</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">We adhere to timely, rigorous milestones ensuring structural durability and prompt check-in handovers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Milestone 1 -->
            <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 flex flex-col gap-4 scroll-reveal reveal-up">
                <span class="text-3xl font-extrabold text-amber-500 leading-none">01</span>
                <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 font-sans mt-2">Vetting & Design</h4>
                <p class="text-sm text-slate-550 leading-relaxed font-semibold">Exhaustive C of O land title auditing paired with bespoke architectural blueprint design and 3D spatial modeling.</p>
            </div>
            
            <!-- Milestone 2 -->
            <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 flex flex-col gap-4 scroll-reveal reveal-up delay-100">
                <span class="text-3xl font-extrabold text-amber-500 leading-none">02</span>
                <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 font-sans mt-2">Core Foundation</h4>
                <p class="text-sm text-slate-550 leading-relaxed font-semibold">Deep piling works paired with pouring high-strength premium concrete columns to establish permanent seismic security.</p>
            </div>

            <!-- Milestone 3 -->
            <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 flex flex-col gap-4 scroll-reveal reveal-up delay-200">
                <span class="text-3xl font-extrabold text-amber-500 leading-none">03</span>
                <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 font-sans mt-2">Facade Setting</h4>
                <p class="text-sm text-slate-550 leading-relaxed font-semibold">Mounting thermal-insulated smart glass facades, completing external finishes, and locking interior plumbing lines.</p>
            </div>

            <!-- Milestone 4 -->
            <div class="p-8 rounded-[2rem] bg-slate-50 border border-slate-100 flex flex-col gap-4 scroll-reveal reveal-up delay-300">
                <span class="text-3xl font-extrabold text-emerald-500 leading-none">04</span>
                <h4 class="text-sm font-extrabold uppercase tracking-wider text-slate-900 font-sans mt-2">Custom Handover</h4>
                <p class="text-sm text-slate-550 leading-relaxed font-semibold">Finalizing custom marble selections, connecting smart home controls, and handing over dispute-free keys to client.</p>
            </div>
        </div>

    </div>
</section>

<!-- 5. JOINT-VENTURES & LAND BANK PARTNERSHIPS SECTION -->
<section class="py-32 bg-slate-950 text-white relative overflow-hidden select-none border-t border-slate-900">
    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1500&q=80" 
         alt="Bespoke luxury plan" 
         class="absolute inset-0 h-full w-full object-cover opacity-10 mix-blend-overlay -z-10 animate-fade-in" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-slate-950 -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Column: JV Slogans - Slides Left -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-amber-400 font-extrabold tracking-widest text-xs uppercase block">Institutional Partnerships</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white leading-tight tracking-tight">
                    Joint-Venture (JV) Development Desk
                </h2>
                <p class="text-slate-400 leading-relaxed font-light text-base">
                    Do you hold prime land bank assets in **Old Ikoyi, Victoria Island, or Lekki Phase 1**? Partner with Darall Homes Limited. Our institutional development team specializes in high-fidelity Joint-Venture (JV) construction models.
                </p>
                <p class="text-slate-400 leading-relaxed font-light text-base">
                    We combine your land equity with our structural engineering mastery, legal title bulletproofing, and premium building materials. Together, we construct world-class residential vertical towers and modern terraces, turning raw soil into high-yield multi-million dollar assets.
                </p>
            </div>

            <!-- Right Column: Interactive Proposal Card - Slides Right -->
            <div class="bg-white text-slate-800 rounded-[2.5rem] p-8 sm:p-10 border border-slate-100 shadow-2xl flex flex-col gap-6 scroll-reveal reveal-right delay-100">
                <div class="flex flex-col text-left">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-slate-400 font-sans">Partner With Us</span>
                    <h3 class="text-xl font-extrabold text-slate-900 mt-1 font-sans tracking-tight">Submit JV Proposal</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold mt-1">Provide your landholding parameters and location coordinates to receive a turn-key project feasibility study.</p>
                </div>

                <form action="{{ route('contact') }}" method="GET" class="space-y-4">
                    <!-- Location filter -->
                    <div class="flex flex-col gap-1.5 text-left">
                        <label class="text-xs font-extrabold uppercase tracking-widest text-slate-400">Land Location</label>
                        <select required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all">
                            <option value="">Select Enclave</option>
                            <option value="Ikoyi">Old Ikoyi</option>
                            <option value="VI">Victoria Island</option>
                            <option value="Lekki">Lekki Phase 1</option>
                            <option value="Mainland">Surulere / Yaba / Mainland</option>
                        </select>
                    </div>

                    <!-- Size details -->
                    <div class="flex flex-col gap-1.5 text-left">
                        <label class="text-xs font-extrabold uppercase tracking-widest text-slate-400">Approximate Land Area</label>
                        <input type="text" placeholder="e.g. 1,200 sqm / 2 Plots" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 text-xs text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-brand focus:bg-white transition-all" />
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md mt-2">
                        Connect with JV Advisory Desk
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>

@endsection
