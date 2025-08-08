<?php

use App\Models\Role;
use App\Models\Profile;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns a successful response', function () {
    // Seed roles first
    $this->seed(RoleSeeder::class);

    // Confirm roles exist before creating profiles (optional debug)
    $this->assertTrue(Role::count() > 0, 'No roles found after seeding.');

    // Create 5 demo profiles linked to seeded roles
    Profile::factory()->count(5)->create();

    // Confirm profiles created (optional debug)
    $this->assertEquals(5, Profile::count());

    // Hit your home page or route that uses profiles
    $response = $this->get('/');

    // Assert the response is OK
    $response->assertStatus(200);
});
