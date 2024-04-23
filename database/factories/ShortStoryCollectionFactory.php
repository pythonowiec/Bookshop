<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortStoryCollection>
 */
class ShortStoryCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'theme' => $this->faker->randomElement([
                "Horror",
                "Mystery",
                "Science Fiction",
                "Fantasy",
                "Romance",
                "Adventure",
                "Historical",
                "Humor",
                "Thriller",
                "Slice of Life"
            ]),
        ];
    }
}
