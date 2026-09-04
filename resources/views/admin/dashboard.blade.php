@extends('layouts.admin')

@section('title', 'Property Portfolio Overview')

@section('content')
<!-- Header Page Section (Cognify Style) -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <h1 class="text-3xl font-extrabold tracking-tight text-[#1c1c1e] font-sans">
        Portfolio Management Overview
    </h1>
    
    <!-- Premium Rounded Black Action Pill -->
    <a href="{{ route('admin.properties.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-xs font-bold text-white bg-[#1c1c1e] hover:bg-slate-800 rounded-full shadow-md transition-all duration-150">
        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
        </svg>
        <span>Add Premium Property</span>
    </a>
</div>

<!-- 1. METRICS CARDS ROW (Cognify Style) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
    
    <!-- Card 1: Active Listings (Green) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col justify-between min-h-[220px]">
        <div class="flex justify-between items-start">
            <div class="h-14 w-14 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            
            <!-- Top Right Action Circle -->
            <button class="h-10 w-10 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-slate-500 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

        <div class="my-6">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Active Showrooms</span>
            <div class="flex items-baseline gap-3">
                <span class="text-5xl font-extrabold text-slate-900 leading-none">3</span>
                <span class="text-xs font-bold text-rose-500 bg-rose-50 px-2 py-0.5 rounded-full flex items-center gap-0.5">
                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    12%
                </span>
            </div>
        </div>

        <div class="flex justify-between items-center text-xs font-semibold pt-4 border-t border-slate-50">
            <span class="text-slate-400">Dynamic of listings</span>
            <span class="px-4 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-full transition-colors cursor-pointer">Monthly</span>
        </div>
    </div>

    <!-- Card 2: Total Enquiries (Blue) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col justify-between min-h-[220px]">
        <div class="flex justify-between items-start">
            <div class="h-14 w-14 rounded-full bg-blue-500/10 text-blue-600 flex items-center justify-center">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
            
            <button class="h-10 w-10 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-slate-500 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

        <div class="my-6">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Corporate Enquiries</span>
            <div class="flex items-baseline gap-3">
                <span class="text-5xl font-extrabold text-slate-900 leading-none">1,234</span>
                <span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full flex items-center gap-0.5">
                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    23%
                </span>
            </div>
        </div>

        <div class="flex justify-between items-center text-xs font-semibold pt-4 border-t border-slate-50">
            <span class="text-slate-400">Dynamic of leads</span>
            <span class="px-4 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-full transition-colors cursor-pointer">Monthly</span>
        </div>
    </div>

    <!-- Card 3: Team Members / Active Agents (Pink) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col justify-between min-h-[220px]">
        <div class="flex justify-between items-start">
            <div class="h-14 w-14 rounded-full bg-rose-500/10 text-rose-600 flex items-center justify-center">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            
            <button class="h-10 w-10 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-slate-500 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>

        <div class="my-6">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Corporate Advisory Team</span>
            <div class="flex items-baseline gap-3">
                <span class="text-5xl font-extrabold text-slate-900 leading-none">4</span>
                <span class="text-xs text-slate-400 ml-1">Elite Agents</span>
            </div>
        </div>

        <!-- Cognify Avatars Overlaps Footer -->
        <div class="flex justify-between items-center pt-4 border-t border-slate-50">
            <span class="text-xs font-semibold text-slate-400">Manage Agents</span>
            <div class="flex items-center">
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt="Agent 1">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="Agent 2">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=100&q=80" alt="Agent 3">
                </div>
                <button class="h-8 w-8 rounded-full bg-slate-100 border border-slate-200 text-slate-500 font-bold flex items-center justify-center text-xs ml-2 hover:bg-slate-250 transition-colors">
                    +
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 2. COGNIFY WIDGETS ROW -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Widget 1: Task Progress (Distribution Graph) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-900">Showrooms Activity</h3>
            <!-- Chart key -->
            <div class="flex gap-4 text-xs font-bold text-slate-400 uppercase tracking-wider">
                <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span> Sale</span>
                <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span> Shortlet</span>
            </div>
        </div>

        <div class="my-2">
            <span class="text-5xl font-extrabold text-slate-900">70%</span>
            <p class="text-xs text-slate-400 mt-1 font-semibold uppercase tracking-wider">Average conversion views</p>
        </div>

        <!-- Custom Pillar Bar Chart Concept -->
        <div class="flex items-end justify-between h-48 px-4 bg-slate-50/50 rounded-2xl border border-slate-100/50 py-4">
            <!-- Pillar 1 -->
            <div class="flex flex-col items-center gap-2 w-full">
                <div class="relative w-8 bg-slate-100 rounded-full h-36 flex flex-col justify-end overflow-hidden">
                    <div class="bg-rose-500 w-full rounded-full h-[65%]"></div>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase">Lekki</span>
            </div>
            
            <!-- Pillar 2 -->
            <div class="flex flex-col items-center gap-2 w-full">
                <div class="relative w-8 bg-slate-100 rounded-full h-36 flex flex-col justify-end overflow-hidden">
                    <div class="bg-blue-500 w-full rounded-full h-[40%]"></div>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase">Ikoyi</span>
            </div>
            
            <!-- Pillar 3 -->
            <div class="flex flex-col items-center gap-2 w-full">
                <div class="relative w-8 bg-slate-100 rounded-full h-36 flex flex-col justify-end overflow-hidden">
                    <div class="bg-emerald-500 w-full rounded-full h-[85%]"></div>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase">V.I.</span>
            </div>
        </div>
    </div>

    <!-- Widget 2: Project Status (Circular Progress Chart) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-900">Showroom Status</h3>
            <button class="text-xs font-semibold text-slate-400 uppercase tracking-wider bg-slate-100 px-3 py-1 rounded-full">Active</button>
        </div>

        <!-- Circular Progress Chart container -->
        <div class="relative flex items-center justify-center py-4">
            <!-- Circular SVG Diagram -->
            <svg class="w-44 h-44 transform -rotate-90">
                <circle cx="88" cy="88" r="76" stroke="#f1f5f9" stroke-width="14" fill="transparent" />
                <circle cx="88" cy="88" r="76" stroke="#0d6e60" stroke-width="14" stroke-dasharray="477" stroke-dashoffset="140" fill="transparent" class="transition-all duration-1000" />
                <circle cx="88" cy="88" r="76" stroke="#0088cc" stroke-width="14" stroke-dasharray="477" stroke-dashoffset="360" fill="transparent" class="transition-all duration-1000" />
            </svg>
            <div class="absolute flex flex-col items-center justify-center">
                <span class="text-3xl font-extrabold text-slate-950 font-sans">3</span>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Active Spaces</span>
            </div>
        </div>

        <!-- Metrics Breakdowns under chart -->
        <div class="space-y-3 pt-4 border-t border-slate-50 text-xs">
            <div class="flex justify-between items-center">
                <span class="text-slate-500 font-medium">Completed & Available</span>
                <span class="font-bold text-slate-900">2 / 3 Showrooms</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                <div class="bg-[#0d6e60] h-full rounded-full w-[66%]"></div>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-slate-500 font-medium">Bespoke In-Progress</span>
                <span class="font-bold text-slate-900">1 / 3 Showrooms</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-full rounded-full w-[33%]"></div>
            </div>
        </div>
    </div>

    <!-- Widget 3: Productivity Trend (Fluid Area Line Chart) -->
    <div class="bg-white rounded-[2.2rem] p-8 border border-slate-100 shadow-sm flex flex-col gap-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-900">Views & Traffic Trend</h3>
            <!-- Dropdown selector -->
            <button class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-700 bg-slate-100 px-3 py-1.5 rounded-full">
                <span>Daily</span>
                <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <div class="my-1">
            <span class="text-4xl font-extrabold text-slate-950 font-sans">1,268 <span class="text-xs font-semibold text-slate-400 tracking-normal uppercase ml-1">views</span></span>
            <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mt-1">Real-time dynamic traffic</p>
        </div>

        <!-- Beautiful Area Line Chart Concept with SVG -->
        <div class="relative h-44 bg-slate-50/50 rounded-2xl border border-slate-100/50 flex flex-col justify-end p-4">
            <svg viewBox="0 0 300 120" class="w-full h-full overflow-visible">
                <defs>
                    <linearGradient id="blueGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.2" />
                        <stop offset="100%" stop-color="#3b82f6" stop-opacity="0" />
                    </linearGradient>
                </defs>
                <!-- Area path -->
                <path d="M0,100 Q40,50 80,75 T160,20 T240,65 T300,10 L300,120 L0,120 Z" fill="url(#blueGrad)" />
                <!-- Curve line path -->
                <path d="M0,100 Q40,50 80,75 T160,20 T240,65 T300,10" fill="transparent" stroke="#3b82f6" stroke-width="3" />
                <!-- Hot dots -->
                <circle cx="160" cy="20" r="5" fill="#3b82f6" stroke="#ffffff" stroke-width="2" />
                <circle cx="80" cy="75" r="4" fill="#3b82f6" stroke="#ffffff" stroke-width="1.5" />
            </svg>
            <!-- Timeline footer scale -->
            <div class="flex justify-between text-[9px] font-bold text-slate-400 uppercase tracking-wider mt-3 border-t border-slate-100/60 pt-2">
                <span>Mon</span>
                <span>Tue</span>
                <span class="text-blue-500">Wed</span>
                <span>Thu</span>
                <span>Fri</span>
            </div>
        </div>
    </div>

</div>
@endsection
