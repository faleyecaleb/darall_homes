<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Super Admin (role_id = 1)
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@realestate.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        // Agent (role_id = 3)
        User::factory()->create([
            'name' => 'Premium Agent',
            'email' => 'agent@realestate.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);

        // Regular User (role_id = 4)
        User::factory()->create([
            'name' => 'John Customer',
            'email' => 'user@realestate.com',
            'password' => bcrypt('password'),
            'role_id' => 4,
        ]);

        $this->call(PropertySeeder::class);
    }
}
