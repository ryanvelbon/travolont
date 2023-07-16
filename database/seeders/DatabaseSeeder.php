<?php

namespace Database\Seeders;

use App\Models\Host;
use App\Models\Traveler;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            HostTypesTableSeeder::class,
        ]);

        Host::factory(20)->create();

        Traveler::factory(100)->create();
    }
}
