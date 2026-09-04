@extends('layouts.admin')

@section('title', 'Corporate Leads & Enquiries Registry')

@section('content')
<!-- Header Page Section -->
<div class="flex flex-col gap-1 mb-10 animate-fade-in duration-500">
    <h1 class="text-3xl font-extrabold tracking-tight text-[#1c1c1e] font-sans">
        Property Enquiries Registry
    </h1>
    <p class="text-sm text-slate-500 font-light">Monitor incoming customer leads, corporate enquiries, and update pipeline status.</p>
</div>

@if(session('success'))
    <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        {{ session('success') }}
    </div>
@endif

<!-- Enquiries Table Card -->
<div class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6 font-sans" x-data="{ editingStatus: false, activeId: null, activeStatus: 'New' }">
    <div class="flex justify-between items-center">
        <h3 class="text-lg font-bold text-slate-900">Incoming Enquiries Index</h3>
        <span class="text-xs text-slate-400">Total Enquiries: <strong class="text-slate-950 font-semibold">{{ $enquiries->count() }}</strong> Records</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase text-xs">
                    <th class="pb-4">Client Contact Details</th>
                    <th class="pb-4">Associated Property</th>
                    <th class="pb-4">Client Message / Specs</th>
                    <th class="pb-4">Status</th>
                    <th class="pb-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($enquiries as $enquiry)
                    <tr class="text-slate-700 group hover:bg-slate-50/50 transition-colors">
                        <!-- Client Contact info -->
                        <td class="py-5 flex flex-col gap-0.5">
                            <span class="font-bold text-slate-900">{{ $enquiry->name }}</span>
                            <span class="text-xs text-slate-400 font-mono">{{ $enquiry->email }}</span>
                            <span class="text-xs text-slate-400 font-sans mt-0.5">{{ $enquiry->phone }}</span>
                        </td>

                        <!-- Linked Property -->
                        <td class="py-5">
                            @if($enquiry->property)
                                <a href="{{ route('properties.show', $enquiry->property->slug) }}" target="_blank" class="font-semibold text-slate-900 hover:text-brand transition-colors">
                                    {{ $enquiry->property->title }}
                                </a>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block mt-0.5">{{ $enquiry->property->location->name }}</span>
                            @else
                                <span class="text-slate-400">General Enquiry</span>
                            @endif
                        </td>

                        <!-- Client message -->
                        <td class="py-5 max-w-xs overflow-hidden">
                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-3" title="{{ $enquiry->message }}">{{ $enquiry->message }}</p>
                            <span class="text-[10px] text-slate-400 font-semibold mt-1.5 block uppercase tracking-wider">{{ $enquiry->created_at->format('M d, Y • h:i A') }}</span>
                        </td>

                        <!-- Pipeline Status (Inline Selector Toggle using Alpine) -->
                        <td class="py-5">
                            <div class="flex items-center gap-2">
                                <!-- Standard display status -->
                                <template x-if="!editingStatus || activeId !== '{{ $enquiry->id }}'">
                                    <button @click="editingStatus = true; activeId = '{{ $enquiry->id }}'; activeStatus = '{{ $enquiry->status }}'" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1 text-[10px] font-bold uppercase rounded-full border transition-all cursor-pointer"
                                            :class="'{{ $enquiry->status }}' === 'New' ? 'bg-amber-100 text-amber-700 border-amber-200' : ('{{ $enquiry->status }}' === 'Contacted' ? 'bg-indigo-100 text-indigo-700 border-indigo-200' : ('{{ $enquiry->status }}' === 'Qualified' ? 'bg-emerald-100 text-emerald-700 border-emerald-200' : 'bg-slate-100 text-slate-700 border-slate-200'))">
                                        <span class="w-1.5 h-1.5 rounded-full" :class="'{{ $enquiry->status }}' === 'New' ? 'bg-amber-500 animate-pulse' : ('{{ $enquiry->status }}' === 'Contacted' ? 'bg-indigo-500' : ('{{ $enquiry->status }}' === 'Qualified' ? 'bg-emerald-500' : 'bg-slate-500'))"></span>
                                        {{ $enquiry->status }}
                                    </button>
                                </template>

                                <!-- Interactive Alpine Select Dropdown Form for inline updates -->
                                <template x-if="editingStatus && activeId === '{{ $enquiry->id }}'">
                                    <form action="{{ route('admin.enquiries.update', $enquiry->id) }}" method="POST" class="flex items-center gap-1.5">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" x-model="activeStatus" @change="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-2 py-1 text-[10px] font-bold uppercase text-slate-700 focus:outline-none focus:ring-1 focus:ring-brand focus:border-transparent transition-all">
                                            <option value="New">New</option>
                                            <option value="Contacted">Contacted</option>
                                            <option value="Qualified">Qualified</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                        <button type="button" @click="editingStatus = false" class="p-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-500" title="Cancel">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </template>
                            </div>
                        </td>

                        <!-- Deletion Column -->
                        <td class="py-5 text-right font-sans">
                            <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this enquiry from the database?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Enquiry">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-slate-400">No customer enquiries found in the database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
