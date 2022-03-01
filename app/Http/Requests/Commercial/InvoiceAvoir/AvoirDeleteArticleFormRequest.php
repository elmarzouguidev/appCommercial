<?php

namespace App\Http\Requests\Commercial\InvoiceAvoir;

use Illuminate\Foundation\Http\FormRequest;

class AvoirDeleteArticleFormRequest extends FormRequest
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
            'article' => ['required', 'uuid'],
            'invoice' => ['required', 'uuid'],
        ];
    }
}
