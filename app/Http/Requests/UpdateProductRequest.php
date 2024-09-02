<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "name" => "required|min:3|max:30",
            "ingredients" => "nullable|string|max:255|",
            "price" => "required|numeric|gt:-0.01|lt:10000|decimal:2",
            "visible" => "boolean",
            "type" => "string|required|in:Food,Bibite,Bevande Alcoliche,Dessert",
            "image_path" => "image"
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'visible' => $this->has('visible') ? true : false,
        ]);
    }
}
