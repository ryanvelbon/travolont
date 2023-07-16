<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'title' => 'Families & Homestays',
                'slug' => 'families-homestays',
                'icon' => 'users',
            ],
            [
                'title' => 'Individual exchanges',
                'slug' => 'individual-exchanges',
                'icon' => 'user-group-simple',
            ],
            [
                'title' => 'Community projects',
                'slug' => 'community-projects',
                'icon' => 'people-group',
            ],
            [
                'title' => 'NGOs & Charities',
                'slug' => 'ngos-charities',
                'icon' => 'hand-holding-heart',
            ],
            [
                'title' => 'House sitting',
                'slug' => 'house-sitting',
                'icon' => 'house-person-return',
            ],
            [
                'title' => 'Teaching projects',
                'slug' => 'teaching-projects',
                'icon' => 'chalkboard-user',
            ],
            [
                'title' => 'Farmstay experiences',
                'slug' => 'farmstay-experiences',
                'icon' => 'farm',
            ],
            [
                'title' => 'Hostels',
                'slug' => 'hostels',
                'icon' => 'bed-bunk',
            ],
            [
                'title' => 'Boating & Sailing',
                'slug' => 'boating-sailing',
                'icon' => 'sailboat',
            ],
            [
                'title' => 'Environmental projects',
                'slug' => 'environmental-projects',
                'icon' => 'seedling',
            ],
            [
                'title' => 'Animal care & Pet sitting',
                'slug' => 'animal-care-pet-sitting',
                'icon' => 'paw',
            ],
            [
                'title' => 'Others',
                'slug' => 'others',
                'icon' => 'building-columns',
            ],
        ];

        DB::table('host_types')->insert($records);
    }
}
