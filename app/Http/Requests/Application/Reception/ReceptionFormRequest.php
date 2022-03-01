<?php

namespace App\Http\Requests\Application\Reception;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionFormRequest extends FormRequest
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
            'telephone' => 'required|phone:MA|unique:receptions',
            'email' => 'required|email|unique:receptions',
            'password' => 'required|string',
        ];
    }
}
