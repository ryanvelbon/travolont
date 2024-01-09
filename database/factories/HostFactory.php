<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Host;
use App\Models\HostType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostFactory extends Factory
{
    public function definition(): array
    {
        $accommodationKeys = collect(array_keys(Host::ACCOMMODATION_SELECT));

        $city = City::whereNotNull('order')->inRandomOrder()->first();

        return [
            'user_id' => User::factory()->create(['account_type' => 'host']),
            'city_id' => $city->id,
            'biz_website' => null,
            'title' => rtrim(fake()->sentence(), '.'),
            'type_id' => HostType::inRandomOrder()->first(),
            'description' => fake()->paragraph(3),
            'max_hours_per_day' => rand(1,8),
            'n_days_per_week' => rand(2,6),
            'min_stay_days' => rand(1,5),
            'max_stay_days' => rand(1,10)*7,
            'n_meals_per_day' => rand(0,3),
            'wage' => rand(1,3) > 1 ? 0 : rand(1,20) * 1000,
            'currency' => $city->country->currency,
            'accommodation' => $accommodationKeys->random(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Host $host) {
            $serviceIds = fake()->randomElements(range(1,30), rand(3,7));
            $host->helpNeeded()->attach($serviceIds);
        });
    }
}
