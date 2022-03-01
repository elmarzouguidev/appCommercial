<?php

namespace App\Http\Requests\Application\Profile;

use App\Rules\Password\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateFormRequest extends FormRequest
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
            'email' => ['required', 'email', 'string', Rule::unique(\ticketApp::activeGuard() . 's')->ignore(auth()->user()->id)],
            'telephone' => ['nullable', 'numeric', Rule::unique(\ticketApp::activeGuard() . 's')->ignore(auth()->user()->id)],
            'oldpassword' => ['nullable', 'string', 'min:6', new MatchOldPassword],
            'new_password' => ['required_with:oldpassword'],
            'new_confirm_password' => ['same:new_password'],
        ];
    }
}
