<?php

namespace App\Http\Requests\Commercial\Provider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderUpdateFormRequest extends FormRequest
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
            'telephone' => ['required', 'phone:MA', Rule::unique('providers')->ignore($this->route('provider'), 'uuid')],
            'email' => ['nullable', 'email', Rule::unique('providers')->ignore($this->route('provider'), 'uuid')],
            'addresse' => 'required|string',
            'rc' => ['nullable', 'numeric', Rule::unique('providers')->ignore($this->route('provider'), 'uuid')],
            'ice' => ['nullable', 'numeric', Rule::unique('providers')->ignore($this->route('provider'), 'uuid')],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'category' => 'nullable|integer',
        ];
    }
}
