<?php

namespace App\Http\Requests\Application\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateFormRequest extends FormRequest
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

            'entreprise' => 'required|string',
            'contact' => 'required|string',
            'telephone' => ['required', 'phone:MA', Rule::unique('clients')->ignore($this->route('client'), 'uuid')],
            'email' => ['nullable', 'email', Rule::unique('clients')->ignore($this->route('client'), 'uuid')],
            'addresse' => 'required|string',
            'rc' => ['nullable', 'numeric', Rule::unique('clients')->ignore($this->route('client'), 'uuid')],
            'ice' => ['required', 'numeric', Rule::unique('clients')->ignore($this->route('client'), 'uuid')],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'category' => 'nullable|integer',

            'telephones.*' => 'nullable|array',
            'telephones.*.telephone' => 'nullable|phone:MA|unique:telephones',
            'telephones.*.type' => 'nullable|string',
        ];
    }
}
