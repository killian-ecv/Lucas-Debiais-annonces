<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'category' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'year_prod' => ['required', 'integer'],
            'height' => ['required', 'integer'],
            'width' => ['required', 'integer'],
            'depth' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'expiration_date' => ['required', 'date'],
            'delivery' => ['required', 'string'],
            'warranties' => ['required', 'string'],
            'trade' => ['required', 'string']
        ];
    }
}
