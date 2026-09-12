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
        <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100 max-w-sm font-sans mb-8">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-5 w-5 rounded text-[#0d6e60] focus:ring-[#0d6e60] border-slate-200 cursor-pointer">
            <label for="is_featured" class="text-sm font-semibold text-slate-700 cursor-pointer select-none">Feature this property on Homepage</label>
        </div>

        <!-- Luxury Layout Sections -->
        <div class="border-t border-slate-100 pt-8" x-data="{
            showLuxury: {{ old('has_luxury_layout') ? 'true' : 'false' }},
            units: {{ json_encode(old('units', [])) }} || [],
            addUnit() {
                this.units.push({
                    id: null,
                    name: '',
                    badge: '',
                    description: '',
                    bedrooms: 1,
                    bathrooms: 1,
                    floor_area: '',
                    outright_price: 0,
                    has_installment: false,
                    installment_duration: 6,
                    installment_total_price: 0,
                    installment_deposit_percent: 30,
                    installment_monthly_payment: 0,
                    image_url: '',
                    hotspots: []
                });
            },
            removeUnit(index) {
                this.units.splice(index, 1);
            }
        }">
            <!-- Enable Luxury Toggle -->
            <div class="flex items-center gap-3 bg-amber-500/5 border border-amber-500/10 p-6 rounded-[2rem] max-w-lg mb-8 select-none transition-all">
                <input type="checkbox" name="has_luxury_layout" id="has_luxury_layout" value="1" x-model="showLuxury" class="h-6 w-6 rounded text-amber-500 focus:ring-amber-500 border-slate-200 cursor-pointer">
                <div class="flex flex-col text-left">
                    <label for="has_luxury_layout" class="text-sm font-extrabold text-slate-800 cursor-pointer">Enable Luxury Showroom Layout</label>
                    <span class="text-[10px] text-slate-400 font-semibold">Toggles background video hero, 4 elevation perspectives, and dynamic layouts grid.</span>
                </div>
            </div>

            <!-- Luxury Content Panel -->
            <div x-show="showLuxury" x-transition class="space-y-10 mb-8" style="display: none;">
                
                <!-- 1. Hero Background Video -->
                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100/70 text-left font-sans flex flex-col gap-4">
                    <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider block">Luxury Background Video</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-slate-400">Pasted Video URL</label>
                            <input type="text" name="hero_video_url" value="{{ old('hero_video_url') }}" placeholder="e.g. /lumiere/lumiere-bg-video.mp4" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] transition-all font-sans">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-slate-400">Or Upload Video File</label>
                            <input type="file" name="hero_video_file" accept="video/*" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] transition-all">
                        </div>
                    </div>
                </div>

                <!-- 2. Cinematic Perspective Views -->
                <div class="space-y-6">
                    <div class="text-left">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider block mb-1">Cinematic Elevation Perspectives</span>
                        <p class="text-[10px] text-slate-400 font-medium">Define titles, subtitles, and descriptions for the 4 elevation viewpoints.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 font-sans">
                        @foreach(['front' => 'Front Elevation', 'left' => 'Left Side Elevation', 'right' => 'Right Side Elevation', 'back' => 'Rear Elevation'] as $key => $defaultTitle)
                            <div class="bg-slate-50 border border-slate-100 p-6 rounded-3xl space-y-4 text-left">
                                <span class="text-[10px] text-amber-500 font-extrabold uppercase tracking-widest block">{{ strtoupper($key) }} PERSPECTIVE</span>
                                <input type="hidden" name="perspectives[{{ $key }}][perspective_key]" value="{{ $key }}">
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Title</label>
                                        <input type="text" name="perspectives[{{ $key }}][title]" value="{{ old("perspectives.{$key}.title", $defaultTitle) }}" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60]">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Subtitle</label>
                                        <input type="text" name="perspectives[{{ $key }}][subtitle]" value="{{ old("perspectives.{$key}.subtitle", 'Perspective') }}" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60]">
                                    </div>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase">Image URL or Path</label>
                                    <input type="text" name="perspectives[{{ $key }}][image_url]" value="{{ old("perspectives.{$key}.image_url") }}" placeholder="/lumiere/{{$key}}-view-night.png" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] font-sans">
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase">Or Upload Elevation File</label>
                                    <input type="file" name="perspective_files[{{ $key }}]" accept="image/*" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60]">
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase">Lightbox Modal Description</label>
                                    <textarea name="perspectives[{{ $key }}][description]" rows="3" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#0d6e60] font-sans">{{ old("perspectives.{$key}.description") }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Dynamic Suites / Apartment Layouts repeater -->
                <div class="space-y-6">
                    <div class="flex justify-between items-center text-left">
                        <div>
                            <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider block font-sans">Apartment Layouts & Suites</span>
                            <p class="text-[10px] text-slate-400 font-medium font-sans">Add layouts, outright purchase prices, financing terms, and custom hotspots.</p>
                        </div>
                        <button type="button" @click="addUnit()" class="px-4 py-2.5 bg-[#1c1c1e] hover:bg-slate-800 text-white rounded-xl text-xs font-bold font-sans transition-all">
                            + Add Layout Unit
                        </button>
                    </div>

                    <div class="space-y-6">
                        <template x-for="(unit, index) in units" :key="index">
                            <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 sm:p-8 space-y-6 text-left relative font-sans shadow-sm">
                                <button type="button" @click="removeUnit(index)" class="absolute top-4 right-4 text-xs font-extrabold text-rose-500 hover:text-rose-600 uppercase focus:outline-none">
                                    Remove Layout
                                </button>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Layout Name</label>
                                        <input type="text" :name="'units['+index+'][name]'" x-model="unit.name" required placeholder="e.g. Lumiere Studio Suite" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Layout Badge</label>
                                        <input type="text" :name="'units['+index+'][badge]'" x-model="unit.badge" placeholder="e.g. Studio Apartment" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Layout Image URL / Path</label>
                                        <input type="text" :name="'units['+index+'][image_url]'" x-model="unit.image_url" placeholder="e.g. /lumiere/int-1.png" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Bedrooms</label>
                                        <input type="number" :name="'units['+index+'][bedrooms]'" x-model="unit.bedrooms" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Bathrooms</label>
                                        <input type="number" :name="'units['+index+'][bathrooms]'" x-model="unit.bathrooms" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Floor Area (sqm)</label>
                                        <input type="number" :name="'units['+index+'][floor_area]'" x-model="unit.floor_area" placeholder="e.g. 35" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                    <div class="flex flex-col gap-1.5">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase">Outright Price (₦)</label>
                                        <input type="number" :name="'units['+index+'][outright_price]'" x-model="unit.outright_price" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase">Or Upload Layout Image File</label>
                                    <input type="file" :name="'unit_files['+index+']'" accept="image/*" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none">
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase">Description</label>
                                    <textarea :name="'units['+index+'][description]'" x-model="unit.description" rows="3" placeholder="Description of the suite and finishes..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 focus:ring-2 focus:ring-[#0d6e60] focus:outline-none"></textarea>
                                </div>

                                <div class="p-6 bg-slate-100 rounded-2xl space-y-4">
                                    <div class="flex items-center gap-2 select-none">
                                        <input type="checkbox" :name="'units['+index+'][has_installment]'" :id="'has_inst_'+index" value="1" x-model="unit.has_installment" class="h-4.5 w-4.5 rounded text-amber-500 focus:ring-amber-500 cursor-pointer">
                                        <label :for="'has_inst_'+index" class="text-xs font-bold text-slate-700 cursor-pointer">Include Financing Installment Plan</label>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4" x-show="unit.has_installment" x-transition>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[9px] font-bold text-slate-500 uppercase">Installments (Months)</label>
                                            <input type="number" :name="'units['+index+'][installment_duration]'" x-model="unit.installment_duration" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[9px] font-bold text-slate-500 uppercase">Installment Total (₦)</label>
                                            <input type="number" :name="'units['+index+'][installment_total_price]'" x-model="unit.installment_total_price" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[9px] font-bold text-slate-500 uppercase">Deposit %</label>
                                            <input type="number" :name="'units['+index+'][installment_deposit_percent]'" x-model="unit.installment_deposit_percent" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none">
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <label class="text-[9px] font-bold text-slate-500 uppercase">Monthly Payment (₦)</label>
                                            <input type="number" :name="'units['+index+'][installment_monthly_payment]'" x-model="unit.installment_monthly_payment" class="w-full bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/60 pt-6 mt-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block font-sans">Interactive Viewport Hotspots</label>
                                        <button type="button" @click="if(!unit.hotspots) unit.hotspots = []; unit.hotspots.push({ id: Date.now(), top: '50%', left: '50%', title: '', desc: '' })" class="px-3 py-1.5 bg-[#1c1c1e] hover:bg-slate-800 text-white rounded-lg text-[10px] font-bold transition-all font-sans">
                                            + Add Hotspot Node
                                        </button>
                                    </div>

                                    <!-- Hotspots Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <template x-for="(spot, hIndex) in unit.hotspots" :key="spot.id">
                                            <div class="bg-white border border-slate-200 p-4 rounded-2xl relative space-y-3 font-sans shadow-sm">
                                                <button type="button" @click="unit.hotspots.splice(hIndex, 1)" class="absolute top-3 right-3 text-[10px] font-extrabold text-rose-500 hover:text-rose-600 uppercase focus:outline-none">
                                                    Delete
                                                </button>
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div class="flex flex-col gap-1">
                                                        <label class="text-[9px] font-bold text-slate-400 uppercase">Top Coord (%)</label>
                                                        <input type="text" :name="'units['+index+'][hotspots]['+hIndex+'][top]'" x-model="spot.top" placeholder="e.g. 42%" required class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 text-xs text-slate-700 focus:outline-none">
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        <label class="text-[9px] font-bold text-slate-400 uppercase">Left Coord (%)</label>
                                                        <input type="text" :name="'units['+index+'][hotspots]['+hIndex+'][left]'" x-model="spot.left" placeholder="e.g. 38%" required class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 text-xs text-slate-700 focus:outline-none">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-1">
                                                    <label class="text-[9px] font-bold text-slate-400 uppercase">Hotspot Title</label>
                                                    <input type="text" :name="'units['+index+'][hotspots]['+hIndex+'][title]'" x-model="spot.title" placeholder="e.g. Integrated Compact Kitchenette" required class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 text-xs text-slate-700 focus:outline-none">
                                                </div>
                                                <div class="flex flex-col gap-1">
                                                    <label class="text-[9px] font-bold text-slate-400 uppercase">Hotspot Description</label>
                                                    <textarea :name="'units['+index+'][hotspots]['+hIndex+'][desc]'" x-model="spot.desc" rows="2" placeholder="e.g. Custom wood-finish cabinets..." required class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 text-xs text-slate-700 focus:outline-none font-sans"></textarea>
                                                </div>
                                                <input type="hidden" :name="'units['+index+'][hotspots]['+hIndex+'][id]'" :value="spot.id || (spot.id = Date.now())">
                                            </div>
                                        </template>
                                        
                                        <div x-show="!unit.hotspots || unit.hotspots.length === 0" class="border border-dashed border-slate-200 rounded-2xl py-6 text-center text-slate-400 text-[11px] font-semibold md:col-span-2 select-none bg-white/40">
                                            No hotspots added yet. Tap "+ Add Hotspot Node" to create interactive visual tour nodes.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <div x-show="units.length === 0" class="border border-dashed border-slate-200 rounded-[2.5rem] py-12 text-center text-slate-400 text-xs font-semibold select-none bg-slate-50">
                            No layouts added yet. Tap "+ Add Layout Unit" to build custom apartment variants.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Submissions Actions -->
        <div class="flex gap-4 pt-6 border-t border-slate-100 font-sans mt-8">
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
