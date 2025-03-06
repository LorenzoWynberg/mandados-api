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
        // Seed default roles and permissions.
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

    public function test_hotel_role_has_correct_permissions(): void
    {
        // Retrieve the "hotel" role.
        $hotel = Role::findByName('hotel');
        // Get the permissions as an array.
        $permissions = $hotel->permissions->pluck('name')->sort()->values()->all();
        $expected = ['approve quotations', 'create orders', 'delete orders', 'edit orders'];
        sort($expected);
        $this->assertEquals($expected, $permissions);
    }

    public function test_admin_role_has_correct_permissions(): void
    {
        // Retrieve the "admin" role.
        $admin = Role::findByName('admin');
        $permissions = $admin->permissions->pluck('name')->sort()->values()->all();
        $expected = ['assign routes', 'delete orders', 'edit orders', 'generate invoices'];
        sort($expected);
        $this->assertEquals($expected, $permissions);
    }

    public function test_driver_role_has_correct_permissions(): void
    {
        // Retrieve the "driver" role.
        $driver = Role::findByName('driver');
        $permissions = $driver->permissions->pluck('name')->sort()->values()->all();
        $expected = ['update delivery status'];
        sort($expected);
        $this->assertEquals($expected, $permissions);
    }
}