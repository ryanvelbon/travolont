<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'title' => 'Art & Design',
                'slug' => 'art-and-design',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Babysitting',
                'slug' => 'babysitting',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Building',
                'slug' => 'building',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Carpentry',
                'slug' => 'carpentry',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Cleaning',
                'slug' => 'cleaning',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Companionship',
                'slug' => 'companionship',
                'icon' => '',
                'order' => 2,
            ],
            [
                'title' => 'Cooking',
                'slug' => 'cooking',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Counseling & Therapy',
                'slug' => 'counseling-and-therapy',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Elderly & Disabled Care',
                'slug' => 'elderly-and-disabled-care',
                'icon' => '',
                'order' => 2,
            ],
            [
                'title' => 'Electrical Work',
                'slug' => 'electrical-work',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Farming',
                'slug' => 'farming',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Fitness Training',
                'slug' => 'fitness-training',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Fundraising',
                'slug' => 'fundraising',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Gardening',
                'slug' => 'gardening',
                'icon' => '',
                'order' => 2,
            ],
            [
                'title' => 'General Maintenance',
                'slug' => 'general-maintenance',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Grocery Shopping',
                'slug' => 'grocery-shopping',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Hospitality',
                'slug' => 'hospitality',
                'icon' => '',
                'order' => 2,
            ],
            [
                'title' => 'Language Practice',
                'slug' => 'language-practice',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Laundry',
                'slug' => 'laundry',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Marketing',
                'slug' => 'marketing',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Music Lessons',
                'slug' => 'music-lessons',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Painting',
                'slug' => 'painting',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Pet Sitting',
                'slug' => 'pet-sitting',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Photography',
                'slug' => 'photography',
                'icon' => '',
                'order' => 2,
            ],
            [
                'title' => 'Physical Therapy',
                'slug' => 'physical-therapy',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Plumbing',
                'slug' => 'plumbing',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Security',
                'slug' => 'security',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Teaching',
                'slug' => 'teaching',
                'icon' => '',
                'order' => 1,
            ],
            [
                'title' => 'Tech Support',
                'slug' => 'tech-support',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Website & Web Services',
                'slug' => 'website-and-web-services',
                'icon' => '',
                'order' => 3,
            ],
            [
                'title' => 'Writing & Editing',
                'slug' => 'writing-and-editing',
                'icon' => '',
                'order' => 3,
            ],            
        ];

        DB::table('services')->insert($records);
    }
}
