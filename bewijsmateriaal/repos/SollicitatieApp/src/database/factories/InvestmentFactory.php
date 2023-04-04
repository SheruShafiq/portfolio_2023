<?php

namespace Database\Factories;

use App\Enums\InvestmentStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investment>
 */
class InvestmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'project_id' => Project::factory()->funding(),
            'amount' => round(fake()->numberBetween(1000, 2000), -2),
            'status' => InvestmentStatus::Accepted,
            'iban' => fake()->iban('NL'),
            'iban_name' => fake()->name(),
        ];
    }

    public function pending()
    {
        return $this->state(function () {
            return [
                'status' => InvestmentStatus::Pending,
            ];
        });
    }

    public function accepted()
    {
        return $this->state(function () {
            return [
                'status' => InvestmentStatus::Accepted,
            ];
        });
    }
}
