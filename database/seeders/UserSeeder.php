<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public $superAdmin;

    public $admin;

    public $writer;

    public function run()
    {

        $this->superAdmin = User::factory()->create(['email' => 'super-admin@devsquad.com']);

        $this->admin = User::factory()->create(['email' => 'team@devsquad.com']);

        $this->writer = User::factory()->create(['email' => 'writer@devsquad.com']);

        User::factory()->count(100)->create();

        Tenant::all()->each(function ($tenant) {
            app(PermissionRegistrar::class)->setPermissionsTeamId($tenant->id);

            $this->superAdmin->assignRole('Super Admin');
            $this->admin->assignRole('Admin');
            $this->writer->assignRole('Writer');
        });
    }
}
