<?php

namespace App\Http\Requests\Commercial\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateFormRequest extends FormRequest
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
        //dd($this->route('company'),"From UpdateRequest");
        return [
            'name' => ['required', 'string', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'website' => ['nullable', 'url', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'logo' => ['nullable', 'image', 'mimes:png,jpg'],
            'description' => ['nullable', 'string', 'min:2'],
            'city' => ['nullable', 'string'],
            'addresse' => ['required', 'string'],
            'telephone' => ['nullable', 'phone:MA', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'email' => ['nullable', 'email', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'rc' => ['nullable', 'numeric', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'ice' => ['required', 'numeric', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'cnss' => ['nullable', 'numeric', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'if' => ['nullable', 'numeric', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],
            'patente' => ['nullable', 'numeric', Rule::unique('companies')->ignore($this->route('company'), 'uuid')],

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
