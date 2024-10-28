<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalRequest extends FormRequest
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
            'species' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'cage_id' => 'required|integer|exists:cages,id',
            'description' => 'nullable|string',
        ];
    }
}
