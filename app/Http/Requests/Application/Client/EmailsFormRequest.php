<?php

namespace App\Http\Requests\Application\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmailsFormRequest extends FormRequest
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
            'secend_email' => ['required', 'email', Rule::unique('emails', 'email')],
        ];
    }
}
