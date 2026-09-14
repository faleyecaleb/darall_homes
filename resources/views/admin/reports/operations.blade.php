@extends('layouts.admin')

@section('title', 'Operations & Lead Funnels')

@section('content')
<div class="flex flex-col gap-8 font-sans pb-10">

    <!-- Top Greeting Branding Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in">
        <div>
            <h1 class="text-3xl font-serif font-extrabold text-slate-900 dark:text-white tracking-tight">Operations Funnel Report</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Review pipeline conversion velocity, agent allocations, and property demand interest heatmaps.</p>
        </div>
    </div>

    <!-- COGNIFY Centered Rounded Reports Navigation Pills - Adaptive Light/Dark Support -->
    <div class="flex items-center gap-2 p-1.5 bg-slate-100/70 dark:bg-slate-800/80 rounded-full border border-slate-200/30 dark:border-slate-800 w-max transition-colors duration-300 animate-fade-in delay-100">
        <a href="{{ route('admin.reports.revenue') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
            Revenue Ledger
        </a>
        <a href="{{ route('admin.reports.operations') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all bg-brand-dark text-white dark:bg-brand dark:text-white shadow-sm">
            Operations Funnel
        </a>
        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('admin.reports.compliance') }}" 
               class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
                Compliance Telemetry
            </a>
        @endif
    </div>

    <!-- 1. OPERATIONS LEAD STATS (Dynamic Counter Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-slide-up">
        
        <!-- Total Leads Intake -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Pipeline Leads</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-brand dark:text-emerald-400">{{ $totalLeads }} Lead(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Combined sum of enquiries and showing tours</span>
            </div>
        </div>

        <!-- Total Enquiries -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Enquiries Received</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $totalEnquiries }} Lead(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Text-based inquiries regarding listings</span>
            </div>
        </div>

        <!-- Total Tours Scheduled -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Showings Scheduled</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $totalInspections }} Tour(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Physical showing/inspection schedules logged</span>
            </div>
        </div>
    </div>

    <!-- 2. PIPELINES FUNNELS STACKS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 animate-slide-up delay-100">
        
        <!-- Enquiry Pipeline Stacks -->
        <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Enquiries Funnel Conversion</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Lead progression across CRM stages.</p>
            </div>

            <div class="flex flex-col gap-4 py-2">
                
                <!-- NEW (New) -->
                @php $totalEnqRec = max(1, $totalEnquiries); @endphp
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">NEW INTAKES</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $enquiryNew }} ({{ round(($enquiryNew / $totalEnqRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand-red-400 h-full rounded-full" style="width: {{ ($enquiryNew / $totalEnqRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Contacted -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">CONTACTED LEADS</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $enquiryContacted }} ({{ round(($enquiryContacted / $totalEnqRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full" style="width: {{ ($enquiryContacted / $totalEnqRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Qualified -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">QUALIFIED ACQUISITIONS</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $enquiryQualified }} ({{ round(($enquiryQualified / $totalEnqRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: {{ ($enquiryQualified / $totalEnqRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Closed -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">CLOSED DEAL / SIGNED</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $enquiryClosed }} ({{ round(($enquiryClosed / $totalEnqRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-slate-500 h-full rounded-full" style="width: {{ ($enquiryClosed / $totalEnqRec) * 100 }}%"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tours Scheduled Funnel (Right Column) -->
        <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Physical Tours Pipeline</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Calendar scheduled inspections status distribution.</p>
            </div>

            <div class="flex flex-col gap-4 py-2">
                @php $totalInsRec = max(1, $totalInspections); @endphp
                
                <!-- Pending -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">PENDING CONFIRMATION</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $tourPending }} ({{ round(($tourPending / $totalInsRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand-red-400 h-full rounded-full" style="width: {{ ($tourPending / $totalInsRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Confirmed -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">CONFIRMED ITINERARY</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $tourConfirmed }} ({{ round(($tourConfirmed / $totalInsRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand h-full rounded-full" style="width: {{ ($tourConfirmed / $totalInsRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Completed -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">COMPLETED TOUR</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $tourCompleted }} ({{ round(($tourCompleted / $totalInsRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: {{ ($tourCompleted / $totalInsRec) * 100 }}%"></div>
                    </div>
                </div>

                <!-- Cancelled -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-xs font-bold">
                        <span class="text-slate-500 dark:text-slate-400">CANCELLED REQUESTS</span>
                        <span class="text-slate-900 dark:text-white font-extrabold">{{ $tourCancelled }} ({{ round(($tourCancelled / $totalInsRec) * 100, 1) }}%)</span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-rose-500 h-full rounded-full" style="width: {{ ($tourCancelled / $totalInsRec) * 100 }}%"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- 3. PROPERTY INTEREST HEATMAP (IMMERSIVE SHOWROOM CONVERSION ANALYSIS) -->
    <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6 animate-slide-up delay-200">
        <div>
            <h3 class="text-lg font-extrabold text-slate-900 dark:text-white font-serif tracking-tight">Property Demand Interest Heatmap</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Top-performing property listings based on total enquiries received and physical showings scheduled.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 dark:border-slate-800 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                        <th class="py-4">Property Showcase Asset</th>
                        <th class="py-4">Type</th>
                        <th class="py-4">Price</th>
                        <th class="py-4">Written Enquiries</th>
                        <th class="py-4">Showings Toured</th>
                        <th class="py-4 text-right">Total Interactions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs font-semibold">
                    @forelse($propertyHeatmap as $heatmap)
                        <tr class="text-slate-700 dark:text-slate-300">
                            <!-- Showcase Info -->
                            <td class="py-4 font-sans">
                                <span class="font-extrabold text-slate-900 dark:text-white block">{{ $heatmap->title }}</span>
                                <span class="text-slate-400 dark:text-slate-500 font-medium block mt-0.5">{{ $heatmap->location->name }}</span>
                            </td>

                            <!-- Type badge -->
                            <td class="py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider"
                                      :class="{
                                          'bg-blue-500/10 text-blue-600': '{{ $heatmap->property_type }}' === 'Shortlet',
                                          'bg-emerald-500/10 text-emerald-600': '{{ $heatmap->property_type }}' === 'Sale'
                                      }">
                                    {{ $heatmap->property_type }}
                                </span>
                            </td>

                            <!-- Price valuation -->
                            <td class="py-4 font-sans font-extrabold text-slate-900 dark:text-white">
                                ₦{{ number_format($heatmap->price) }}
                            </td>

                            <!-- Enquiries -->
                            <td class="py-4 font-sans font-extrabold text-slate-500 dark:text-slate-400">
                                {{ $heatmap->enquiries_count }} lead(s)
                            </td>

                            <!-- Inspections -->
                            <td class="py-4 font-sans font-extrabold text-slate-500 dark:text-slate-400">
                                {{ $heatmap->inspection_requests_count }} showing(s)
                            </td>

                            <!-- Total -->
                            <td class="py-4 text-right font-sans font-extrabold text-brand dark:text-emerald-400 text-sm">
                                {{ $heatmap->total_leads }} interaction(s)
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400 font-bold">No property interaction records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
