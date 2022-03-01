<?php

namespace App\Http\Requests\Application\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateFormRequest extends FormRequest
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

            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => ['required', 'phone:MA', Rule::unique('users')->ignore($this->route('admin'), 'uuid')],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('admin'), 'uuid')],
            'role' => ['nullable', 'string', 'exists:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['nullable', 'string', 'exists:permissions,name'],
        ];
    }
}
