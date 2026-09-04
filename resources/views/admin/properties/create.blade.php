@extends('layouts.admin')

@section('title', 'Register New Luxury Showroom')

@section('content')
<!-- Header Page Section -->
<div class="flex flex-col gap-1 mb-10 animate-fade-in duration-500">
    <h1 class="text-3xl font-extrabold tracking-tight text-[#1c1c1e] font-sans">
        Register Luxury Listing
    </h1>
    <p class="text-sm text-slate-500 font-light">Input spatial metadata, pricing tiers, and embed active 3D virtual walkthroughs.</p>
</div>

<!-- Form Card Layout (Cognify x hoomeee style) -->
<div class="bg-white rounded-[2.2rem] border border-slate-100 p-8 sm:p-10 shadow-sm max-w-4xl">
    <!-- enctype="multipart/form-data" added for file upload -->
    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Core Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Property Title</label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. The Sapphire Penthouse" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                @error('title')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Investment Value (₦ Price)</label>
                <input type="number" name="price" required value="{{ old('price') }}" placeholder="e.g. 350000000" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">
                @error('price')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Property Description</label>
            <textarea name="description" rows="5" placeholder="Bespoke engineering description detailing finishings, ceiling heights, automated systems..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">{{ old('description') }}</textarea>
            @error('description')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
        </div>

        <!-- Classifications -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 font-sans">
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Listing Category</label>
                <select name="category_id" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Sovereign Location (Area)</label>
                <select name="location_id" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                    <option value="">Select Area</option>
                    @foreach($locations as $loc)
                        <option value="{{ $loc->id }}" {{ old('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                    @endforeach
                </select>
                @error('location_id')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Transaction Type</label>
                <select name="property_type" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                    <option value="Sale" {{ old('property_type') === 'Sale' ? 'selected' : '' }}>For Sale</option>
                    <option value="Rent" {{ old('property_type') === 'Rent' ? 'selected' : '' }}>For Rent</option>
                    <option value="Shortlet" {{ old('property_type') === 'Shortlet' ? 'selected' : '' }}>Shortlet Stay</option>
                </select>
                @error('property_type')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>
        </div>

        <!-- Specifications -->
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 font-sans">
            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Bedrooms</label>
                <input type="number" name="bedrooms" required value="{{ old('bedrooms', 0) }}" min="0" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">
                @error('bedrooms')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Bathrooms</label>
                <input type="number" name="bathrooms" required value="{{ old('bathrooms', 0) }}" min="0" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">
                @error('bathrooms')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Floor Area (sqm)</label>
                <input type="number" name="floor_area" value="{{ old('floor_area') }}" placeholder="e.g. 450" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">
                @error('floor_area')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Showroom Status</label>
                <select name="status" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all">
                    <option value="Available" {{ old('status', 'Available') === 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Under Offer" {{ old('status') === 'Under Offer' ? 'selected' : '' }}>Under Offer</option>
                    <option value="Sold" {{ old('status') === 'Sold' ? 'selected' : '' }}>Sold / Closed</option>
                    <option value="Rented" {{ old('status') === 'Rented' ? 'selected' : '' }}>Rented</option>
                    <option value="Draft" {{ old('status') === 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Archived" {{ old('status') === 'Archived' ? 'selected' : '' }}>Archived</option>
                </select>
                @error('status')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>
        </div>

        <!-- Selection of Signature Amenities (Newly Added Checklist!) -->
        <div class="flex flex-col gap-4 bg-slate-50 p-6 sm:p-8 rounded-[2rem] border border-slate-100 font-sans">
            <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Select Signature Amenities</span>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach($amenities as $amenity)
                    <label class="flex items-center gap-3 bg-white p-4 rounded-2xl border border-slate-200/50 hover:border-[#0d6e60]/30 hover:bg-slate-50/20 cursor-pointer select-none transition-all duration-150 transform hover:scale-[1.01]">
                        <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" {{ is_array(old('amenities')) && in_array($amenity->id, old('amenities')) ? 'checked' : '' }} class="h-5 w-5 rounded text-[#0d6e60] focus:ring-[#0d6e60] border-slate-200 cursor-pointer">
                        <span class="text-xs font-semibold text-slate-700">{{ $amenity->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Reconstructed Media Section with Exclusive Upload OR URL Selection -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 font-sans">
            <!-- Exclusive Cover Image Field (Alpine.js Tab Selection) -->
            <div class="flex flex-col gap-2 bg-slate-50 p-6 rounded-3xl border border-slate-100/70" x-data="{ imageSource: '{{ old('cover_image_file') ? 'file' : 'url' }}' }">
                <label class="text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2 block">Cover Photo Setup</label>
                
                <!-- Alpine Tab Buttons -->
                <div class="flex items-center gap-1.5 p-1 bg-slate-200/50 rounded-full border border-slate-200/30 max-w-[280px] mb-4">
                    <button type="button" @click="imageSource = 'url'" :class="imageSource === 'url' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-900'" class="flex-1 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide transition-all">
                        Pasted URL
                    </button>
                    <button type="button" @click="imageSource = 'file'" :class="imageSource === 'file' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-900'" class="flex-1 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide transition-all">
                        Uploaded File
                    </button>
                </div>

                <!-- Input Type 1: Paste Link -->
                <div x-show="imageSource === 'url'">
                    <input type="url" name="cover_image_url" value="{{ old('cover_image_url') }}" placeholder="https://images.unsplash.com/photo..." :disabled="imageSource !== 'url'" class="w-full bg-white border border-slate-200 rounded-xl px-5 py-4 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] transition-all font-sans">
                </div>

                <!-- Input Type 2: Upload File -->
                <div x-show="imageSource === 'file'" style="display: none;">
                    <input type="file" name="cover_image_file" accept="image/*" :disabled="imageSource !== 'file'" class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] transition-all">
                </div>
                
                @error('cover_image_file')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                @error('cover_image_url')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                <span class="text-[10px] text-slate-400 mt-2 font-medium">Define only one. Either paste a valid image URL OR select an image file to upload.</span>
            </div>

            <!-- Virtual Tour input -->
            <div class="flex flex-col gap-2 bg-white">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Matterport Embed / Tour URL</label>
                <input type="url" name="virtual_tour_url" value="{{ old('virtual_tour_url') }}" placeholder="https://my.matterport.com/show/?m=..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-4 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] focus:bg-white transition-all font-sans">
                @error('virtual_tour_url')<span class="text-xs text-rose-500 font-semibold">{{ $message }}</span>@enderror
            </div>
        </div>

        <!-- Featured checkbox -->
        <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100 max-w-sm font-sans">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-5 w-5 rounded text-[#0d6e60] focus:ring-[#0d6e60] border-slate-200 cursor-pointer">
            <label for="is_featured" class="text-sm font-semibold text-slate-700 cursor-pointer select-none">Feature this property on Homepage</label>
        </div>

        <!-- Submissions Actions -->
        <div class="flex gap-4 pt-4 border-t border-slate-100 font-sans">
            <button type="submit" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white bg-[#1c1c1e] hover:bg-slate-800 rounded-full shadow-md transition-all duration-150 transform hover:scale-[1.02]">
                Publish Showroom Listing
            </button>
            <a href="{{ route('admin.properties.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-full transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
