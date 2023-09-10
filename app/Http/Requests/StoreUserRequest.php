<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'email' => ['required', Rule::unique('users')->whereNull('deleted_at'), 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role_id' => 'nullable',
        ];
    }
}
