@extends('layouts.public')

@section('title', 'The Obsidian Penthouse | Lekki Phase 1')

@section('content')
<!-- Section 1 — Premium Landing Hero -->
<div class="relative bg-slate-950 min-h-[75vh] md:min-h-[85vh] flex items-end overflow-hidden border-b border-slate-900">
    <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
            <!-- Property Meta & Actions -->
            <div class="lg:col-span-8 flex flex-col items-start gap-4 sm:gap-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    Virtual Tour Available Now
                </span>
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-slate-400 uppercase tracking-widest font-semibold">Lekki Phase 1, Lagos</span>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white tracking-tight leading-tight">
                        The Obsidian Penthouse
                    </h1>
                </div>
                <p class="text-slate-300 text-sm sm:text-base max-w-2xl font-light leading-relaxed">
                    A masterpiece of modern engineering. Designed by world-renowned architects, this penthouse offers an unprecedented perspective on urban luxury and waterfront living.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto pt-2">
                    <a href="#virtual-tour" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-sm font-semibold text-slate-950 bg-amber-500 hover:bg-amber-400 active:scale-95 rounded-full shadow-lg transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        Take Virtual Tour
                    </a>
                    <a href="#schedule-inspection" class="inline-flex items-center justify-center px-8 py-4 text-sm font-semibold text-white border border-white/20 hover:bg-white/10 rounded-full backdrop-blur-sm transition-colors">
                        Schedule Physical Inspection
                    </a>
                </div>
            </div>
            <!-- Pricing / Details Summary -->
            <div class="lg:col-span-4 flex flex-col lg:items-end gap-2 text-left lg:text-right">
                <span class="text-xs text-slate-400 uppercase tracking-wider font-semibold">Invesment Value</span>
                <span class="text-3xl sm:text-4xl font-bold text-amber-500">₦350,000,000</span>
                <span class="text-xs text-slate-500 font-light">Fully Serviced & Furnished Options Available</span>
            </div>
        </div>
    </div>
</div>

<!-- Section 2 — Property Architectural Summary -->
<section class="py-12 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center divide-x divide-slate-100">
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Property Type</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">Duplex Penthouse</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Bedrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">4 Ensuite</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Bathrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">5 Bathrooms</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Floor Area</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">450 sqm</span>
            </div>
            <div class="flex flex-col gap-1 items-center col-span-2 md:col-span-1 border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-slate-400 text-xs uppercase tracking-wider font-semibold">Parking</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">3 Dedicated Slots</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 3 — The Virtual Walkthrough Experience -->
<section id="virtual-tour" class="py-24 bg-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 flex flex-col items-center gap-4">
            <span class="text-amber-500 font-semibold uppercase tracking-wider text-xs">A Digitized Showroom</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-white">Walk Through Before You Visit</h2>
            <p class="text-slate-400 text-sm sm:text-base font-light">
                Use your keyboard or mouse to look around, tap the hot spots on the floor to navigate rooms, and inspect every corner of the property in real-time.
            </p>
        </div>

        <!-- Professional iFrame Container -->
        <div class="relative rounded-3xl overflow-hidden aspect-video shadow-2xl bg-slate-900 border border-slate-800">
            <!-- Simulated Premium Matterport Walkthrough Frame -->
            <iframe src="https://my.matterport.com/show/?m=9bN5vC9Z2pU" class="absolute inset-0 w-full h-full border-0" allowfullscreen allow="xr-spatial-tracking"></iframe>
        </div>
        
        <div class="flex justify-center items-center gap-4 mt-8 text-xs text-slate-400">
            <span class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                Matterport Pro3 Integration
            </span>
            <span class="text-slate-700">|</span>
            <span class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                Optimized for Mobile/Desktop WebGL
            </span>
        </div>
    </div>
</section>

<!-- Section 4 — Room-by-Room Presentation -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 mb-16">
            <span class="text-amber-600 font-semibold tracking-wider text-xs uppercase">Premium Interior Design</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900">Room-by-Room Curated Highlights</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <!-- Image Frame -->
            <div class="relative rounded-2xl overflow-hidden aspect-[4/3] shadow-xl">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="Living Room Showcase" class="absolute inset-0 w-full h-full object-cover">
            </div>
            <!-- Descriptive Frame -->
            <div class="flex flex-col gap-6">
                <span class="text-amber-600 font-semibold tracking-widest text-xs uppercase">01 / Grand Living Room</span>
                <h3 class="text-2xl sm:text-3xl font-serif text-slate-900">Spacious Open-Concept Layout</h3>
                <p class="text-slate-500 font-light leading-relaxed">
                    Featuring double-height ceilings, automated floor-to-ceiling smart glass windows, and a built-in wet bar, the primary reception area merges luxury comfort with seamless entertaining.
                </p>
                <div class="border-t border-slate-100 pt-6">
                    <ul class="grid grid-cols-2 gap-4 text-sm text-slate-600">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Smart Glass Glazing</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Double-Height Ceiling</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Built-in Marble Bar</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Integrated Surround Sound</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5 — Elite Amenities & Location -->
<section class="py-24 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Amenities List (CMS Ready) -->
        <div class="lg:col-span-7 flex flex-col gap-10">
            <div class="flex flex-col gap-3">
                <span class="text-amber-600 font-semibold tracking-wider text-xs uppercase">Serviced Conveniences</span>
                <h2 class="text-3xl font-serif text-slate-900">World-Class Signature Amenities</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">
                <!-- Amenity 1 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">Automated Home</h4>
                        <p class="text-xs text-slate-500 mt-1">Savant Smart Home Integration</p>
                    </div>
                </div>
                
                <!-- Amenity 2 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">Uninterrupted Power</h4>
                        <p class="text-xs text-slate-500 mt-1">Dual 250kVA Cummins Generators</p>
                    </div>
                </div>

                <!-- Amenity 3 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">24/7 Security</h4>
                        <p class="text-xs text-slate-500 mt-1">Armed patrols, CCTV, Bio-access</p>
                    </div>
                </div>

                <!-- Amenity 4 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11.571V11a1 1 0 112 0v.571c0 1.055.21 2.062.586 2.981m4.35 1.545a13.933 13.933 0 01-1.89 3.395L15.4 20M12 4v12M12 4a8 8 0 110 16" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">Elite Fitness Gym</h4>
                        <p class="text-xs text-slate-500 mt-1">Private building workout studio</p>
                    </div>
                </div>

                <!-- Amenity 5 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">Heated Pool</h4>
                        <p class="text-xs text-slate-500 mt-1">Infinity pool with lagoon view</p>
                    </div>
                </div>

                <!-- Amenity 6 -->
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-slate-900 font-semibold text-sm">Lagoon Sightline</h4>
                        <p class="text-xs text-slate-500 mt-1">Stellar unobstructed water views</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map / Neighborhood Section -->
        <div class="lg:col-span-5 flex flex-col gap-6">
            <span class="text-amber-600 font-semibold tracking-wider text-xs uppercase font-sans">Prestigious Neighborhood</span>
            <h3 class="text-2xl font-serif text-slate-900">Bespoke Lekki Phase 1 Living</h3>
            <p class="text-sm text-slate-500 font-light leading-relaxed">
                Located within an extremely quiet enclave of Lekki Phase 1, the residency offers rapid, hassle-free egress to Ikoyi and Victoria Island while preserving complete sanctuary seclusion.
            </p>
            
            <!-- Map Placeholder -->
            <div class="rounded-3xl overflow-hidden aspect-[4/3] bg-slate-200 shadow-inner border border-slate-200 relative">
                <!-- Elegant Map Placeholder -->
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=600&q=80" alt="Map View Placeholder" class="absolute inset-0 w-full h-full object-cover grayscale opacity-60">
                <div class="absolute inset-0 bg-slate-950/20 flex items-center justify-center">
                    <div class="bg-white/90 border border-slate-100 p-4 rounded-2xl shadow-xl backdrop-blur-md flex items-center gap-3 max-w-[80%]">
                        <span class="w-3 h-3 rounded-full bg-amber-500 animate-pulse"></span>
                        <div class="flex flex-col">
                            <span class="text-xs font-semibold text-slate-950">Darall Homes Premium Spot</span>
                            <span class="text-[10px] text-slate-500">Exact address revealed upon request</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Section 6 — Property Conversion Engine & Schedule Form -->
<section id="schedule-inspection" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Call to Action Info -->
        <div class="lg:col-span-5 flex flex-col gap-6 justify-center">
            <span class="text-amber-600 font-semibold uppercase tracking-wider text-xs">Begin Your Acquisition</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900">Interested in this property?</h2>
            <p class="text-slate-500 font-light leading-relaxed">
                Schedule a private physical tour, submit a structured enquiry to our corporate legal team, or start a direct, immediate chat with our designated private agent on WhatsApp.
            </p>
            
            <div class="flex flex-col gap-4 mt-4">
                <a href="https://wa.me/234800darallhomes" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-500 rounded-2xl shadow-md transition-colors duration-200">
                    Chat on WhatsApp
                </a>
            </div>
        </div>

        <!-- Inspection Request Form Form -->
        <div class="lg:col-span-7 bg-slate-50 rounded-3xl border border-slate-100 p-8 sm:p-10 shadow-sm">
            <h3 class="text-xl font-serif text-slate-900 mb-6">Schedule Private Inspection</h3>
            
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
                        <label class="text-xs font-semibold text-slate-500 uppercase">Preferred Inspection Date</label>
                        <input type="date" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold text-slate-500 uppercase">Additional Message / Inquiries</label>
                    <textarea rows="4" placeholder="Would love to request a dusk viewing for sunset analysis..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"></textarea>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all">
                    Submit Request
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
