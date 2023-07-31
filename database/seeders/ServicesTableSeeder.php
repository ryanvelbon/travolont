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
                'icon' => 'fa-palette',
                'order' => 3,
            ],
            [
                'title' => 'Babysitting',
                'slug' => 'babysitting',
                'icon' => 'fa-baby-carriage',
                'order' => 1,
            ],
            [
                'title' => 'Building',
                'slug' => 'building',
                'icon' => 'fa-trowel-bricks',
                'order' => 1,
            ],
            [
                'title' => 'Carpentry',
                'slug' => 'carpentry',
                'icon' => 'fa-fence',
                'order' => 3,
            ],
            [
                'title' => 'Cleaning',
                'slug' => 'cleaning',
                'icon' => 'fa-broom',
                'order' => 1,
            ],
            [
                'title' => 'Companionship',
                'slug' => 'companionship',
                'icon' => 'fa-face-smiling-hands',
                'order' => 2,
            ],
            [
                'title' => 'Cooking',
                'slug' => 'cooking',
                'icon' => 'fa-hat-chef',
                'order' => 1,
            ],
            [
                'title' => 'Counseling & Therapy',
                'slug' => 'counseling-and-therapy',
                'icon' => 'fa-head-side-brain',
                'order' => 3,
            ],
            [
                'title' => 'Elderly & Disabled Care',
                'slug' => 'elderly-and-disabled-care',
                'icon' => 'fa-person-cane',
                'order' => 2,
            ],
            [
                'title' => 'Electrical Work',
                'slug' => 'electrical-work',
                'icon' => 'fa-plug-circle-bolt',
                'order' => 3,
            ],
            [
                'title' => 'Farming',
                'slug' => 'farming',
                'icon' => 'fa-wheat',
                'order' => 1,
            ],
            [
                'title' => 'Fitness Training',
                'slug' => 'fitness-training',
                'icon' => 'fa-dumbbell',
                'order' => 3,
            ],
            [
                'title' => 'Fundraising',
                'slug' => 'fundraising',
                'icon' => 'fa-sack-dollar',
                'order' => 3,
            ],
            [
                'title' => 'Gardening',
                'slug' => 'gardening',
                'icon' => 'fa-bag-seedling',
                'order' => 2,
            ],
            [
                'title' => 'General Maintenance',
                'slug' => 'general-maintenance',
                'icon' => 'fa-screwdriver',
                'order' => 3,
            ],
            [
                'title' => 'Grocery Shopping',
                'slug' => 'grocery-shopping',
                'icon' => 'fa-cart-shopping',
                'order' => 1,
            ],
            [
                'title' => 'Hospitality',
                'slug' => 'hospitality',
                'icon' => 'fa-hands-praying',
                'order' => 2,
            ],
            [
                'title' => 'Language Practice',
                'slug' => 'language-practice',
                'icon' => 'fa-comments',
                'order' => 1,
            ],
            [
                'title' => 'Laundry',
                'slug' => 'laundry',
                'icon' => 'fa-washing-machine',
                'order' => 1,
            ],
            [
                'title' => 'Marketing',
                'slug' => 'marketing',
                'icon' => 'fa-megaphone',
                'order' => 3,
            ],
            [
                'title' => 'Music Lessons',
                'slug' => 'music-lessons',
                'icon' => 'fa-piano',
                'order' => 3,
            ],
            [
                'title' => 'Painting',
                'slug' => 'painting',
                'icon' => 'fa-paint-roller',
                'order' => 3,
            ],
            [
                'title' => 'Pet Sitting',
                'slug' => 'pet-sitting',
                'icon' => 'fa-cat',
                'order' => 1,
            ],
            [
                'title' => 'Photography',
                'slug' => 'photography',
                'icon' => 'fa-camera-retro',
                'order' => 2,
            ],
            [
                'title' => 'Physical Therapy',
                'slug' => 'physical-therapy',
                'icon' => 'fa-person-running',
                'order' => 3,
            ],
            [
                'title' => 'Plumbing',
                'slug' => 'plumbing',
                'icon' => 'fa-wrench',
                'order' => 3,
            ],
            [
                'title' => 'Security',
                'slug' => 'security',
                'icon' => 'fa-camera-cctv',
                'order' => 3,
            ],
            [
                'title' => 'Teaching',
                'slug' => 'teaching',
                'icon' => 'fa-chalkboard-user',
                'order' => 1,
            ],
            [
                'title' => 'Tech Support',
                'slug' => 'tech-support',
                'icon' => 'fa-computer',
                'order' => 3,
            ],
            [
                'title' => 'Website & Web Services',
                'slug' => 'website-and-web-services',
                'icon' => 'fa-browser',
                'order' => 3,
            ],
            [
                'title' => 'Writing & Editing',
                'slug' => 'writing-and-editing',
                'icon' => 'fa-pen-nib',
                'order' => 3,
            ],            
        ];

        DB::table('services')->insert($records);
    }
}
