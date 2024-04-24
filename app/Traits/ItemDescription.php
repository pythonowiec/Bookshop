<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ItemDescription
{
    use ItemTypes;
    protected function prepareDescription(Model|null $item): string|null
    {
        if (is_null($item )) {
            return null;
        }
        $price = $item->price;
        $title = $item->title;
        $details = $this->formatDetails($item->getItemDetails());
        $author = $item->author->first_name . ' ' . $item->author->last_name;
        $placeOfBirth = $item->author->place_of_birth;

        return "Price: $price, Title: $title, Details: $details, Author: $author, Place of Birth: $placeOfBirth.";
    }

    public function formatDetails(array $details): string
    {
        $formattedArray = array_map(function ($key, $element) {
            return "$key: $element";
        },array_keys($details), $details);
        return implode(', ', $formattedArray);
    }
}
