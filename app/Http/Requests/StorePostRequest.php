<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:10',
        ];
    }


    public function messages(): array
{
    return [
        'title.required' => 'Title required.',
        'title.min' => 'Title must be at least 3 characters long.',
        'description.required' => 'Description required.',
        'description.min' => 'Description must be at least 10 characters long.',
    ];
}

}