<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'ingredients' => 'required|string|min:3|max:255',
            'price' => 'required|numeric|gt:0|lt:10000|decimal:2',
            'visible' => 'boolean',
            'type' => 'string|required|in:Food,Bibite,Bevande Alcoliche,Dessert',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'visible' => $this->has('visible') ? true : false,
        ]);
    }
}
