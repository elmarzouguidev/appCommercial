<?php

namespace App\Http\Requests\Application\Reception;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionPermissionFormRequest extends FormRequest
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
            'permissions' => ['array', 'required'],
            'permissions.*' => ['required', 'string', 'exists:permissions,name'],
        ];
    }
}
