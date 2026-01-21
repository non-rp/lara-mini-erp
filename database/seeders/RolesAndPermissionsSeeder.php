<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
//        Permission::create(['name' => 'edit articles']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions
        Role::firstOrCreate(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'warehouse']);
        Role::firstOrCreate(['name' => 'client']);
    }
}
