<?php

namespace App\Http\Requests\Sheet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SheetFormRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('sheets')],
            'description' => ['nullable', 'string'],
        ];
    }
}
