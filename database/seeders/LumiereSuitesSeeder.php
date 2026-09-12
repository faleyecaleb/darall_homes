<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\PropertyPerspective;
use App\Models\PropertyUnit;
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
            'has_luxury_layout' => true,
            'hero_video_url' => '/lumiere/lumiere-bg-video.mp4',
        ]);
        
        // Attach amenities to master project
        $lumiere->amenities()->sync([$electricity->id, $security->id, $kitchen->id, $parking->id, $gym->id]);

        // Create Media using our copied PNG renders!
        PropertyMedia::create([
            'property_id' => $lumiere->id,
            'file_path' => '/lumiere/front-view-night.png',
            'is_cover' => true,
        ]);
        PropertyMedia::create([
            'property_id' => $lumiere->id,
            'file_path' => '/lumiere/right-side-view-night.png',
            'is_cover' => false,
        ]);

        // 5. Seed Cinematic Perspectives
        PropertyPerspective::create([
            'property_id' => $lumiere->id,
            'perspective_key' => 'front',
            'title' => 'Front View',
            'subtitle' => 'Perspective I',
            'image_path' => '/lumiere/front-view-night.png',
            'description' => 'A clean modern facade defined by strong lines, warm timber cladding, and precise architectural illumination.',
        ]);

        PropertyPerspective::create([
            'property_id' => $lumiere->id,
            'perspective_key' => 'left',
            'title' => 'Left View',
            'subtitle' => 'Perspective II',
            'image_path' => '/lumiere/left-side-view-night.png',
            'description' => 'Showcases perfectly balanced architectural volumes, highlighting the seamless integration of external wood panels.',
        ]);

        PropertyPerspective::create([
            'property_id' => $lumiere->id,
            'perspective_key' => 'right',
            'title' => 'Right View',
            'subtitle' => 'Perspective III',
            'image_path' => '/lumiere/right-side-view-night.png',
            'description' => 'Highlights energy-efficient, double-glazed window placements designed to maximize daylight penetration while reflecting external Mainland heat.',
        ]);

        PropertyPerspective::create([
            'property_id' => $lumiere->id,
            'perspective_key' => 'back',
            'title' => 'Back View',
            'subtitle' => 'Perspective IV',
            'image_path' => '/lumiere/back-view-night.png',
            'description' => 'Highlights the extensive private view terraces and structural concrete foundation columns designed for absolute longevity.',
        ]);

        // 6. Seed Suite/Apartment Units
        // Unit 1: Studio Apartment
        PropertyUnit::create([
            'property_id' => $lumiere->id,
            'name' => 'Lumière Studio Suite',
            'badge' => 'Studio Apartment',
            'image_path' => '/lumiere/int-1.png',
            'description' => 'Compact, refined, and fully appointed. Features an optimized open-concept layout, fully integrated fitted kitchen, and luxury bath. An exceptionally smart choice for solo living or shortlet investments.',
            'bedrooms' => 1,
            'bathrooms' => 1,
            'floor_area' => 35,
            'outright_price' => 45000000.00,
            'has_installment' => true,
            'installment_duration' => 6,
            'installment_total_price' => 47250000.00,
            'installment_deposit_percent' => 30.00,
            'installment_monthly_payment' => 5512500.00,
            'hotspots' => [
                [ 'id' => 1, 'top' => '42%', 'left' => '38%', 'title' => 'Integrated Compact Kitchenette', 'desc' => 'Custom wood-finish cabinets fitted with a dual burner stove, overhead extractor hood, and scratch-resistant composite quartz countertops.' ],
                [ 'id' => 2, 'top' => '25%', 'left' => '68%', 'title' => 'Anti-Glare High Windows', 'desc' => 'Energy-efficient, double-glazed window panels designed to maximize daylight penetration while reflecting external Mainland heat.' ],
                [ 'id' => 3, 'top' => '65%', 'left' => '48%', 'title' => 'Spanish Porcelain Flooring', 'desc' => 'Premium-grade, non-porous 60x60cm porcelain floor tiles, finished in a soft matte-grey to resist stains and reflect ambient interior lighting.' ]
            ]
        ]);

        // Unit 2: Mini Flat (1-Bed)
        PropertyUnit::create([
            'property_id' => $lumiere->id,
            'name' => 'Lumière Mini Flat',
            'badge' => 'Mini Flat (1-Bed)',
            'image_path' => '/lumiere/int-2.png',
            'description' => 'A spacious, beautifully appointed mini flat. Boasts a premium bedroom ensuite, an extensive open-concept living area, a fitted kitchen, a guest powder room, and a private terrace designed to let life flow.',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'floor_area' => 60,
            'outright_price' => 70000000.00,
            'has_installment' => true,
            'installment_duration' => 6,
            'installment_total_price' => 73500000.00,
            'installment_deposit_percent' => 30.00,
            'installment_monthly_payment' => 8575000.00,
            'hotspots' => [
                [ 'id' => 1, 'top' => '35%', 'left' => '30%', 'title' => 'Expanded Living Lounge', 'desc' => 'Spacious main lounge area built with soundproofing wall liners, modern gypsum ceiling boards, and recessed LED dimming strips.' ],
                [ 'id' => 2, 'top' => '22%', 'left' => '72%', 'title' => 'Ensuite Bedroom Portal', 'desc' => 'Private wooden acoustic door leading into the master suite, fitted with ceiling-height modular wardrobes.' ],
                [ 'id' => 3, 'top' => '50%', 'left' => '55%', 'title' => 'Private Outlook Balcony', 'desc' => 'Heavy-duty smart sliding glass panels that open onto your private reinforced concrete balcony overlooking the landscaped courtyard.' ]
            ]
        ]);

        // Unit 3: 2-Bedroom
        PropertyUnit::create([
            'property_id' => $lumiere->id,
            'name' => 'Lumière 2-Bedroom',
            'badge' => '2-Bedroom',
            'image_path' => '/lumiere/int-3.png',
            'description' => 'The crown jewel layout of Lumière Suites. Boasts dual master en-suite bedrooms, an expansive light-filled living area, a premium fully-fitted kitchen, guest bathroom, and private outdoor terrace.',
            'bedrooms' => 2,
            'bathrooms' => 3,
            'floor_area' => 95,
            'outright_price' => 90000000.00,
            'has_installment' => true,
            'installment_duration' => 6,
            'installment_total_price' => 94500000.00,
            'installment_deposit_percent' => 30.00,
            'installment_monthly_payment' => 11025000.00,
            'hotspots' => [
                [ 'id' => 1, 'top' => '30%', 'left' => '45%', 'title' => 'Dual-Aspect Grand Lounge', 'desc' => 'High-volume social social space with continuous cross-ventilation, optimized for high-capacity designer seating layouts.' ],
                [ 'id' => 2, 'top' => '48%', 'left' => '20%', 'title' => 'Chef\'s Gourmet Kitchen', 'desc' => 'Fully fitted wrap-around kitchen with multi-drawer storage, integrated oven, microwave housing, and connections for dual-door refrigeration.' ],
                [ 'id' => 3, 'top' => '18%', 'left' => '75%', 'title' => 'Smart Climate Automation', 'desc' => 'Equipped with a centralized automation hub to control multi-room cooling, smart lighting schedules, and video intercom access.' ]
            ]
        ]);
    }
}
