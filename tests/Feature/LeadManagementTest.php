<?php

namespace Tests\Feature;

use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\InspectionRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadManagementTest extends TestCase
{
    use RefreshDatabase;

    protected $property;
    protected $admin;
    protected $agent;

    protected function setUp(): void
    {
        parent::setUp();

        // Create Admin and Agent using already seeded role_ids from migrations
        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        $this->agent = User::create([
            'name' => 'Agent User',
            'email' => 'agent@test.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);

        // Create Property
        $category = PropertyCategory::create(['name' => 'Mansion', 'slug' => 'mansion']);
        $location = Location::create(['name' => 'Lekki', 'type' => 'Area']);
        
        $this->property = Property::create([
            'title' => 'Aria Manor',
            'slug' => 'aria-manor',
            'description' => 'A gorgeous premium estate.',
            'price' => 500000000.00,
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 5,
            'bathrooms' => 6,
            'floor_area' => 680,
            'category_id' => $category->id,
            'location_id' => $location->id,
        ]);
    }

    /**
     * Test public enquiry submissions.
     */
    public function test_public_user_can_submit_enquiry(): void
    {
        $response = $this->post(route('properties.enquire', $this->property->slug), [
            'name' => 'John Customer',
            'email' => 'john@customer.com',
            'phone' => '+234 800 0000',
            'message' => 'Interested in acquiring this penthouse showroom.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Assert database insertion
        $this->assertDatabaseHas('property_enquiries', [
            'name' => 'John Customer',
            'email' => 'john@customer.com',
            'property_id' => $this->property->id,
        ]);
    }

    /**
     * Test public physical inspection bookings.
     */
    public function test_public_user_can_book_physical_inspection(): void
    {
        $response = $this->post(route('properties.book', $this->property->slug), [
            'name' => 'Sarah Client',
            'email' => 'sarah@client.com',
            'phone' => '+234 900 0000',
            'requested_date' => now()->addDays(2)->format('Y-m-d'),
            'requested_time' => 'Afternoon',
            'notes' => 'Would love a private walk through.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Assert database insertion
        $this->assertDatabaseHas('inspection_requests', [
            'requested_time' => 'Afternoon',
            'property_id' => $this->property->id,
        ]);
    }

    /**
     * Test admin lead pipeline actions (updating status & assigning agents).
     */
    public function test_admin_can_update_enquiry_status_and_assign_agent(): void
    {
        // 1. Create raw enquiry and inspection entries
        $enquiry = PropertyEnquiry::create([
            'property_id' => $this->property->id,
            'name' => 'Sarah Client',
            'email' => 'sarah@client.com',
            'phone' => '+234 900 0000',
            'message' => 'Enquiry specifications.',
            'status' => 'New',
        ]);

        $inspection = InspectionRequest::create([
            'property_id' => $this->property->id,
            'requested_date' => now()->addDays(2)->format('Y-m-d'),
            'requested_time' => 'Afternoon',
            'status' => 'Pending',
        ]);

        // 2. Act as Admin to update Enquiry Status
        $response = $this->actingAs($this->admin)->put(route('admin.enquiries.update', $enquiry->id), [
            'status' => 'Contacted',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('property_enquiries', [
            'id' => $enquiry->id,
            'status' => 'Contacted',
        ]);

        // 3. Act as Admin to assign Agent to Inspection
        $response = $this->actingAs($this->admin)->put(route('admin.inspections.update', $inspection->id), [
            'status' => 'Confirmed',
            'assigned_agent_id' => $this->agent->id,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('inspection_requests', [
            'id' => $inspection->id,
            'status' => 'Confirmed',
            'assigned_agent_id' => $this->agent->id,
        ]);
    }
}
