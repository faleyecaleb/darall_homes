@extends('layouts.admin')

@section('title', 'Compliance & Telemetry Logs')

@section('content')
<div class="flex flex-col gap-8 font-sans pb-10">

    <!-- Top Greeting Branding Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in">
        <div>
            <h1 class="text-3xl font-serif font-extrabold text-slate-900 dark:text-white tracking-tight">System Compliance & Telemetry</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Immutable Super Admin security analytics detailing login frequencies, database transactions, and network footprints.</p>
        </div>
    </div>

    <!-- COGNIFY Centered Rounded Reports Navigation Pills - Adaptive Light/Dark Support -->
    <div class="flex items-center gap-2 p-1.5 bg-slate-100/70 dark:bg-slate-800/80 rounded-full border border-slate-200/30 dark:border-slate-800 w-max transition-colors duration-300 animate-fade-in delay-100">
        <a href="{{ route('admin.reports.revenue') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
            Revenue Ledger
        </a>
        <a href="{{ route('admin.reports.operations') }}" 
           class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white">
            Operations Funnel
        </a>
        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('admin.reports.compliance') }}" 
               class="px-6 py-2 rounded-full text-xs font-semibold tracking-wide transition-all bg-brand-dark text-white dark:bg-brand dark:text-white shadow-sm">
                Compliance Telemetry
            </a>
        @endif
    </div>

    <!-- 1. COMPLIANCE SUMMARY HIGHLIGHTS (Dynamic Counter Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-slide-up">
        
        <!-- Total Logs Count -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Total Audit Inscriptions</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-brand dark:text-emerald-400">{{ $totalLogs }} Record(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Total database mutations and logins ledgered</span>
            </div>
        </div>

        <!-- Unique active users -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Unique Active Actors</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $uniqueUsersCount }} User(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Unique administrative emails recorded in ledger</span>
            </div>
        </div>

        <!-- Unique active network IPs -->
        <div class="bg-white dark:bg-slate-800/90 rounded-[2.2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm flex flex-col justify-between min-h-[160px]">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Unique Access IPs</span>
            <div class="flex flex-col text-left mt-2">
                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ $uniqueIpsCount }} Network(s)</span>
                <span class="text-[10px] text-slate-400 dark:text-slate-500 font-semibold mt-1">Unique IP address footprints logged</span>
            </div>
        </div>
    </div>

    <!-- 2. TELEMETRY ACTION CATEGORY RATIOS & TOP IP NETWORKS -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slide-up delay-100">
        
        <!-- Category events distribution ledger (Takes up 2 Columns) -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Activity Events Category Volume</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Total action inscriptions grouped by categories.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 dark:border-slate-800 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                            <th class="py-4">Event Category</th>
                            <th class="py-4">Inscriptions Logged</th>
                            <th class="py-4 text-right">Activity Ratio</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs font-semibold">
                        @forelse($actionCounts as $act)
                            <tr class="text-slate-700 dark:text-slate-300">
                                <td class="py-4 font-sans">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider"
                                          :class="{
                                              'bg-blue-500/10 text-blue-600': '{{ $act->action }}'.includes('Property') || '{{ $act->action }}'.includes('Listing'),
                                              'bg-emerald-500/10 text-emerald-600': '{{ $act->action }}'.includes('Booking') || '{{ $act->action }}'.includes('Reservation'),
                                              'bg-amber-500/10 text-amber-600': '{{ $act->action }}'.includes('Login') || '{{ $act->action }}'.includes('Logout'),
                                              'bg-purple-500/10 text-purple-600': '{{ $act->action }}'.includes('Enquiry') || '{{ $act->action }}'.includes('Inspection'),
                                              'bg-slate-500/10 text-slate-600': !'{{ $act->action }}'.includes('Property') && !'{{ $act->action }}'.includes('Booking') && !'{{ $act->action }}'.includes('Login') && !'{{ $act->action }}'.includes('Enquiry')
                                          }">
                                        {{ $act->action }}
                                    </span>
                                </td>
                                <td class="py-4 font-sans font-extrabold text-slate-900 dark:text-white">
                                    {{ $act->count }} action(s)
                                </td>
                                <td class="py-4 text-right font-sans font-extrabold text-slate-500 dark:text-slate-400">
                                    {{ $totalLogs > 0 ? round(($act->count / $totalLogs) * 100, 1) : 0 }}%
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center text-slate-400 font-bold">No operational activities ledgered yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top network footprints (Takes up 1 Column) -->
        <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <div>
                <h3 class="text-lg font-extrabold text-slate-900 dark:text-white">Top Access IPs</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Top network addresses querying your system.</p>
            </div>

            <div class="flex-1 flex flex-col justify-around gap-6 py-4">
                @forelse($topIps as $ip)
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-baseline text-xs font-extrabold">
                            <span class="text-brand dark:text-emerald-400 font-mono text-xs">{{ $ip->ip_address }}</span>
                            <span class="text-slate-900 dark:text-white font-extrabold">{{ $ip->count }} log(s)</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-900 h-2 rounded-full overflow-hidden">
                            <div class="bg-brand-dark dark:bg-brand h-full rounded-full" style="width: {{ $totalLogs > 0 ? ($ip->count / $totalLogs) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                @empty
                    <span class="text-xs text-slate-400 font-bold text-center block">No IP telemetry recorded yet.</span>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
