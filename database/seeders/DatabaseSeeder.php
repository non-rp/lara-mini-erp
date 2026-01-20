<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $commonPassword = 'Pass123!';

        $roles = new RolesAndPermissionsSeeder;
        $roles->run();

        Company::firstOrCreate([
            'name' => 'Company 1',
            'slug' => 'company-1',
        ]);

        User::firstOrCreate(
            ['email' => 'admin@aa.aa'],
            [
                'name' => 'Admin',
                'password' => Hash::make($commonPassword),
            ]
        )->assignRole('admin');

        User::firstOrCreate(
            ['email' => 'manager@aa.aa'],
            [
                'name' => 'manager',
                'company_id' => 1,
                'password' => Hash::make($commonPassword),
            ]
        )->assignRole('manager');

        User::firstOrCreate(
            ['email' => 'warehouse@aa.aa',],
            [
                'name' => 'warehouse',
                'password' => Hash::make($commonPassword),
            ]
        )->assignRole('warehouse');

        User::firstOrCreate(
            ['email' => 'client@aa.aa',],
            [
                'name' => 'client',
                'password' => Hash::make($commonPassword),
            ]
        )->assignRole('client');
    }
}
