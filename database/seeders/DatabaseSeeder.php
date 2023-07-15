<?php

namespace Database\Seeders;

use App\Models\Host;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Host::factory(20)->create();
    }
}
