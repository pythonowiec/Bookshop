<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Comic;
use App\Models\ShortStoryCollection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()
            ->count(5)
            ->has(Book::factory(3))
            ->has(Comic::factory(3))
            ->has(ShortStoryCollection::factory(3))
            ->create();
    }
}
