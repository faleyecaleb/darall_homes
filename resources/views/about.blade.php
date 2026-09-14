@extends('layouts.public')

@section('title', 'About Our Vision, History & Founders')

@section('content')

<!-- 1. HEADER BANNER SECTION - Floating Cinematic Backdrop -->
<div class="relative bg-slate-950 py-24 sm:py-32 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[400px] select-none">
    <!-- Immersive Backdrop -->
    <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1920&q=80" 
         alt="Darall Corporate Landscape" 
         class="absolute inset-0 h-full w-full object-cover opacity-35 mix-blend-luminosity scale-105 hover:scale-100 transition-transform duration-[8000ms] ease-out -z-10" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-md animate-fade-in">
            Our Legacy & Innovation
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-none animate-slide-up">
            Bridging Lagos' Housing Deficit
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed font-light animate-slide-up delay-100">
            Founded with a singular purpose to make homeownership simple, safe, and seamless through exquisite modern construction, uncompromised title integrity, and virtual spatial technology.
        </p>
    </div>
</div>

<!-- 2. FOUNDING STORY NARRATIVE SECTION (Vivid Surulere Story) -->
<section class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Column: The Surulere apartment story - Slides Left -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-brand-red-600 font-extrabold tracking-widest text-sm uppercase block">The Founding Story</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">
                    Inspired by a Shocking Reality in Lagos.
                </h2>
                <p class="text-slate-650 leading-relaxed font-light text-base">
                    Darall Homes Limited was registered and commenced operations in **2022**. The inspiration came when our founder had to assist his father in renting out a single three-bedroom apartment in Iponri, Surulere. 
                </p>
                <p class="text-slate-655 leading-relaxed font-light text-base">
                    The sheer volume of prospective tenants competing for that single listing revealed an alarming truth: housing supply was drastically lower than demand across Lagos State. Witnessing this housing deficit (currently estimated at **2.7 million units**), we decided to get involved. 
                </p>
                <p class="text-slate-650 leading-relaxed font-semibold text-sm">
                    "Owning a home in Lagos shouldn't come with sleepless nights. Whether you are seeking a residential apartment, long lease, outright purchase, or high-yielding shortlet investment, we are here to make the process completely transparent and smooth."
                </p>
            </div>

            <!-- Right Column: Real Corporate Milestones - Slides Right -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 scroll-reveal reveal-right delay-100">
                <!-- Milestone 1: Projects Delivered -->
                <div class="bg-slate-50 rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-4">
                    <span class="text-5xl font-extrabold text-brand-red-500 font-sans leading-none">3</span>
                    <h4 class="text-slate-900 font-extrabold text-sm uppercase tracking-wider font-sans mt-2">Projects Completed</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold">Delivered three premium residential projects consisting of 32 luxury apartments altogether.</p>
                </div>

                <!-- Milestone 2: 2035 Vision -->
                <div class="bg-slate-50 rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-4">
                    <span class="text-5xl font-extrabold text-[#0d6e60] font-sans leading-none">1k</span>
                    <h4 class="text-slate-900 font-extrabold text-sm uppercase tracking-wider font-sans mt-2">Vision 2035</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold">To bridge Lagos' deficit by constructing 1,000 highly secure, premium residential homes by 2035.</p>
                </div>

                <!-- Milestone 3: Vetted Titles -->
                <div class="bg-slate-50 rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-4">
                    <span class="text-5xl font-extrabold text-slate-900 font-sans leading-none">100%</span>
                    <h4 class="text-slate-900 font-extrabold text-sm uppercase tracking-wider font-sans mt-2">Title Integrity</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold">Zero land conflicts. Every listing holds fully audited, certified Certificate of Occupancy (C of O) status.</p>
                </div>

                <!-- Milestone 4: Years Active -->
                <div class="bg-slate-50 rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-4">
                    <span class="text-5xl font-extrabold text-slate-900 font-sans leading-none">2022</span>
                    <h4 class="text-slate-900 font-extrabold text-sm uppercase tracking-wider font-sans mt-2">Commenced</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-semibold">Registered and actively managing luxury acquisitions and serviced shortlet spaces since 2022.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. MD/CEO SPOTLIGHT PROFILE SECTION (Oduniyi Omobolaji Abeeb) -->
<section class="py-32 bg-[#1c1c1e] text-white overflow-hidden relative select-none border-t border-slate-900">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-[#1c1c1e] to-slate-950/90 -z-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Left Portrait card - Slides Left -->
            <div class="relative rounded-[2.5rem] overflow-hidden aspect-[4/5] sm:aspect-video lg:aspect-[4/5] max-w-md mx-auto shadow-2xl bg-slate-900 border border-white/5 scroll-reveal reveal-left">
                <!-- Premium corporate builder image -->
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=800&q=80" alt="Oduniyi Omobolaji Abeeb Portrait" class="absolute inset-0 h-full w-full object-cover opacity-80 mix-blend-luminosity">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>
                
                <!-- Overlay Identity details -->
                <div class="absolute bottom-10 left-8 right-8 text-left font-sans">
                    <h4 class="text-2xl font-serif font-extrabold text-white">Oduniyi Omobolaji Abeeb</h4>
                    <span class="text-xs font-bold text-brand-red-400 uppercase tracking-widest mt-1 block">Managing Director & CEO</span>
                </div>
            </div>

            <!-- Right Biography Details - Slides Right -->
            <div class="flex flex-col gap-6 text-left scroll-reveal reveal-right delay-100">
                <span class="text-brand-red-400 font-extrabold tracking-widest text-xs uppercase block">Executive Spotlight</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white leading-tight tracking-tight">
                    Led by Engineering Excellence.
                </h2>
                <p class="text-slate-300 leading-relaxed font-light text-base">
                    Darall Homes is founded and led by **Oduniyi Omobolaji Abeeb**, an accomplished engineer and subsequent multi-sector entrepreneur. Graduating as an engineer from the prestigious **Lagos State University (LASU) in 2008** and completing NYSC in 2009, he established a foundation of structural precision and technical integrity.
                </p>
                <p class="text-slate-300 leading-relaxed font-light text-base">
                    He spent several years in paid employment with a prominent technology company from 2010 to 2014 before stepping out to pursue his lifelong entrepreneurial vision.
                </p>
                <p class="text-slate-400 leading-relaxed font-semibold text-sm">
                    Since then, he has successfully founded and built several companies across key economic sectors, including agriculture commodities export, real estate, haulage and logistics, and education sectors.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 3.5 KEY STRATEGIC OBJECTIVES SECTION (Mainland Expansion in Surulere & Yaba) -->
<section class="py-32 bg-slate-50 overflow-hidden select-none border-t border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Column: Business Goals Copy - Slides Left -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-left">
                <span class="text-brand-red-600 font-extrabold tracking-widest text-xs uppercase block">Corporate Horizons</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 leading-tight">
                    Key Strategic Business Objectives
                </h2>
                <p class="text-slate-600 leading-relaxed font-light text-base">
                    As we scale our operations, Darall Homes remains committed to measurable, high-impact regional expansion on the Lagos mainland. We target underserved high-demand zones to bring structural excellence where it is needed most.
                </p>
                <p class="text-slate-600 leading-relaxed font-light text-base">
                    Whether managing premium rentals, coordinating long-term leases, or closing outright acquisitions, our growth is structured to deliver safe, transparent homeownership to hundreds of families.
                </p>
            </div>

            <!-- Right Column: 1-3 Years Expansion Cards - Slides Right -->
            <div class="flex flex-col gap-6 scroll-reveal reveal-right delay-100">
                
                <!-- Objective Card 1: Mainland Leadership -->
                <div class="p-8 rounded-[2.5rem] bg-white border border-slate-200/50 shadow-sm flex items-start gap-6 hover:shadow-md transition-shadow">
                    <div class="h-12 w-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1 text-left font-sans">
                        <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">Mainland Regional Focus</h4>
                        <p class="text-sm text-slate-500 leading-relaxed font-semibold mt-1">To become well-established, highly recognized, and the leading real-estate development company within the mainland with focus on **Surulere & Yaba**.</p>
                    </div>
                </div>

                <!-- Objective Card 2: 300 Housing Units -->
                <div class="p-8 rounded-[2.5rem] bg-white border border-slate-200/50 shadow-sm flex items-start gap-6 hover:shadow-md transition-shadow">
                    <div class="h-12 w-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1 text-left font-sans">
                        <h4 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">300 Housing Units Milestone</h4>
                        <p class="text-sm text-slate-500 leading-relaxed font-semibold mt-1">Provide no fewer than **300 housing units** to individuals seeking rental, long-term lease, or outright purchase options over the next 1 to 3 years.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- 4. FOUNDATIONAL PRINCIPLES SECTION (Integrity, Excellence, Innovation, Community) -->
<section class="py-32 bg-white overflow-hidden select-none border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-20 flex flex-col gap-4 scroll-reveal reveal-up">
            <span class="text-brand-red-600 font-extrabold tracking-widest text-xs uppercase block">Commitment to Quality</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Our Foundational Principles</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">We shape the future of property discovery through a robust commitment to safety, community, and technology.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Value 1: Integrity -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up">
                <div class="w-12 h-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Integrity</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">We say what we do, and we do what we say. Transparent, dispute-free title safety is our absolute standard.</p>
            </div>

            <!-- Value 2: Excellence -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-100">
                <div class="w-12 h-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Excellence</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Uncompromised quality at every single stage—from premium structural concrete foundations to final interior fittings.</p>
            </div>

            <!-- Value 3: Innovation -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-200">
                <div class="w-12 h-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364.364l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Innovation</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Exquisite, state-of-the-art modern architectural designs accompanied by flexible payment plans and dynamic virtual-first CRM dashboards.</p>
            </div>

            <!-- Value 4: Community -->
            <div class="group bg-slate-50 p-8 sm:p-10 rounded-[2.2rem] border border-slate-100 shadow-sm flex flex-col gap-4 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 transform scroll-reveal reveal-up delay-300">
                <div class="w-12 h-12 rounded-xl bg-brand-red-500/10 text-brand-red-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.05 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider font-sans">Community</h3>
                <p class="text-sm text-slate-500 leading-relaxed font-semibold">Building beautiful, integrated neighborhoods, not just houses. Developing standard infrastructures people are proud to call home.</p>
            </div>

        </div>

    </div>
</section>

@endsection
