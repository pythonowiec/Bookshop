<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'series' => $this->faker->randomElement([
                "Spider-Man",
                "Batman",
                "The Walking Dead",
                "Naruto",
                "X-Men",
                "Superman",
                "Saga",
                "One Piece",
                "Wonder Woman",
            ]),
        ];
    }
}
