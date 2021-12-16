<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name' => 'tenant1',
            'domain' => 'tenant1.laravel-permission.test',
            'database' => 'laravel_permission'
        ]);

        Tenant::create([
            'name' => 'tenant2',
            'domain' => 'tenant2.laravel-permission.test',
            'database' => 'laravel_permission2'
        ]);
    }
}
