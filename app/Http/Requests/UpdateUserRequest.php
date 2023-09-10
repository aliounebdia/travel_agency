<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'prenom' => 'required|max:255',
            'nom' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->whereNull('deleted_at')->ignore($this->user)],
            'password' => ['nullable', 'required_with:password_confirmation', Password::min(8)],
            'password_confirmation' => 'nullable|required_with:password|same:password',
            'role_id' => 'nullable',
        ];
    }
}
