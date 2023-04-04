<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$fY8l88rfpMo/RmzEZKpUaO7fjI..cJGwosAOn9rmWTshGRWeJ2ymG', // password
            'iban' => fake()->iban(),
            'iban_name' => fake()->name(),
        ];
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
