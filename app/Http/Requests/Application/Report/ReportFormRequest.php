<?php

namespace App\Http\Requests\Application\Report;

use App\Constants\Etat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportFormRequest extends FormRequest
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

            'sendreport' => 'nullable|string|in:yessendit,no',
            'content' => ['required', 'string', 'min:5'],
            'type' => ['required', 'string', Rule::in(['diagnostique', 'reparation'])],
            'etat' => ['required', 'integer', Rule::in([Etat::REPARABLE, Etat::NON_REPARABLE])],
        ];
    }
}
