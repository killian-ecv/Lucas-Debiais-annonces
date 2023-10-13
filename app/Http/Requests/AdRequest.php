<?php

namespace App\Http\Requests;

use App\Enums\Categories;
use App\Enums\Deliveries;
use App\Enums\States;
use App\Enums\Trades;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AdRequest extends FormRequest
{
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
            'title' => ['required', 'string'],
            'category' => ['required', new Enum(Categories::class)],
            'description' => ['required', 'string'],
            'price' => ['required', 'decimal:0,2'],
            'city' => ['required', 'string'],
            'state' => ['required', new Enum(States::class)],
            'year_prod' => ['required', 'integer'],
            'height' => ['required', 'decimal:0,2'],
            'width' => ['required', 'decimal:0,2'],
            'depth' => ['required', 'decimal:0,2'],
            'weight' => ['required', 'decimal:0,2'],
            'expiration_date' => ['required', 'date'],
            'delivery' => ['required', new Enum(Deliveries::class)],
            'warranties' => ['required', 'string'],
            'trade' => ['required', new Enum(Trades::class)]
        ];
    }
}
