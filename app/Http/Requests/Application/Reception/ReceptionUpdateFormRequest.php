<?php

namespace App\Http\Requests\Application\Reception;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReceptionUpdateFormRequest extends FormRequest
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
            'telephone' => ['required', 'phone:MA', Rule::unique('receptions')->ignore($this->route('reception'))],
            'email' => ['required', 'email', Rule::unique('receptions')->ignore($this->route('reception'))],
            //'password' => 'required|string',
            //'permissions' => ['array', 'required'],
            //'permissions.*' => ['required', 'string','exists:permissions,name'],
        ];
    }
}
