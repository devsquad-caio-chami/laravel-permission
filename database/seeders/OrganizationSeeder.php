<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create(['name' => 'Luminskin']);

        Organization::create(['name' => 'Glamnetic']);

        Organization::create(['name' => 'Pangaea']);
    }
}
