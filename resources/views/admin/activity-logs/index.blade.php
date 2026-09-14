@extends('layouts.admin')

@section('title', 'System Activity Audit Ledger')

@section('content')
<div class="flex flex-col gap-8 font-sans pb-10">

    <!-- Top Greeting Branding Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in">
        <div>
            <h1 class="text-3xl font-serif font-extrabold text-slate-900 dark:text-white tracking-tight">Compliance Audit Trail</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Real-time immutable system activity logs monitoring administrative and advisor interactions.</p>
        </div>
    </div>

    <!-- 1. DYNAMIC SEARCH & FILTER PANEL (hoomeee x Cognify Premium Filter) -->
    <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-6 shadow-sm flex flex-col gap-4 animate-fade-in delay-100">
        <form action="{{ route('admin.activity-logs.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            
            <!-- Text Search input -->
            <div class="relative flex items-center">
                <span class="absolute left-4 text-slate-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or IP..." class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl pl-12 pr-4 py-3.5 text-xs text-slate-700 dark:text-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-dark focus:bg-white transition-all font-semibold" />
            </div>

            <!-- Action Filter Dropdown -->
            <div>
                <select name="action_filter" class="w-full bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl px-4 py-3.5 text-xs text-slate-700 dark:text-slate-200 font-semibold focus:outline-none focus:ring-2 focus:ring-brand-dark focus:bg-white transition-all">
                    <option value="">All Actions Categories</option>
                    @foreach($distinctActions as $action)
                        <option value="{{ $action }}" {{ request('action_filter') === $action ? 'selected' : '' }}>{{ $action }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Filters Button & Reset link -->
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 inline-flex items-center justify-center px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-white bg-brand-dark hover:bg-slate-800 rounded-2xl transition-all shadow-md">
                    Apply Filter
                </button>
                @if(request()->anyFilled(['search', 'action_filter']))
                    <a href="{{ route('admin.activity-logs.index') }}" class="px-4 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-rose-600 transition-colors">
                        Clear
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- 2. AUDIT TRAIL LEDGER TABLE (Immutable Operations Compliance Log) -->
    <div class="bg-white dark:bg-slate-800/90 border border-slate-100 dark:border-slate-800 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6 animate-fade-in delay-200">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white font-serif tracking-tight">Immutable Activity Ledger</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">System compliance logs: <strong class="text-slate-900 dark:text-white font-bold">{{ $logs->total() }} total entries recorded</strong></p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 dark:border-slate-800 text-[10px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500">
                        <th class="py-4">System Actor</th>
                        <th class="py-4">Category Event</th>
                        <th class="py-4">Operations Logging Details</th>
                        <th class="py-4">Device Footprint</th>
                        <th class="py-4 text-right">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs font-semibold">
                    @forelse($logs as $log)
                        <tr class="text-slate-700 dark:text-slate-300 group hover:bg-slate-50/50 dark:hover:bg-slate-900/40 transition-colors">
                            <!-- Actor details column -->
                            <td class="py-5 font-sans">
                                <span class="font-extrabold text-slate-900 dark:text-white text-sm block">{{ $log->user_name }}</span>
                                <span class="text-slate-400 dark:text-slate-500 font-medium block mt-0.5">{{ $log->user_email }}</span>
                                <span class="text-[10px] text-brand font-extrabold block mt-1 tracking-wider bg-brand/5 px-2 py-0.5 rounded-lg w-max">{{ $log->ip_address }}</span>
                            </td>

                            <!-- Event Category Badge -->
                            <td class="py-5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider"
                                      :class="{
                                          'bg-blue-500/10 text-blue-600': '{{ $log->action }}'.includes('Property') || '{{ $log->action }}'.includes('Listing'),
                                          'bg-emerald-500/10 text-emerald-600': '{{ $log->action }}'.includes('Booking') || '{{ $log->action }}'.includes('Reservation'),
                                          'bg-brand-red-500/10 text-brand-red-600': '{{ $log->action }}'.includes('Login') || '{{ $log->action }}'.includes('Logout'),
                                          'bg-purple-500/10 text-purple-600': '{{ $log->action }}'.includes('Enquiry') || '{{ $log->action }}'.includes('Inspection'),
                                          'bg-slate-500/10 text-slate-600 dark:text-slate-400': !'{{ $log->action }}'.includes('Property') && !'{{ $log->action }}'.includes('Booking') && !'{{ $log->action }}'.includes('Login') && !'{{ $log->action }}'.includes('Enquiry')
                                      }">
                                    {{ $log->action }}
                                </span>
                            </td>

                            <!-- Logging detailed explanation -->
                            <td class="py-5 font-sans leading-relaxed pr-6 max-w-sm">
                                <span class="text-slate-600 dark:text-slate-300 text-xs font-semibold">{{ $log->description }}</span>
                            </td>

                            <!-- Browser and OS user agent footprint -->
                            <td class="py-5 max-w-[180px] truncate text-[10px] text-slate-400 dark:text-slate-500 font-medium font-mono" 
                                title="{{ $log->user_agent }}">
                                {{ $log->user_agent ?? 'System Interface' }}
                            </td>

                            <!-- Exact Timestamp -->
                            <td class="py-5 text-right font-sans text-slate-500 dark:text-slate-400">
                                <span class="font-extrabold text-slate-800 dark:text-slate-200 block">{{ $log->created_at->format('M d, Y') }}</span>
                                <span class="text-[10px] font-medium block mt-0.5 text-slate-400 dark:text-slate-500">{{ $log->created_at->format('h:i:s A') }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400 font-bold">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <svg class="h-10 w-10 text-slate-300 dark:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span>No audit log records matching filters found.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls standard block -->
        @if($logs->hasPages())
            <div class="pt-6 border-t border-slate-100 dark:border-slate-800 font-sans">
                {{ $logs->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
