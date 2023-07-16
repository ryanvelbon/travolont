<?php

namespace Database\Seeders;

use App\Models\Host;
use App\Models\Traveler;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Host::factory(20)->create();

        Traveler::factory(100)->create();
    }
}
