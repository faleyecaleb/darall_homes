<?php

namespace Tests\Feature;

use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\VirtualTour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyDomainTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test property database storage, retrieval, and relationships.
     */
    public function test_property_retrieval_and_relations_work_perfectly(): void
    {
        // 1. Create scaffolding data
        $category = PropertyCategory::create([
            'name' => 'Bespoke Penthouse',
            'slug' => 'bespoke-penthouse',
        ]);

        $location = Location::create([
            'name' => 'Lekki Phase 1',
            'type' => 'Area',
        ]);

        $amenity = Amenity::create([
            'name' => 'Automated Smart Home',
            'icon' => 'home',
        ]);

        // 2. Create Property
        $property = Property::create([
            'title' => 'The Obsidian Mansion',
            'slug' => 'the-obsidian-mansion',
            'description' => 'Unparalleled lagoon sightlines.',
            'price' => 500000000.00,
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 5,
            'bathrooms' => 6,
            'floor_area' => 650,
            'category_id' => $category->id,
            'location_id' => $location->id,
        ]);

        // 3. Attach Relationships
        $property->amenities()->attach($amenity->id);

        PropertyMedia::create([
            'property_id' => $property->id,
            'file_path' => 'obsidian.jpg',
            'is_cover' => true,
        ]);

        VirtualTour::create([
            'property_id' => $property->id,
            'provider' => 'Matterport',
            'tour_url' => 'https://matterport.com/obsidian',
            'embed_url' => 'https://matterport.com/embed/obsidian',
        ]);

        // 4. Run Assertions
        $retrieved = Property::where('slug', 'the-obsidian-mansion')->first();
        
        $this->assertNotNull($retrieved);
        $this->assertEquals('The Obsidian Mansion', $retrieved->title);
        $this->assertEquals(500000000.00, $retrieved->price);
        
        // Assert Relationships
        $this->assertEquals('Bespoke Penthouse', $retrieved->category->name);
        $this->assertEquals('Lekki Phase 1', $retrieved->location->name);
        $this->assertTrue($retrieved->is_featured === false);
        
        $this->assertCount(1, $retrieved->amenities);
        $this->assertEquals('Automated Smart Home', $retrieved->amenities->first()->name);
        
        $this->assertNotNull($retrieved->coverImage);
        $this->assertEquals('obsidian.jpg', $retrieved->coverImage->file_path);
        
        $this->assertNotNull($retrieved->virtualTour);
        $this->assertEquals('Matterport', $retrieved->virtualTour->provider);
    }
}
