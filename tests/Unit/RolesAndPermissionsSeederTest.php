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

    public function test_roles_and_permissions_are_seeded(): void
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        $this->assertDatabaseHas('roles', ['name' => 'hotel']);
        $this->assertDatabaseHas('roles', ['name' => 'admin']);
        $this->assertDatabaseHas('roles', ['name' => 'driver']);

        $this->assertDatabaseHas('permissions', ['name' => 'create orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'edit orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'delete orders']);
        $this->assertDatabaseHas('permissions', ['name' => 'approve quotations']);
        $this->assertDatabaseHas('permissions', ['name' => 'assign routes']);
        $this->assertDatabaseHas('permissions', ['name' => 'update delivery status']);
        $this->assertDatabaseHas('permissions', ['name' => 'generate invoices']);

        $hotel = Role::findByName('hotel');
        $this->assertTrue($hotel->hasPermissionTo('create orders'));
        $this->assertTrue($hotel->hasPermissionTo('edit orders'));
        $this->assertTrue($hotel->hasPermissionTo('delete orders'));
        $this->assertTrue($hotel->hasPermissionTo('approve quotations'));

        $admin = Role::findByName('admin');
        $this->assertTrue($admin->hasPermissionTo('assign routes'));
        $this->assertTrue($admin->hasPermissionTo('edit orders'));
        $this->assertTrue($admin->hasPermissionTo('delete orders'));
        $this->assertTrue($admin->hasPermissionTo('generate invoices'));

        $driver = Role::findByName('driver');
        $this->assertTrue($driver->hasPermissionTo('update delivery status'));
    }
}
