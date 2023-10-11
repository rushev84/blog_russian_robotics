<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // for testing purposes only
    public function definition(): array
    {
        return [
            'title' => fake()->text(30),
            'description' => fake()->text(50),
            'content' => fake()->text(1000),
            'slug' => fake()->word(),
            'category_id' => fake()->randomElement([1, 2, 3]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
