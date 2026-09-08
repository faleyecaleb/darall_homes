@extends('layouts.public')

@section('title', $property->title . ' | ' . $property->location->name)

@section('content')
<!-- Section 1 — Premium Landing Hero -->
<div class="relative bg-slate-950 min-h-[75vh] md:min-h-[85vh] flex items-end overflow-hidden border-b border-slate-900 -mt-20 select-none">
    <!-- Cover Image Background -->
    @if($property->coverImage)
        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('{{ $property->coverImage->file_path }}');"></div>
    @else
        <div class="absolute inset-0 bg-slate-900 opacity-60"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 z-10 w-full animate-fade-in">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-end">
            <!-- Property Meta & Actions -->
            <div class="lg:col-span-8 flex flex-col items-start gap-4 sm:gap-6">
                @if($property->virtualTour)
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-widest bg-amber-500/10 text-amber-400 border border-amber-500/20 backdrop-blur-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        Virtual Tour Available Now
                    </span>
                @endif
                <div class="flex flex-col gap-2">
                    <span class="text-sm text-slate-400 uppercase tracking-widest font-extrabold font-sans text-left">{{ $property->location->name }}</span>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif text-white tracking-tight leading-tight text-left">
                        {{ $property->title }}
                    </h1>
                </div>
                <p class="text-slate-300 text-sm sm:text-base max-w-2xl font-light leading-relaxed text-left">
                    {{ Str::limit($property->description, 200) }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto pt-2 font-sans">
                    @if($property->virtualTour)
                        <a href="#virtual-tour" class="inline-flex items-center justify-center gap-2 px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-slate-950 bg-amber-400 hover:bg-amber-500 active:scale-95 rounded-xl shadow-lg transition-all">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                            Take Virtual Tour
                        </a>
                    @endif
                    <a href="#schedule-inspection" class="inline-flex items-center justify-center px-8 py-4 text-xs font-extrabold uppercase tracking-widest text-white border border-white/20 hover:bg-white/10 rounded-xl backdrop-blur-sm transition-all shadow-md">
                        Schedule Physical Inspection
                    </a>
                </div>
            </div>
            <!-- Pricing / Details Summary -->
            <div class="lg:col-span-4 flex flex-col lg:items-end gap-2 text-left lg:text-right">
                <span class="text-sm text-slate-400 uppercase tracking-wider font-extrabold">Investment Value</span>
                @if($property->property_type === 'Shortlet')
                    <span class="text-3xl sm:text-4xl font-extrabold text-amber-500 font-sans">₦{{ number_format($property->price) }}<span class="text-sm font-bold text-slate-400">/night</span></span>
                @else
                    <span class="text-3xl sm:text-4xl font-extrabold text-amber-500 font-sans">₦{{ number_format($property->price) }}</span>
                @endif
                <span class="text-sm text-slate-500 font-semibold mt-1">Fully Serviced & Furnished Options Available</span>
            </div>
        </div>
    </div>
</div>

<!-- Section 2 — Property Architectural Summary -->
<section class="py-12 bg-white border-b border-slate-100 select-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center divide-x divide-slate-100">
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Property Type</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->category->name }}</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Bedrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->bedrooms }} Ensuite</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Bathrooms</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->bathrooms }} Bathrooms</span>
            </div>
            <div class="flex flex-col gap-1 items-center">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Floor Area</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->floor_area ? $property->floor_area . ' sqm' : 'N/A' }}</span>
            </div>
            <div class="flex flex-col gap-1 items-center col-span-2 md:col-span-1 border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-slate-400 text-sm uppercase tracking-wider font-extrabold">Purpose</span>
                <span class="text-base sm:text-lg font-serif text-slate-900 font-semibold">{{ $property->property_type === 'Shortlet' ? 'Executive Shortlet' : 'For ' . $property->property_type }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 3 — The Virtual Walkthrough Experience (Conditional) -->
@if($property->virtualTour)
    <section id="virtual-tour" class="py-24 bg-slate-950 text-white relative overflow-hidden animate-fade-in">
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 select-none">
            <div class="text-center max-w-3xl mx-auto mb-16 flex flex-col items-center gap-4">
                <span class="text-amber-500 font-extrabold uppercase tracking-wider text-sm">A Digitized Showroom</span>
                <h2 class="text-3xl sm:text-4xl font-serif text-white">Walk Through Before You Visit</h2>
                <p class="text-slate-350 text-sm sm:text-base font-light">
                    Use your keyboard or mouse to look around, tap the hot spots on the floor to navigate rooms, and inspect every corner of the property in real-time.
                </p>
            </div>

            <!-- Professional iFrame Container -->
            <div class="relative rounded-[2rem] overflow-hidden aspect-video shadow-2xl bg-slate-900 border border-slate-800">
                <!-- Live Matterport/Embed Url from DB -->
                <iframe src="{{ $property->virtualTour->embed_url }}" class="absolute inset-0 w-full h-full border-0" allowfullscreen allow="xr-spatial-tracking"></iframe>
            </div>
            
            <div class="flex justify-center items-center gap-4 mt-8 text-sm text-slate-400">
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    Interactive 3D Technology Enabled
                </span>
                <span class="text-slate-700">|</span>
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Optimized for Mobile/Desktop WebGL
                </span>
            </div>
        </div>
    </section>
@endif

<!-- Section 4 — Narrative & Detailed Description -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Long Text description -->
            <div class="lg:col-span-8 flex flex-col gap-6">
                <span class="text-amber-600 font-extrabold tracking-widest text-sm uppercase block text-left">Property Overview</span>
                <h2 class="text-3xl font-serif text-slate-900 text-left">Architectural Narrative</h2>
                <p class="text-slate-600 leading-relaxed font-semibold text-base text-left">
                    {{ $property->description }}
                </p>
            </div>
            
            <!-- Side Specs panel -->
            <div class="lg:col-span-4 bg-slate-50 p-8 rounded-[2.2rem] border border-slate-200/40 flex flex-col gap-6 self-start select-none">
                <h3 class="text-lg font-extrabold text-slate-900 text-left">Showroom Identity</h3>
                <div class="space-y-4 text-sm font-semibold">
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Listing Status</span>
                        <span class="font-extrabold text-emerald-600 uppercase text-sm">{{ $property->status }}</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Reference ID</span>
                        <span class="font-extrabold text-slate-900 font-sans text-sm">#DR-{{ str_pad($property->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-200/40 pb-3">
                        <span class="text-slate-550">Listed Date</span>
                        <span class="font-extrabold text-slate-900 text-sm">{{ $property->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5 — Elite Amenities -->
@if($property->amenities->count() > 0)
    <section class="py-24 bg-slate-50 border-t border-slate-100 select-none">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-12">
            <div class="flex flex-col gap-3">
                <span class="text-amber-600 font-extrabold tracking-widest text-sm uppercase block text-left">Serviced Conveniences</span>
                <h2 class="text-3xl font-serif text-slate-900 text-left">World-Class Signature Amenities</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
                @foreach($property->amenities as $amenity)
                    <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
                            <!-- Star/Spark icon -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div class="text-left font-sans">
                            <h4 class="text-slate-900 font-extrabold text-sm">{{ $amenity->name }}</h4>
                            <p class="text-xs text-slate-400 mt-0.5 font-bold">Fully Serviced</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Section 6 — Property Conversion Engine & Schedule Form -->
<section id="schedule-inspection" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Call to Action Info -->
        <div class="lg:col-span-5 flex flex-col gap-6 justify-center">
            <span class="text-amber-600 font-extrabold uppercase tracking-widest text-sm block text-left">Begin Your Acquisition</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 text-left">Interested in this property?</h2>
            <p class="text-slate-550 font-semibold leading-relaxed text-base text-left">
                Schedule a private physical tour, submit a structured enquiry to our corporate legal team, or start a direct, immediate chat with our designated private agent on WhatsApp.
            </p>
            
            <div class="flex flex-col gap-4 mt-4 font-sans">
                <a href="https://wa.me/234800darallhomes" class="inline-flex items-center justify-center gap-2 px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-emerald-600 hover:bg-emerald-500 rounded-2xl shadow-md transition-colors duration-200">
                    Chat on WhatsApp
                </a>
            </div>
        </div>

        <!-- Dynamic Booking / Inspection Form Panel -->
        @if($property->property_type === 'Shortlet')
            <!-- Shortlet Reservation Form (Dynamic Pricing Calendar powered by Alpine.js) -->
            <div class="lg:col-span-7 bg-slate-50 rounded-[2.5rem] border border-slate-200/50 p-8 sm:p-10 shadow-sm"
                 x-data="{
                    checkIn: '',
                    checkOut: '',
                    nightlyPrice: {{ $property->price }},
                    getNights() {
                        if (!this.checkIn || !this.checkOut) return 0;
                        let start = new Date(this.checkIn);
                        let end = new Date(this.checkOut);
                        let diff = end - start;
                        return Math.max(0, Math.ceil(diff / (1000 * 60 * 60 * 24)));
                    }
                 }">
                <h3 class="text-2xl font-serif text-slate-900 mb-2 font-sans font-extrabold text-left tracking-tight">Reserve Luxury Stay</h3>
                <p class="text-sm text-slate-500 mb-8 font-sans font-semibold text-left">Select check-in and checkout dates to calculate rates and request a private booking.</p>
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Your Name</label>
                            <input type="text" name="customer_name" required value="{{ old('customer_name', auth()->user()->name ?? '') }}" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_name')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Email Address</label>
                            <input type="email" name="customer_email" required value="{{ old('customer_email', auth()->user()->email ?? '') }}" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_email')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Phone Number</label>
                            <input type="tel" name="customer_phone" required value="{{ old('customer_phone') }}" placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            @error('customer_phone')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2 text-left">
                                <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Check-In</label>
                                <input type="date" name="check_in_date" required x-model="checkIn" min="{{ date('Y-m-d') }}" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold">
                                @error('check_in_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                            </div>
                            <div class="flex flex-col gap-2 text-left">
                                <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Checkout</label>
                                <input type="date" name="check_out_date" required x-model="checkOut" :min="checkIn ? checkIn : '{{ date('Y-m-d') }}'" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold">
                                @error('check_out_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Number of Guests</label>
                            <select name="guests_count" required class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5+ Guests</option>
                            </select>
                            @error('guests_count')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Special Requests / Notes</label>
                        <textarea name="notes" rows="3" placeholder="Airport pick-up requested, or high-floor preferences..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">{{ old('notes') }}</textarea>
                        @error('notes')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>

                    <!-- Dynamic pricing calculator panel (rendered smoothly via Alpine.js) -->
                    <div x-show="getNights() > 0" x-transition.opacity style="display: none;" class="p-5 bg-slate-100/60 border border-slate-200/40 rounded-2xl flex flex-col gap-2.5 font-sans">
                        <div class="flex justify-between text-slate-500 text-sm">
                            <span>Nightly Rate</span>
                            <span class="font-extrabold text-slate-900">₦{{ number_format($property->price) }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500 text-sm">
                            <span>Stay Duration</span>
                            <span class="font-extrabold text-slate-900" x-text="getNights() + ' night(s)'"></span>
                        </div>
                        <hr class="border-slate-200/60 my-1">
                        <div class="flex justify-between text-slate-900 font-extrabold text-sm">
                            <span>Estimated Booking Value</span>
                            <span class="text-brand">₦<span x-text="new Intl.NumberFormat().format(getNights() * nightlyPrice)"></span></span>
                        </div>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md">
                        Reserve Stay Now
                    </button>
                </form>
            </div>
        @else
            <!-- Standard Inspection Request Form Form (Connected to book route!) -->
            <div class="lg:col-span-7 bg-slate-50 rounded-[2.5rem] border border-slate-200/50 p-8 sm:p-10 shadow-sm">
                <h3 class="text-2xl font-serif text-slate-900 mb-6 font-sans font-extrabold text-left tracking-tight">Schedule Private Inspection</h3>
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('properties.book', $property->slug) }}" method="POST" class="space-y-6">
                    @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Your Name</label>
                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('name')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Email Address</label>
                        <input type="email" name="email" required value="{{ old('email') }}" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('email')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2 text-left">
                        <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Phone Number</label>
                        <input type="tel" name="phone" required value="{{ old('phone') }}" placeholder="+234 800 0000" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        @error('phone')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Preferred Date</label>
                            <input type="date" name="requested_date" required value="{{ old('requested_date') }}" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-sans font-semibold animate-fade-in">
                            @error('requested_date')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col gap-2 text-left">
                            <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Preferred Time</label>
                            <select name="requested_time" required class="w-full bg-white border border-slate-200 rounded-xl px-3 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                                <option value="Morning" {{ old('requested_time') === 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Afternoon" {{ old('requested_time') === 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                <option value="Evening" {{ old('requested_time') === 'Evening' ? 'selected' : '' }}>Evening</option>
                            </select>
                            @error('requested_time')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 text-left">
                    <label class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Additional Message / Inquiries</label>
                    <textarea name="notes" rows="4" placeholder="Would love to request a dusk viewing for sunset analysis..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">{{ old('notes') }}</textarea>
                    @error('notes')<span class="text-sm text-rose-500 font-semibold">{{ $message }}</span>@enderror
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-slate-800 rounded-xl transition-all shadow-md">
                    Submit Request
                </button>
            </form>
        </div>
        @endif

    </div>
</section>
@endsection
