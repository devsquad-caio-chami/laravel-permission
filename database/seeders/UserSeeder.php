<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = User::factory()->create(['email' => 'super-admin@devsquad.com']);

        $admin = User::factory()->create(['email' => 'team@devsquad.com']);

        $writer = User::factory()->create(['email' => 'writer@devsquad.com']);

        User::factory()->count(30)->create();

        Tenant::all()->each(function ($tenant) use ($superAdmin, $admin, $writer) {
            app(PermissionRegistrar::class)->setPermissionsTeamId($tenant->id);

            $superAdmin->assignRole('Super Admin');
            $admin->assignRole('Admin');
            $writer->assignRole('Writer');
        });
    }
}
