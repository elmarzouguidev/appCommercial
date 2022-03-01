<?php

namespace App\Http\Requests\Application\Warranty;

use Illuminate\Foundation\Http\FormRequest;

class WarrantyFormRequest extends FormRequest
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
            'ticket' => 'required|uuid',
            'start_at' => ['required', 'date', 'after:tomorrow'],
            'end_at' => ['required', 'date', 'after:start_at'],
            'description' => ['nullable', 'string']
        ];
    }
}
