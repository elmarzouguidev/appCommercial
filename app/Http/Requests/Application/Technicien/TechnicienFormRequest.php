<?php

namespace App\Http\Requests\Application\Technicien;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TechnicienFormRequest extends FormRequest
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
            'telephone' => 'required|phone:MA|unique:techniciens',
            'email' => 'required|email|unique:techniciens',
            'password' => 'required|string',
         
        ];
    }
}
