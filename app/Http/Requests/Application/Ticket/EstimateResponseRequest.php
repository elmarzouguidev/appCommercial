<?php

namespace App\Http\Requests\Application\Ticket;

use App\Constants\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstimateResponseRequest extends FormRequest
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
            'response' => ['required', 'integer', Rule::in([Response::DEVIS_ACCEPTE, Response::DEVIS_NON_ACCEPTE])]
        ];
    }
}
