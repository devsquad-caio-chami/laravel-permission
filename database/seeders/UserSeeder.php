<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create(['email' => 'super-admin@devsquad.com']);

        User::factory()->create(['email' => 'team@devsquad.com']);

        User::factory()->create(['email' => 'writer@devsquad.com']);
    }
}
