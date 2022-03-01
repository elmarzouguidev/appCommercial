<?php

namespace App\Http\Requests\Commercial\Estimate;

use Illuminate\Foundation\Http\FormRequest;

class EstimateUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    public function getArticles()
    {
        $articles = $this->articles ?? [];

        return collect($articles)
            ->where('montant_ht', '<=', 0)
            ->collect();
    }

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
            'client' => ['required', 'integer'],

            'estimate_date' => ['required', 'date', 'date'],
            'due_date' => ['required', 'date', 'date'],

            'admin_notes' => ['nullable', 'string'],
            'condition_general' => ['nullable', 'string'],

            'articles' => ['required', 'array'],
            'articles.*.designation' => ['required', 'string'],
            'articles.*.description' => ['nullable', 'string'],
            'articles.*.quantity' => ['required', 'integer'],
            'articles.*.prix_unitaire' => ['required', 'numeric'],
        ];
    }
}
