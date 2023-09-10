<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateTechnicienRequest extends FormRequest
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
            'adresse' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('techniciens')->ignore($this->technicien)->whereNull('deleted_at')],
            'tel1' => 'nullable|max:255',
            'tel2' => 'nullable|max:255',
            'user_id' => 'nullable|max:255',
        ];
    }
}
