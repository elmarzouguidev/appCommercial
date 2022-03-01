<?php

namespace App\Http\Requests\Application\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'nullable|phone:MA|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'super_admin' => ['nullable', Rule::in([1, '1', true, 'on', 'yes', 'oui', '0', 'no', 'non', false])],
            'role'=>['required','string','exists:roles,name']
        ];
    }
}
