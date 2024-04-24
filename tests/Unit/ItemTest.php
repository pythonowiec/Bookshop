<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Comic;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class, \App\Traits\ItemDescription::class);

it('does not fetch an item description with wrong id', function () {
    $book = Book::factory()->create();
    $item = Item::factory()->create([
        'itemable_id' => $book->id,
        'itemable_type' => Book::class
    ]);
    $wrongId = $item->id + 1;
    $response = $this->getJson("/api/items/{$wrongId}/description");

    $data = [
        'error' => 'Not found item'
    ];

    $response->assertStatus(404)->assertJson($data);
});

it('can fetch a item description', function () {
    $author = Author::factory()->create();
    $book = Book::factory()->create();
    $item = Item::factory()->create([
        'author_id' => $author->id,
        'itemable_id' => $book->id,
        'itemable_type' => Book::class
    ]);

    $response = $this->getJson("/api/items/{$item->id}/description");

    $data = [
        'Price: '.$item->price.', Title: '.$item->title.', Details: '.$this->formatDetails($item->getItemDetails()).', Author: '.$author->first_name . ' ' . $author->last_name.', Place of Birth: '.$author->place_of_birth.'.',
    ];
    $response->assertStatus(200)->assertJson($data);
});

it('does not create an item without a type field', function () {
    $response = $this->postJson('/api/items', []);
    $data = [
        "message" => "The type field is required.",
        "errors" => [
            "type" => [
                "The type field is required."
            ]
        ]
    ];

    $response->assertStatus(422)->assertJson($data);
});

it('can create an item with book', function () {
    $item = Item::factory()->raw();
    $book = Book::factory()->raw();

    $data = array_merge($item, $book, ['type' => 1]);

    $response = $this->postJson('/api/items', $data);

    $response->assertStatus(201)->assertJson(['status' => 'success']);
});
