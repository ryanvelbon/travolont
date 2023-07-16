<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['account_type' => 'host']),
            'city_id' => City::whereNotNull('order')
                            ->inRandomOrder()
                            ->first(),
            'website' => null,
            'title' => rtrim(fake()->sentence(), '.'),
            'description' => fake()->paragraph(3),
            'max_hours_per_day' => rand(1,8),
            'n_days_per_week' => rand(2,6),
            'min_stay_days' => rand(1,5),
            'max_stay_days' => rand(1,10)*7,
        ];
    }
}
