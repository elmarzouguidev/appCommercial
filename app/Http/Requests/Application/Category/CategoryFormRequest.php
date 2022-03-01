<?php

namespace App\Http\Requests\Application\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories',
            'description' => 'nullable|string|min:2',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}
