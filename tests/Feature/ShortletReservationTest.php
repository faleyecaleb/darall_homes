<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PropertyCategory;
use App\Models\Location;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortletReservationTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    private Property $shortlet;
    private Property $saleProperty;

    protected function setUp(): void
    {
        parent::setUp();

        // 1. Seed base User & Roles
        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@darallhomes.com',
            'password' => bcrypt('password'),
            'role_id' => 1, // Super Admin Role
        ]);

        // Mock role mapping if needed (AdminMiddleware allows admin@darallhomes.com by default)
        
        // 2. Seed dependencies
        $category = PropertyCategory::create(['name' => 'Penthouse', 'slug' => 'penthouse']);
        $location = Location::create(['name' => 'Ikoyi', 'type' => 'Area']);

        // 3. Seed Shortlet listing (₦100,000 per night)
        $this->shortlet = Property::create([
            'title' => 'The Zenith Suite',
            'slug' => 'the-zenith-suite',
            'description' => 'Luxury executive stay.',
            'price' => 100000.00,
            'property_type' => 'Shortlet',
            'status' => 'Available',
            'bedrooms' => 2,
            'bathrooms' => 2,
            'floor_area' => 120,
            'category_id' => $category->id,
            'location_id' => $location->id,
        ]);

        // 4. Seed Standard Sale property
        $this->saleProperty = Property::create([
            'title' => 'The Obsidian Penthouse',
            'slug' => 'the-obsidian-penthouse',
            'description' => 'For outright sale.',
            'price' => 350000000.00,
            'property_type' => 'Sale',
            'status' => 'Available',
            'bedrooms' => 4,
            'bathrooms' => 5,
            'floor_area' => 450,
            'category_id' => $category->id,
            'location_id' => $location->id,
        ]);
    }

    /**
     * Test guest can successfully reserve a vacant shortlet and price is calculated correctly.
     */
    public function test_guest_can_reserve_vacant_shortlet_and_price_calculates_successfully()
    {
        $response = $this->post(route('bookings.store'), [
            'property_id' => $this->shortlet->id,
            'customer_name' => 'Caleb Faleye',
            'customer_email' => 'falz@gmail.com',
            'customer_phone' => '09069685949',
            'check_in_date' => date('Y-m-d', strtotime('+2 days')),
            'check_out_date' => date('Y-m-d', strtotime('+5 days')), // 3 Nights stay!
            'guests_count' => 2,
            'notes' => 'Airport pickup requested.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');

        // Total price should be: nightly rate (100,000) * 3 nights = 300,000
        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Caleb Faleye',
            'property_id' => $this->shortlet->id,
            'total_price' => 300000.00,
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
        ]);
    }

    /**
     * Test booking is blocked if the target listing is not a shortlet property.
     */
    public function test_booking_is_blocked_on_non_shortlet_listings()
    {
        $response = $this->post(route('bookings.store'), [
            'property_id' => $this->saleProperty->id, // Sale listing!
            'customer_name' => 'Caleb Guest',
            'customer_email' => 'falz@gmail.com',
            'customer_phone' => '09069685949',
            'check_in_date' => date('Y-m-d', strtotime('+2 days')),
            'check_out_date' => date('Y-m-d', strtotime('+5 days')),
            'guests_count' => 1,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
        $this->assertDatabaseCount('bookings', 0);
    }

    /**
     * Test overlapping double bookings are strictly blocked to protect properties.
     */
    public function test_double_bookings_on_overlapping_dates_are_blocked()
    {
        // 1. Create pre-existing confirmed booking from Sept 10 to Sept 15
        Booking::create([
            'property_id' => $this->shortlet->id,
            'customer_name' => 'Preexisting Guest',
            'customer_email' => 'old@gmail.com',
            'customer_phone' => '08000000',
            'check_in_date' => '2026-09-10',
            'check_out_date' => '2026-09-15',
            'guests_count' => 1,
            'total_price' => 500000.00,
            'status' => 'Confirmed',
            'payment_status' => 'Paid',
        ]);

        // 2. Attempt to make a booking from Sept 12 to Sept 14 (completely overlapping!)
        $response = $this->post(route('bookings.store'), [
            'property_id' => $this->shortlet->id,
            'customer_name' => 'Caleb Overlap',
            'customer_email' => 'falz@gmail.com',
            'customer_phone' => '09069685949',
            'check_in_date' => '2026-09-12',
            'check_out_date' => '2026-09-14',
            'guests_count' => 2,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error'); // Triggers "already booked"
        
        // Assert only the preexisting booking is in DB
        $this->assertDatabaseCount('bookings', 1);
        $this->assertDatabaseMissing('bookings', [
            'customer_name' => 'Caleb Overlap'
        ]);
    }

    /**
     * Test administrator can update status and payment details.
     */
    public function test_admin_can_update_booking_status_and_payment_status()
    {
        $booking = Booking::create([
            'property_id' => $this->shortlet->id,
            'customer_name' => 'Test Guest',
            'customer_email' => 'test@gmail.com',
            'customer_phone' => '08000000',
            'check_in_date' => '2026-09-10',
            'check_out_date' => '2026-09-15',
            'guests_count' => 1,
            'total_price' => 500000.00,
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.bookings.update', $booking->id), [
            'status' => 'Confirmed',
            'payment_status' => 'Paid',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'Confirmed',
            'payment_status' => 'Paid',
        ]);
    }
}
