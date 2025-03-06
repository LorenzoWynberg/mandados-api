<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_user_can_be_assigned_a_role(): void
    {
        // Create a test user.
        $user = User::factory()->create();
        // Assign the "admin" role to the user.
        $user->assignRole('admin');
        // Assert that the user has the "admin" role.
        $this->assertTrue($user->hasRole('admin'));
    }

    public function test_user_can_be_assigned_permission_directly(): void
    {
        // Create a test user.
        $user = User::factory()->create();
        // Give the user a permission that exists (e.g., "create orders").
        $user->givePermissionTo('create orders');
        // Assert the user has the permission.
        $this->assertTrue($user->hasPermissionTo('create orders'));
    }
}