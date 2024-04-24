<?php

namespace App\Http\Requests;

use App\Traits\ItemDescription;
use App\Traits\ItemTypes;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    use ItemTypes;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'price' => 'nullable|numeric',
            'author_id' => 'nullable|int|exists:authors,id',
            'type' => ['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($this->getItemType($value) == '') {
                        $fail("The value '{$value}' is not found in the items types.");
                    }
                },
            ],
            // Book
            'genre' => 'nullable|string',
            // Comic
            'series' => 'nullable|string',
            // ShortStoryCollection
            'theme' => 'nullable|string',
        ];
    }
}
