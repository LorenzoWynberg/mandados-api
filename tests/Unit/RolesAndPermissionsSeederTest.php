<?php

namespace Tests\Unit;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesAndPermissionsSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_roles_exist(): void
    {
        $this->assertDatabaseHas('roles', ['name' => 'hotel']);
        $this->assertDatabaseHas('roles', ['name' => 'admin']);
        $this->assertDatabaseHas('roles', ['name' => 'driver']);
    }

    public function test_permissions_exist(): void
    {
        $this->assertDatabaseHas('permissions', ['name' => 'create orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'approve quotations']);
        $this->assertDatabaseHas('permissions', ['name' => 'edit orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'delete orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'assign routes']);
        $this->assertDatabaseHas('permissions', ['name' => 'generate invoices']);
        $this->assertDatabaseHas('permissions', ['name' => 'update delivery status']);
    }

    public function test_hotel_role_has_correct_permissions(): void
    {
        $hotel = Role::findByName('hotel');
        $expected = ['create orders', 'approve quotations', 'edit orders', 'delete orders'];
        $actual = $hotel->permissions->pluck('name')->sort()->values()->all();

        sort($expected);
        $this->assertEquals($expected, $actual);
    }

    public function test_admin_role_has_correct_permissions(): void
    {
        $admin = Role::findByName('admin');
        $expected = ['assign routes', 'generate invoices', 'edit orders', 'delete orders'];
        $actual = $admin->permissions->pluck('name')->sort()->values()->all();

        sort($expected);
        $this->assertEquals($expected, $actual);
    }

    public function test_driver_role_has_correct_permissions(): void
    {
        $driver = Role::findByName('driver');
        $expected = ['update delivery status'];
        $actual = $driver->permissions->pluck('name')->sort()->values()->all();

        sort($expected);
        $this->assertEquals($expected, $actual);
    }
}