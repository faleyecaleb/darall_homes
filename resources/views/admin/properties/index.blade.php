@extends('layouts.admin')

@section('title', 'Corporate Listings Registry')

@section('content')
<!-- Header & Call to Action -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
    <div class="flex flex-col gap-1">
        <h1 class="text-3xl font-serif text-slate-900 tracking-tight">Showrooms Registry</h1>
        <p class="text-sm text-slate-500 font-light">Add, edit, manage, and monitor all virtual-first property listings.</p>
    </div>
    
    <!-- Connected to create route -->
    <a href="{{ route('admin.properties.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-xs font-semibold text-white bg-slate-900 hover:bg-slate-800 rounded-xl shadow-lg transition-all duration-150">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Premium Property
    </a>
</div>

<!-- Registry Advanced Table Wrapper -->
<div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm flex flex-col gap-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <!-- Quick search placeholder -->
        <div class="relative w-full sm:w-80">
            <input type="text" placeholder="Search registry..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-red-500 focus:bg-white transition-all">
            <span class="absolute right-4 top-3 text-slate-400">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
        </div>
        <!-- Right align stats -->
        <span class="text-xs text-slate-400">Active Node: <strong class="text-slate-950 font-semibold">{{ $properties->count() }}</strong> Listed Records</span>
    </div>

    <!-- Live Data Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase text-xs">
                    <th class="pb-4">Featured Image & Title</th>
                    <th class="pb-4">Location</th>
                    <th class="pb-4">Category</th>
                    <th class="pb-4">Value</th>
                    <th class="pb-4">Virtual Tour</th>
                    <th class="pb-4">Status</th>
                    <th class="pb-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($properties as $property)
                    <tr class="text-slate-700 group hover:bg-slate-50/50 transition-colors">
                        <!-- Property Info with cover image -->
                        <td class="py-5 flex items-center gap-3">
                            @if($property->coverImage)
                                <span class="h-12 w-16 rounded-xl bg-cover bg-center shadow-inner flex-shrink-0" style="background-image: url('{{ $property->coverImage->file_path }}');"></span>
                            @else
                                <span class="h-12 w-16 rounded-xl bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-400">No Image</span>
                            @endif
                            <div class="flex flex-col">
                                <span class="font-bold text-slate-900 group-hover:text-brand-red-600 transition-colors">{{ $property->title }}</span>
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">{{ $property->property_type }}</span>
                            </div>
                        </td>
                        
                        <!-- Location -->
                        <td class="py-5">
                            <span class="text-slate-600">{{ $property->location->name }}</span>
                        </td>
                        
                        <!-- Category -->
                        <td class="py-5">
                            <span class="text-slate-600 font-medium">{{ $property->category->name }}</span>
                        </td>
                        
                        <!-- Value / Price -->
                        <td class="py-5 font-sans">
                            @if($property->property_type === 'Shortlet')
                                <span class="font-bold text-slate-950">₦{{ number_format($property->price) }}<span class="text-[10px] text-slate-400 font-light">/n</span></span>
                            @else
                                <span class="font-bold text-slate-950">₦{{ number_format($property->price) }}</span>
                            @endif
                        </td>

                        <!-- Virtual Tour Status -->
                        <td class="py-5">
                            @if($property->virtualTour)
                                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                                    <span class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse"></span> Matterport
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-slate-400 bg-slate-50 px-2.5 py-1 rounded-full border border-slate-100">
                                    None
                                </span>
                            @endif
                        </td>
                        
                        <!-- Status -->
                        <td class="py-5 text-xs font-bold uppercase">
                            @if($property->isSoldOut())
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-rose-100 text-rose-700 border border-rose-200">
                                    Sold Out
                                </span>
                            @elseif($property->isRentedOut())
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                                    Rented Out
                                </span>
                            @elseif($property->status === 'Available')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    {{ $property->status }}
                                </span>
                            @elseif($property->status === 'Under Offer')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-brand-red-100 text-brand-red-700 border border-brand-red-200">
                                    {{ $property->status }}
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $property->status }}
                                </span>
                            @endif
                        </td>
                        
                        <!-- Actions menu with dynamic Edit and Delete triggers -->
                        <td class="py-5 text-right font-sans">
                            <div class="flex justify-end gap-2 items-center">
                                <a href="{{ route('properties.show', $property->slug) }}" target="_blank" class="p-2 rounded-xl text-slate-400 hover:text-brand-red-600 hover:bg-brand-red-500/10 transition-colors" title="View Showroom">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.properties.edit', $property->id) }}" class="p-2 rounded-xl text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-colors" title="Edit Listing">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this luxury showroom listing from the registry?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Listing">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            No listings currently found in the registry.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
