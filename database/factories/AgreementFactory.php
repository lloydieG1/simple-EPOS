<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agreement>
 */
class AgreementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_by' => User::factory(),
            'customer_forename' => fake()->firstName(),
            'customer_surname' => fake()->lastName(),
            'customer_date_of_birth' => fake()->date(),
            'created_by' => 1,
        ];
    }
}
