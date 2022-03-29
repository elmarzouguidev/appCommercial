<?php

namespace App\Http\Requests\Sheet;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SheetTableRequest extends FormRequest
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
            'name' => ['nullable', 'string', Rule::unique('sheets')],
            'content' => ['required', 'array'],
            'description' => ['nullable', 'string'],
        ];
    }
}
