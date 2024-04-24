<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Comic;
use App\Models\Item;
use App\Models\ShortStoryCollection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(5)->create()->each(function (Author $author) {
            Book::factory(fake()->numberBetween(1, 9))->create()->each(function (Book $book) use ($author)  {
                Item::factory()->count(1)->create(
                    [
                        'author_id' => $author->id,
                        'itemable_id' => $book->id,
                        'itemable_type' => Book::class
                    ]
                );
            });

            Comic::factory(fake()->numberBetween(1, 9))->create()->each(function (Comic $comic) use ($author)  {
                Item::factory()->count(1)->create(
                    [
                        'author_id' => $author->id,
                        'itemable_id' => $comic->id,
                        'itemable_type' => Comic::class
                    ]
                );
            });

            ShortStoryCollection::factory(fake()->numberBetween(1, 9))->create()->each(function (ShortStoryCollection $shortStoryCollection) use ($author) {
                Item::factory()->count(1)->create(
                    [
                        'author_id' => $author->id,
                        'itemable_id' => $shortStoryCollection->id,
                        'itemable_type' => ShortStoryCollection::class
                    ]
                );
            });
        });
    }
}
