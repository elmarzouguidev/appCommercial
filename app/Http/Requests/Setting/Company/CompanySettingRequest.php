<?php

namespace App\Http\Requests\Setting\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanySettingRequest extends FormRequest
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
            'website' => ['required', 'string'],
            'logo' => ['required', 'string'],
            'addresse' => ['required', 'string'],
            'telephone' => ['required', 'phone:MA'],
            'email' => ['required', 'email'],
            'rc' => ['nullable', 'numeric'],
            'ice' => ['required', 'numeric'],
            'cnss' => ['nullable', 'numeric'],
            'patente' => ['nullable', 'numeric'],
            'if' => ['nullable', 'string'],
        ];
    }
}
