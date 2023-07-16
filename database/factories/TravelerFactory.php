<?php

namespace Database\Factories;

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
}
