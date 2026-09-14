@extends('layouts.admin')

@section('title', 'Revenue & Hospitality Financials')

@section('content')
<div class="flex flex-col gap-8 font-sans pb-10">

    <!-- Top Greeting Branding Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in">
        <div>
            <h1 class="text-3xl font-serif font-extrabold text-slate-900 dark:text-white tracking-tight">Hospitality Revenue Report</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Monitor shortlet reservation payouts, nightly yield allocations, and accounts receivable.</p>
        </div>
    </div>

    <!-- COGNIFY Centered Rounded Reports Navigation Pills - Adaptive Light/Dark Support -->
    <div class="flex items-center gap-2 p-1.5 bg-slate-100/70 dark:bg-slate-800/80 rounded-full border border-slate-200/30 dark:border-slate-800 w-max transition-colors duration-300 animate-fade-in delay-100">
        <a href="{{ route('admin.reports.revenue') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all bg-brand-dark text-white dark:bg-brand dark:text-white shadow-sm">
            Revenue Ledger
        </a>
        <a href="{{ route('admin.reports.operations') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
            Operations Funnel
        </a>
        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('admin.reports.compliance') }}" 
               class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
                Compliance Telemetry
            </a>
        @endif
    </div>

    <!-- 1. FINANCIAL SUMMARY HIGHLIGHTS (Dynamic Counter Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-slide-up">
        
        <!-- Total Shortlet Revenue -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Hospitality Revenue</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-[#0d6e60] dark:text-emerald-400">₦{{ number_format($totalRevenue) }}</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Combined sum of all Confirmed/Completed checkouts</span>
            </div>
        </div>

        <!-- Average Booking Value -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Average Reservation Value</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">₦{{ number_format($averageBookingValue, 1) }}</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Average transaction value per shortlet stay</span>
            </div>
        </div>

        <!-- Total Nights Stayed -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Nights Reserved</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $totalNightsBooked }} Night(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Active, occupied shortlet stay nights</span>
            </div>
        </div>
    </div>

    <!-- 2. PROPERTY BREAKDOWN GRID & BILLING RATIOS -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slide-up delay-100">
        
        <!-- Shortlets Revenue Ledger Table (Takes up 2 Columns) -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Asset Revenue Contributions</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Comparative performance metrics across our shortlet units.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 dark:border-slate-800 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                            <th class="py-4">Property Asset</th>
                            <th class="py-4">Nights Stayed</th>
                            <th class="py-4">Revenue Contribution</th>
                            <th class="py-4 text-right">Percentage</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs font-semibold">
                        @forelse($propertyEarnings as $prop)
                            <tr class="text-slate-700 dark:text-slate-300">
                                <td class="py-4 font-sans">
                                    <span class="font-extrabold text-slate-900 dark:text-white block">{{ $prop->title }}</span>
                                    <span class="text-slate-400 dark:text-slate-500 font-medium block mt-0.5">{{ $prop->location->name }}</span>
                                </td>
                                <td class="py-4 font-sans text-slate-600 dark:text-slate-400">
                                    <span class="font-extrabold">{{ $prop->bookings_count }} reservation(s)</span>
                                </td>
                                <td class="py-4 font-sans font-extrabold text-slate-900 dark:text-white">
                                    ₦{{ number_format($prop->total_revenue) }}
                                </td>
                                <td class="py-4 text-right font-sans font-extrabold text-slate-500 dark:text-slate-400">
                                    {{ $totalRevenue > 0 ? round(($prop->total_revenue / $totalRevenue) * 100, 1) : 0 }}%
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-400 font-bold">No active shortlet assets in database.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Billing & Receivables Ratios (Takes up 1 Column) -->
        <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Billing Receivables</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Payment collections distribution ratios.</p>
            </div>

            <div class="flex-1 flex flex-col justify-around gap-6 py-4">
                
                <!-- Paid -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-baseline text-xs font-extrabold">
                        <span class="text-slate-500 dark:text-slate-400">PAID RESERVATIONS</span>
                        <span class="text-[#0d6e60] dark:text-emerald-400 text-sm font-extrabold" x-text="'{{ $paymentRatios['Paid'] }}%'"></span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand h-full rounded-full" style="width: {{ $paymentRatios['Paid'] }}%"></div>
                    </div>
                    <span class="text-[10px] text-slate-400 font-bold block">{{ $paymentPaid }} booking(s) verified</span>
                </div>

                <!-- Unpaid -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-baseline text-xs font-extrabold">
                        <span class="text-slate-500 dark:text-slate-400">UNPAID RESERVATIONS</span>
                        <span class="text-brand-red-500 text-sm font-extrabold" x-text="'{{ $paymentRatios['Unpaid'] }}%'"></span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand-red-500 h-full rounded-full" style="width: {{ $paymentRatios['Unpaid'] }}%"></div>
                    </div>
                    <span class="text-[10px] text-slate-400 font-bold block">{{ $paymentUnpaid }} pending checkout invoice(s)</span>
                </div>

                <!-- Refunded -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-baseline text-xs font-extrabold">
                        <span class="text-slate-500 dark:text-slate-400">REFUNDED INVOICES</span>
                        <span class="text-blue-500 text-sm font-extrabold" x-text="'{{ $paymentRatios['Refunded'] }}%'"></span>
                    </div>
                    <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full" style="width: {{ $paymentRatios['Refunded'] }}%"></div>
                    </div>
                    <span class="text-[10px] text-slate-400 font-bold block">{{ $paymentRefunded }} cancellation record(s)</span>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
