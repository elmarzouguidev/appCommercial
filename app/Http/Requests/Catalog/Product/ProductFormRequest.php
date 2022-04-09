<?php

namespace App\Http\Requests\Catalog\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => ['required', 'string'],
            'brand' => ['required', 'integer'],
            'reference' => ['required', 'string', Rule::unique('products')],
            'buy_price' => ['nullable', 'numeric'],
            'sell_price' => ['required', 'numeric'],
            'category' => ['required', 'integer'],

            'colors' => ['nullable', 'array'],
            'colors.*' => ['nullable', 'integer'],

            'description' => ['nullable', 'string'],

            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ];
    }
}
