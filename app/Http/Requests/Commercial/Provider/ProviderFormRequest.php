<?php

namespace App\Http\Requests\Commercial\Provider;

use Illuminate\Foundation\Http\FormRequest;

class ProviderFormRequest extends FormRequest
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
            'telephone' => 'required|phone:MA|unique:providers',
            'email' => 'nullable|email|unique:providers',
            'addresse' => 'nullable|string',
            'rc' => 'nullable|numeric',
            'ice' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'category' => 'nullable|integer',
        ];
    }
}
