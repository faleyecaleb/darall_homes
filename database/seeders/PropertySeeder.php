<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\VirtualTour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Property Categories
        $categories = [
            ['name' => 'Duplex Penthouse', 'slug' => 'duplex-penthouse'],
            ['name' => 'Detached Mansion', 'slug' => 'detached-mansion'],
            ['name' => 'Serviced Apartment', 'slug' => 'serviced-apartment'],
            ['name' => 'Terraced Duplex', 'slug' => 'terraced-duplex'],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[$cat['slug']] = PropertyCategory::create($cat);
        }

        // 2. Seed Recursive Locations
        // Country
        $nigeria = Location::create(['name' => 'Nigeria', 'type' => 'Country', 'parent_id' => null]);
        // State
        $lagosState = Location::create(['name' => 'Lagos', 'type' => 'State', 'parent_id' => $nigeria->id]);
        // City
        $lagosCity = Location::create(['name' => 'Lagos', 'type' => 'City', 'parent_id' => $lagosState->id]);
        
        // Areas
        $locations = [
            'lekki' => Location::create(['name' => 'Lekki Phase 1', 'type' => 'Area', 'parent_id' => $lagosCity->id]),
            'ikoyi' => Location::create(['name' => 'Old Ikoyi', 'type' => 'Area', 'parent_id' => $lagosCity->id]),
            'vi' => Location::create(['name' => 'Victoria Island', 'type' => 'Area', 'parent_id' => $lagosCity->id]),
            'banana' => Location::create(['name' => 'Banana Island', 'type' => 'Area', 'parent_id' => $lagosCity->id]),
        ];

        // 3. Seed Amenities
        $amenitiesData = [
            ['name' => 'Automated Home', 'icon' => 'home'],
            ['name' => '24/7 Electricity', 'icon' => 'lightning-bolt'],
            ['name' => '24/7 Security', 'icon' => 'shield'],
            ['name' => 'Elite Fitness Gym', 'icon' => 'gym'],
            ['name' => 'Heated Pool', 'icon' => 'pool'],
            ['name' => 'Lagoon Sightline', 'icon' => 'water'],
            ['name' => 'Private Elevator', 'icon' => 'elevator'],
            ['name' => 'Fully Fitted Kitchen', 'icon' => 'kitchen'],
        ];

        $amenityModels = [];
        foreach ($amenitiesData as $amenity) {
            $amenityModels[$amenity['name']] = Amenity::create($amenity);
        }

        // 4. Seed Properties
        // Property 1: The Obsidian Penthouse
        $obsidian = Property::create([
            'title' => 'The Obsidian Penthouse',
            'slug' => 'the-obsidian-penthouse',
            'description' => 'A masterpiece of modern engineering. Designed by world-renowned architects, this penthouse offers an unprecedented perspective on urban luxury and waterfront living. Featuring double-height ceilings, automated floor-to-ceiling smart glass windows, and a built-in wet bar, the primary reception area merges luxury comfort with seamless entertaining.',
            'price' => 350000000.00,
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 4,
            'bathrooms' => 5,
            'floor_area' => 450,
            'is_featured' => true,
            'category_id' => $categoryModels['duplex-penthouse']->id,
            'location_id' => $locations['lekki']->id,
        ]);

        // Attach Amenities to Obsidian
        $obsidian->amenities()->attach([
            $amenityModels['Automated Home']->id,
            $amenityModels['24/7 Electricity']->id,
            $amenityModels['24/7 Security']->id,
            $amenityModels['Elite Fitness Gym']->id,
            $amenityModels['Heated Pool']->id,
            $amenityModels['Lagoon Sightline']->id,
        ]);

        // Seed Media for Obsidian
        PropertyMedia::create([
            'property_id' => $obsidian->id,
            'file_path' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
            'type' => 'image',
            'is_cover' => true,
            'sort_order' => 1,
        ]);

        // Seed Virtual Tour for Obsidian
        VirtualTour::create([
            'property_id' => $obsidian->id,
            'provider' => 'Matterport',
            'tour_url' => 'https://my.matterport.com/show/?m=9bN5vC9Z2pU',
            'embed_url' => 'https://my.matterport.com/show/?m=9bN5vC9Z2pU',
            'is_active' => true,
        ]);

        // Property 2: The Aria Mansion
        $aria = Property::create([
            'title' => 'The Aria Mansion',
            'slug' => 'the-aria-mansion',
            'description' => 'Exquisite 5-bedroom detached mansion with private elevator, heated swimming pool, 2 BQs, and state-of-the-art security features. An elegant residential structure boasting high-fidelity thermal insulating glass facades, structured bio-pass lobby doors, and full-service clubhouses.',
            'price' => 650000000.00,
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 5,
            'bathrooms' => 6,
            'floor_area' => 680,
            'is_featured' => true,
            'category_id' => $categoryModels['detached-mansion']->id,
            'location_id' => $locations['ikoyi']->id,
        ]);

        $aria->amenities()->attach([
            $amenityModels['Private Elevator']->id,
            $amenityModels['24/7 Electricity']->id,
            $amenityModels['24/7 Security']->id,
            $amenityModels['Elite Fitness Gym']->id,
            $amenityModels['Heated Pool']->id,
            $amenityModels['Fully Fitted Kitchen']->id,
        ]);

        PropertyMedia::create([
            'property_id' => $aria->id,
            'file_path' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
            'type' => 'image',
            'is_cover' => true,
            'sort_order' => 1,
        ]);

        // Property 3: The Zenith Suite
        $zenith = Property::create([
            'title' => 'The Zenith Suite',
            'slug' => 'the-zenith-suite',
            'description' => 'Premium 2-bedroom executive shortlet apartment located steps away from upscale shopping centers, dining, and workspace hubs. Merging complete privacy with rapid, hassle-free egress to business hotspots.',
            'price' => 120000.00,
            'property_type' => 'Shortlet',
            'status' => 'Available',
            'bedrooms' => 2,
            'bathrooms' => 3,
            'floor_area' => 180,
            'is_featured' => true,
            'category_id' => $categoryModels['serviced-apartment']->id,
            'location_id' => $locations['vi']->id,
        ]);

        $zenith->amenities()->attach([
            $amenityModels['Automated Home']->id,
            $amenityModels['24/7 Electricity']->id,
            $amenityModels['24/7 Security']->id,
            $amenityModels['Fully Fitted Kitchen']->id,
        ]);

        PropertyMedia::create([
            'property_id' => $zenith->id,
            'file_path' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
            'type' => 'image',
            'is_cover' => true,
            'sort_order' => 1,
        ]);

        VirtualTour::create([
            'property_id' => $zenith->id,
            'provider' => 'Matterport',
            'tour_url' => 'https://my.matterport.com/show/?m=9bN5vC9Z2pU',
            'embed_url' => 'https://my.matterport.com/show/?m=9bN5vC9Z2pU',
            'is_active' => true,
        ]);
    }
}
