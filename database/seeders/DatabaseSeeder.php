<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Tenant::checkCurrent()
            ? $this->runTenantSpecificSeeders()
            : $this->runLandlordSpecificSeeders();
    }

    public function runTenantSpecificSeeders()
    {
        $this->call([
            SectionSeeder::class,
            ArticleSeeder::class,
        ]);
    }

    public function runLandlordSpecificSeeders()
    {
        $this->call([
            OrganizationSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TenantSeeder::class,
        ]);
    }
}
