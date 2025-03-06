<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions.
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions.
        $permissions = [
            'create orders',
            'approve quotations',
            'assign routes',
            'update delivery status',
            'generate invoices',
        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // Create roles and assign permissions.
        $hotelRole = Role::create(['name' => 'hotel']);
        $hotelRole->givePermissionTo(['create orders', 'approve quotations']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['assign routes', 'generate invoices']);

        $driverRole = Role::create(['name' => 'driver']);
        $driverRole->givePermissionTo(['update delivery status']);
    }
}
