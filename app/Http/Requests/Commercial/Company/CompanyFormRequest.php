<?php

namespace App\Http\Requests\Commercial\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:companies'],
            'website' => ['nullable', 'url', 'unique:companies'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg'],
            'description' => ['nullable', 'string', 'min:2'],
            'city' => ['nullable', 'string'],
            'addresse' => ['required', 'string'],
            'telephone' => ['nullable', 'phone:MA', 'unique:companies'],
            'email' => ['nullable', 'email', 'unique:companies'],
            'rc' => ['nullable', 'numeric', 'unique:companies'],
            'ice' => ['required', 'numeric', 'unique:companies'],
            'cnss' => ['nullable', 'numeric', 'unique:companies'],
            'patente' => ['nullable', 'numeric', 'unique:companies'],
            'if' => ['nullable', 'numeric', 'unique:companies'],
            
            'prefix_invoice' => ['nullable', 'string'],
            'invoice_start_number' => ['nullable', 'numeric'],

            'prefix_invoice_avoir' => ['nullable', 'string'],
            'invoice_avoir_start_number' => ['nullable', 'numeric'],

            'prefix_estimate' => ['nullable', 'string'],
            'estimate_start_number' => ['nullable', 'numeric'],

            'prefix_bcommand' => ['nullable', 'string'],
            'bcommand_start_number' => ['nullable', 'numeric'],
        ];
    }
}
