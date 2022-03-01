<?php

namespace App\Http\Requests\Application\Technicien;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TechnicienUpdateFormRequest extends FormRequest
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
            'telephone' => ['required', 'phone:MA', Rule::unique('techniciens')->ignore($this->route('technicien'))],
            'email' => ['required', 'email', Rule::unique('techniciens')->ignore($this->route('technicien'))],
            //'password' => 'required|string',
            'permissions' => ['array', 'required'],
            'permissions.*' => ['required', 'string','exists:permissions,name'],
        ];
    }
}
