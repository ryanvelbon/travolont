<?php

namespace Database\Factories;

use App\Models\Traveler;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['account_type' => 'traveler']),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Traveler $traveler) {
            $serviceIds = fake()->randomElements(range(1,30), rand(3,7));
            $traveler->services()->attach($serviceIds);
        });
    }
}
