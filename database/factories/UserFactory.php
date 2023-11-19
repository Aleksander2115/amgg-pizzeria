<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'phone_number' => fake()->numberBetween(500000000, 700000000),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'street_name' => fake()->streetName(),
            'street_number' => fake()->numberBetween(1,300),
            'email' => fake()->unique()->email(),
            'login' => fake()->unique()->userName(),
            'password' => bcrypt(fake()->password)
//            'password' => 'siema'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
