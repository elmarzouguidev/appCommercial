<?php

namespace App\Http\Requests\Commercial\BCommand;

use Illuminate\Foundation\Http\FormRequest;

class BCDeleteArticleFormRequest extends FormRequest
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
            'command' => ['required', 'uuid'],
            'article' => ['required', 'uuid'],
        ];
    }
}
