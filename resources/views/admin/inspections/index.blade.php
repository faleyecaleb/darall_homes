@extends('layouts.admin')

@section('title', 'Scheduled Physical Inspections & Tours')

@section('content')
<!-- Header Page Section -->
<div class="flex flex-col gap-1 mb-10 animate-fade-in duration-500">
    <h1 class="text-3xl font-extrabold tracking-tight text-[#1c1c1e] font-sans">
        Physical Inspections & Tours
    </h1>
    <p class="text-sm text-slate-500 font-light">Confirm schedules, assign local elite agents to properties, and monitor physical showings pipelines.</p>
</div>

@if(session('success'))
    <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        {{ session('success') }}
    </div>
@endif

<!-- Inspections Table Card -->
<div class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6 font-sans" x-data="{ editingRow: null, activeStatus: 'Pending', activeAgent: '' }">
    <div class="flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-900">Tours Schedule Index</h3>
        <span class="text-xs text-slate-400">Total Requests: <strong class="text-slate-950 font-semibold">{{ $inspections->count() }}</strong> Scheduled tours</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase text-xs">
                    <th class="pb-4">Client Details</th>
                    <th class="pb-4">Property</th>
                    <th class="pb-4">Preferred Date / Time</th>
                    <th class="pb-4">Assigned Agent</th>
                    <th class="pb-4">Status</th>
                    <th class="pb-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($inspections as $inspection)
                    <tr class="text-slate-700 group hover:bg-slate-50/50 transition-colors">
                        <!-- Client Contact info -->
                        <td class="py-5">
                            @if($inspection->user)
                                <span class="font-bold text-slate-900 block">{{ $inspection->user->name }}</span>
                                <span class="text-xs text-slate-400 font-mono block">{{ $inspection->user->email }}</span>
                            @else
                                <span class="font-bold text-slate-900 block">Lead Guest</span>
                                <span class="text-xs text-slate-400 font-sans block">Consult Enquiry message for phone</span>
                            @endif
                        </td>

                        <!-- Property -->
                        <td class="py-5">
                            @if($inspection->property)
                                <a href="{{ route('properties.show', $inspection->property->slug) }}" target="_blank" class="font-semibold text-slate-900 hover:text-brand transition-colors">
                                    {{ $inspection->property->title }}
                                </a>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block mt-0.5">{{ $inspection->property->location->name }}</span>
                            @else
                                <span class="text-slate-400">Linked Property Deleted</span>
                            @endif
                        </td>

                        <!-- Tour Date / Time -->
                        <td class="py-5 font-sans">
                            <span class="font-bold text-slate-900 block">{{ $inspection->requested_date->format('M d, Y') }}</span>
                            <span class="text-xs text-slate-400 block font-semibold uppercase tracking-wider mt-0.5">{{ $inspection->requested_time }}</span>
                        </td>

                        <!-- Assigned Agent (Inline form select with Alpine) -->
                        <td class="py-5">
                            <template x-if="editingRow !== '{{ $inspection->id }}'">
                                <span class="font-bold block" :class="'{{ $inspection->agent }}' ? 'text-slate-900' : 'text-slate-400 italic'">
                                    {{ $inspection->agent ? $inspection->agent->name : 'Unassigned' }}
                                </span>
                            </template>
                            
                            <!-- Select box shown inside Alpine editingRow state -->
                            <template x-if="editingRow === '{{ $inspection->id }}'">
                                <form id="form-{{ $inspection->id }}" action="{{ route('admin.inspections.update', $inspection->id) }}" method="POST" class="flex items-center gap-1.5">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" :value="activeStatus">
                                    <select name="assigned_agent_id" x-model="activeAgent" @change="document.getElementById('form-{{ $inspection->id }}').submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-2.5 py-1 text-xs font-semibold text-slate-700 focus:outline-none focus:ring-1 focus:ring-brand focus:border-transparent transition-all">
                                        <option value="">Unassigned</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </template>
                        </td>

                        <!-- Status Column (Inline toggles) -->
                        <td class="py-5">
                            <div class="flex items-center gap-2">
                                <template x-if="editingRow !== '{{ $inspection->id }}'">
                                    <button @click="editingRow = '{{ $inspection->id }}'; activeStatus = '{{ $inspection->status }}'; activeAgent = '{{ $inspection->assigned_agent_id }}'" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase rounded-full border transition-all cursor-pointer"
                                            :class="'{{ $inspection->status }}' === 'Pending' ? 'bg-brand-red-100 text-brand-red-700 border-brand-red-200' : ('{{ $inspection->status }}' === 'Confirmed' ? 'bg-blue-100 text-blue-700 border-blue-200' : ('{{ $inspection->status }}' === 'Completed' ? 'bg-emerald-100 text-emerald-700 border-emerald-200' : 'bg-rose-100 text-rose-700 border-rose-200'))">
                                        <span class="w-1.5 h-1.5 rounded-full" :class="'{{ $inspection->status }}' === 'Pending' ? 'bg-brand-red-500 animate-pulse' : ('{{ $inspection->status }}' === 'Confirmed' ? 'bg-blue-500 animate-pulse' : ('{{ $inspection->status }}' === 'Completed' ? 'bg-emerald-500' : 'bg-rose-500'))"></span>
                                        {{ $inspection->status }}
                                    </button>
                                </template>

                                <!-- Show full form with status select and cancel trigger during editingRow state -->
                                <template x-if="editingRow === '{{ $inspection->id }}'">
                                    <div class="flex items-center gap-1.5">
                                        <select name="status" x-model="activeStatus" @change="document.getElementById('form-{{ $inspection->id }}').submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-2.5 py-1 text-[10px] font-bold uppercase text-slate-700 focus:outline-none focus:ring-1 focus:ring-brand focus:border-transparent transition-all">
                                            <option value="Pending">Pending</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Rescheduled">Rescheduled</option>
                                        </select>
                                        <button type="button" @click="editingRow = null" class="p-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-500" title="Cancel">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </td>

                        <!-- Deletion Column -->
                        <td class="py-5 text-right font-sans">
                            <form action="{{ route('admin.inspections.destroy', $inspection->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this scheduled inspection from the database?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Inspection">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">No scheduled physical inspections found in the database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
