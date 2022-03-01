<?php

namespace App\Http\Requests\Application\Reparation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReparationFormRequest extends FormRequest
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

            'content' => ['required', 'string', 'min:5'],
            'reparation_done' => 'nullable|string|in:reparation_done,no',
            //'etat' => ['required', 'string', Rule::in(['reparable', 'non-reparable'])],

        ];
    }
}
