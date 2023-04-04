<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $totalAmount = round($this->faker->numberBetween(100000, 500000), -3);

        return [
            'user_id' => User::factory(),
            'slug' => fake()->slug,
            'name' => fake()->company(),
            'location' => fake()->city(),
            'description' => fake()->text(255),
            'own_contribution' => $totalAmount * config('crowdfunding.contributions.own'),
            'external_contribution' => $totalAmount * config('crowdfunding.contributions.external'),
            'crowdfunding_contribution' => $totalAmount * config('crowdfunding.contributions.crowdfunding'),
            'iban' => fake()->iban(),
            'iban_name' => fake()->name(),
            'status' => fake()->randomElement(ProjectStatus::cases()),
            'interest_rate' => config('crowdfunding.interest'),
            'duration' => config('crowdfunding.duration'),
        ];
    }

    public function funding(): static
    {
        return $this->state([
            'status' => ProjectStatus::Funding,
        ]);
    }

    public function pending(): static
    {
        return $this->state([
            'status' => ProjectStatus::Pending,
        ]);
    }
}
