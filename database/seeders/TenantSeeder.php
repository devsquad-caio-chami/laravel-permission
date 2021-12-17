<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Services\TenantService;
use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(TenantService $service)
    {
        $service->create('luminskin', Organization::all()->random()->id);

        $service->create('glamnetic', Organization::all()->random()->id);
    }
}
