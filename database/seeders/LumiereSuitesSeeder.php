<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Database\Seeder;

class LumiereSuitesSeeder extends Seeder
{
    /**
     * Run the database seeds for a single Master Lumiere Suites project.
     */
    public function run(): void
    {
        // A. Clean wipe of any previous duplicate Lumière listings
        Property::where('slug', 'like', 'lumiere-%')->delete();

        // 1. Resolve or Create Surulere Location under Lagos City
        $lagosCity = Location::where('name', 'Lagos')->where('type', 'City')->first();
        $parentId = $lagosCity ? $lagosCity->id : null;
        
        $surulere = Location::firstOrCreate(
            ['name' => 'Surulere', 'type' => 'Area'],
            ['parent_id' => $parentId]
        );

        // 2. Resolve or Create Categories
        $apartmentCat = PropertyCategory::firstOrCreate(
            ['slug' => 'serviced-apartment'],
            ['name' => 'Serviced Apartment']
        );

        // 3. Resolve or Create Amenities
        $electricity = Amenity::firstOrCreate(['name' => '24/7 Electricity'], ['icon' => 'lightning-bolt']);
        $security = Amenity::firstOrCreate(['name' => '24/7 Security'], ['icon' => 'shield']);
        $kitchen = Amenity::firstOrCreate(['name' => 'Fully Fitted Kitchen'], ['icon' => 'kitchen']);
        $parking = Amenity::firstOrCreate(['name' => 'Dedicated Parking'], ['icon' => 'parking']);
        $gym = Amenity::firstOrCreate(['name' => 'Elite Fitness Gym'], ['icon' => 'gym']);

        // 4. Create single MASTER Lumiere Suites Property
        $lumiere = Property::create([
            'title' => 'Lumière Suites',
            'slug' => 'lumiere-suites',
            'description' => 'A private expression of modern living in the heart of Surulere, Lagos. Lumière Suites is an elite, tech-driven off-plan residential development designed for those who understand value, intention, and positioning. Combining sleek wood cladding facades with robust reinforced concrete foundations, this flagship masterpiece features 9 premium suites across Studio, Mini Flat, and 2-Bedroom layouts, offering uncompromised legal Certificate of Occupancy (C of O) title integrity, dedicated parking, and full-service clubhouses.',
            'price' => 45000000.00, // Starting price
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 1, // Starting bedroom specs
            'bathrooms' => 1,
            'floor_area' => 35, // Starting floor area
            'is_featured' => true,
            'category_id' => $apartmentCat->id,
            'location_id' => $surulere->id,
        ]);
        
        // Attach amenities to master project
        $lumiere->amenities()->sync([$electricity->id, $security->id, $kitchen->id, $parking->id, $gym->id]);

        // Create Media using our copied PNG renders!
        PropertyMedia::create([
            'property_id' => $lumiere->id,
            'file_path' => '/assets/lumiere/front-view-night.png',
            'is_cover' => true,
        ]);
        PropertyMedia::create([
            'property_id' => $lumiere->id,
            'file_path' => '/assets/lumiere/right-side-view-night.png',
            'is_cover' => false,
        ]);
    }
}
