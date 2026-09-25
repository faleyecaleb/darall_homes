@extends('layouts.public')

@section('title', 'Exclusive Developments & Ongoing Projects')

@section('content')

<!-- HEADER BANNER SECTION - Floating Cinematic Backdrop -->
<div class="relative bg-slate-950 pt-40 pb-24 sm:py-32 overflow-hidden border-b border-slate-900 -mt-20 flex items-center min-h-[400px] select-none mobile-hero-fix">
    <!-- Immersive Backdrop -->
    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80" 
         alt="Darall Developments Backdrop" 
         class="absolute inset-0 h-full w-full object-cover opacity-35 mix-blend-luminosity scale-105 hover:scale-100 transition-transform duration-[8000ms] ease-out -z-10" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10 flex flex-col items-center gap-6">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest bg-brand-red-500/10 text-brand-red-400 border border-brand-red-500/20 backdrop-blur-md animate-fade-in">
            Architectural Masterpieces
        </span>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif text-white tracking-tight leading-none animate-slide-up">
            Exclusive Developments & Projects
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed font-light animate-slide-up delay-100">
            Explore our curated portfolio of residential structures and flagship off-plan developments currently in active construction across premier Lagos enclaves.
        </p>
    </div>
</div>

<!-- DEDICATED IN-DEVELOPMENT PROJECTS SHOWCASE (100% Database-Driven) -->
<section class="py-28 bg-slate-50 overflow-hidden min-h-[500px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col gap-3 text-center max-w-2xl mx-auto mb-16 scroll-reveal reveal-up">
            <span class="text-brand-red-600 font-extrabold tracking-widest text-xs uppercase block">Active Portfolio</span>
            <h2 class="text-3xl sm:text-4xl font-serif text-slate-900 tracking-tight leading-none">Developments in Progress</h2>
            <p class="text-sm text-slate-500 leading-relaxed font-semibold">Properties currently under development with active off-plan acquisition opportunities.</p>
        </div>

        <!-- Dynamic In-Development Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($inDevelopmentProperties as $project)
                <div class="group bg-white border border-slate-200/50 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 scroll-reveal reveal-up flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-200 z-0">
                            @if($project->coverImage)
                                <img src="{{ $project->coverImage->file_path }}" alt="{{ $project->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80" alt="{{ $project->title }}" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                            <span class="absolute top-4 left-4 bg-brand-red-400 text-slate-950 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-md inline-flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-950 animate-pulse"></span> In Development
                            </span>
                            @if($project->virtualTour)
                                <span class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-sm text-brand-red-400 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider flex items-center gap-1.5 shadow-sm border border-white/5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-red-400 animate-pulse"></span> Virtual Tour Active
                                </span>
                            @endif
                        </div>
                        <div class="p-8 sm:p-10 flex flex-col gap-4">
                            <div class="flex flex-col gap-1 text-left">
                                @if($project->location)
                                    <span class="text-xs text-slate-400 uppercase tracking-widest font-extrabold font-sans">{{ $project->location->name }}, Lagos</span>
                                @endif
                                <h3 class="text-2xl font-serif font-extrabold text-slate-900 group-hover:text-brand-red-500 transition-colors leading-tight">{{ $project->title }}</h3>
                            </div>
                            <p class="text-sm text-slate-500 leading-relaxed font-semibold text-left line-clamp-3">{{ $project->description }}</p>
                            <div class="flex items-center gap-4 text-xs text-slate-500 border-y border-slate-100 py-3.5 my-2 font-sans font-semibold">
                                @if($project->has_luxury_layout && $project->units->isNotEmpty())
                                    <span><strong class="text-slate-900">{{ $project->units->count() }}</strong> Layouts</span>
                                @endif
                                <span><strong class="text-slate-900">{{ $project->bedrooms }}</strong> Beds</span>
                                <span><strong class="text-slate-900">{{ $project->bathrooms }}</strong> Baths</span>
                                <span>Starting at <strong class="text-slate-900">₦{{ number_format($project->price) }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 sm:p-10 pt-0 flex flex-col gap-2">
                        <a href="{{ route('properties.show', $project->slug) }}" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-extrabold uppercase tracking-widest text-white bg-slate-900 hover:bg-brand rounded-xl transition-all shadow-md">
                            Explore Showroom & Layouts
                        </a>
                        <a href="{{ route('properties.show', $project->slug) }}#schedule-inspection" class="w-full inline-flex items-center justify-center px-4 py-2.5 text-[11px] font-extrabold uppercase tracking-widest text-slate-600 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                            Request Investment Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 px-8 rounded-[2.5rem] bg-white border border-slate-200 text-center flex flex-col items-center gap-4">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest bg-blue-100 text-blue-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span> Portfolio Notice
                    </span>
                    <h3 class="text-2xl font-serif font-extrabold text-slate-900">No Projects Currently in Development</h3>
                    <p class="text-sm text-slate-500 font-semibold max-w-md">All current development projects have either been completed or acquired. New development announcements will be published here.</p>
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-slate-900 hover:bg-brand text-white font-extrabold text-xs uppercase tracking-widest rounded-xl shadow-md transition-all">
                        Explore Available Showrooms
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
