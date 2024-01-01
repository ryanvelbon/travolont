<?php

namespace Database\Seeders;

use App\Models\Host;
use App\Models\Traveler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $hosts = Host::factory(100)->create();
        $count = 1;
        foreach ($hosts as $host) {
            $host->user->avatar = 'host' . $count . '.png';
            $host->user->save();
            $host->feat_img = 'experience' . $count . '.png';
            $host->save();
            $count++;
        }

        $travelers = Traveler::factory(500)->create();
        $count = 1;
        foreach ($travelers as $traveler) {
            $traveler->user->avatar = 'traveler' . $count . '.png';
            $traveler->user->save();
            $count++;
        }
    }
}
