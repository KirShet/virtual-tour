<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
        $rules = [
            'species' => 'required|string|max:225',
            'name' => 'required|string|max|225',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cage_id' => 'required|exists:cages,id'
        ];
        
        return $rules;
    }
}
