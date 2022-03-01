<?php

namespace App\Http\Requests\Commercial\BCommand;

use Illuminate\Foundation\Http\FormRequest;

class BCFormRequest extends FormRequest
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

            'provider' => ['required', 'integer'],
            'company' => ['required', 'integer'],

            //'code' => ['required', 'string', 'unique:b_commands'],
            'date_command' => ['required', 'date', 'date_format:Y-m-d'],
           // 'date_due' => ['required', 'date', 'date_format:d-m-Y'],

            'admin_notes' => ['nullable', 'string'],
            //'client_notes' => ['nullable', 'string'],
            'condition_general' => ['nullable', 'string'],

            'articles' => ['required', 'array'],
            'articles.*.designation' => ['required', 'string'],
            'articles.*.description' => ['nullable', 'string'],
            'articles.*.quantity' => ['required', 'integer'],
            'articles.*.prix_unitaire' => ['required', 'numeric'],
            //'articles.*.montant_ht' => ['nullable', 'numeric'],

        ];
    }
}
