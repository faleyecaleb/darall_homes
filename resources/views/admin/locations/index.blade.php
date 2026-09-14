@extends('layouts.admin')

@section('title', 'Locations & Areas Registry')

@section('content')
<!-- Header Page Section -->
<div class="flex flex-col gap-1 mb-10 animate-fade-in duration-500">
    <h1 class="text-3xl font-extrabold tracking-tight text-[#1c1c1e] font-sans">
        Sovereign Locations & Areas
    </h1>
    <p class="text-sm text-slate-500 font-light">Define and monitor local high-end communities (e.g., Lekki Phase 1, Old Ikoyi, Banana Island).</p>
</div>

@if(session('success'))
    <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-semibold flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-8 p-4 rounded-2xl bg-rose-50 border border-rose-100 text-rose-700 text-sm font-semibold flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
        {{ session('error') }}
    </div>
@endif

<!-- Two-Column Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start font-sans" x-data="{ editing: false, editId: null, editName: '' }">
    
    <!-- Left Column: Locations Index -->
    <div class="lg:col-span-8 bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
        <h3 class="text-lg font-bold text-slate-900">Locations Index</h3>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase text-xs">
                        <th class="pb-4">Location Name</th>
                        <th class="pb-4">Scope Type</th>
                        <th class="pb-4">Linked Listings</th>
                        <th class="pb-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($locations as $location)
                        <tr class="text-slate-700 group hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 font-bold text-slate-900">{{ $location->name }}</td>
                            <td class="py-4 text-xs text-slate-400 font-mono">{{ $location->type }}</td>
                            <td class="py-4">
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                    {{ $location->properties_count }} Listings
                                </span>
                            </td>
                            <td class="py-4 text-right">
                                <div class="flex justify-end gap-2 items-center">
                                    <button @click="editing = true; editId = '{{ $location->id }}'; editName = '{{ $location->name }}'" class="p-2 rounded-xl text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-colors" title="Edit Location">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>

                                    <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this location?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Location">
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
                            <td colspan="4" class="py-8 text-center text-slate-400">No locations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Create/Edit Panel -->
    <div class="lg:col-span-4 flex flex-col gap-8">
        
        <!-- Create -->
        <div x-show="!editing" class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
            <h3 class="text-lg font-bold text-slate-900">Add New Area</h3>
            
            <form action="{{ route('admin.locations.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Area / Location Name</label>
                    <input type="text" name="name" required placeholder="e.g. Banana Island" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-bold text-white bg-brand hover:bg-[#095246] rounded-full shadow-md transition-all duration-150 transform hover:scale-[1.02]">
                    Create Location Area
                </button>
            </form>
        </div>

        <!-- Edit -->
        <div x-show="editing" style="display: none;" class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6 border-brand-red-500/30">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-slate-900">Edit Location Area</h3>
                <button @click="editing = false" class="text-xs font-semibold text-slate-400 hover:text-slate-600">Cancel</button>
            </div>
            
            <form :action="'/admin/locations/' + editId" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Area / Location Name</label>
                    <input type="text" name="name" required x-model="editName" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 text-xs font-bold text-white bg-slate-900 hover:bg-slate-800 rounded-full shadow-md transition-all duration-150 transform hover:scale-[1.02]">
                    Save Location Changes
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
